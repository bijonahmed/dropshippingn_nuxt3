<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerifyEmail;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException; // Import the ValidationException class
use DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'showProfileData', 'updateprofile', 'updatePassword']]);
    }
    protected function validateLogin(Request $request)
    {
        //userCapInput
        $request->validate([
            'email'        => 'required|string',
            'password'     => 'required|string',
            'captchaInput' => 'required',
            'userCapInput' => 'required',
        ]);

        // Validate CAPTCHA
        if (strtolower($request->input('captchaInput')) !== strtolower($request->input('userCapInput'))) {
            throw ValidationException::withMessages([
                'userCapInput' => ['The CAPTCHA code is incorrect.'],
            ]);
        }
    }
    /*
    public function login(Request $request)
    {
        //dd($request->all());
        $this->validateLogin($request);
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'account' => [
                        "Invalid username or password"
                    ]
                ]
            ], 422);
        }
        return $this->respondWithToken($token);
    }
    */
    public function login(Request $request)
    {
        // Validate the request
        $this->validateLogin($request);

        // Retrieve credentials from the request
        $credentials = request(['email', 'password']);

        // Attempt authentication
        if (!$token = auth('api')->attempt($credentials)) {
            // If authentication fails, return an error response
            return response()->json([
                'errors' => [
                    'account' => [
                        "Invalid username or password"
                    ]
                ]
            ], 422);
        }

        // Check if the user is active
        $user = auth('api')->user();

        if (!empty($user)) {
            if ($user->status === 1) {
                $ipAddress = $request->ip(); //'5.193.226.195'; Testing ip Dubai
                $country = $this->getCountryFromIp($ipAddress);
                $data = [
                    'lastlogin_ip' => $ipAddress,
                    'lastlogin_country' => $country,
                    'lastlogin_datetime' => now()->format('Y-m-d H:i:s'),
                ];
                // Update the user table for the given user ID
                User::where('id', $user->id)->update($data);
            }
        }


        if ($user->status === 0) {
            // If the user is not active, return an error response
            return response()->json([
                'errors' => [
                    'account' => [
                        "This user is blocked"
                    ]
                ]
            ], 403);
        }

        // If authentication is successful and user is active, return token
        return $this->respondWithToken($token);
    }




    private function getCountryFromIp($ip)
    {
        //$ip = '5.193.226.195'; for testing dubai IP

        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip
        ));

        $CountryName    = $ipdat->geoplugin_countryName;
        //$CountryName    = $ipdat->geoplugin_countryName . "\n"; 
        $CityName       = $ipdat->geoplugin_city . "\n";
        $ContinentName  = $ipdat->geoplugin_continentName . "\n";
        $Latitude       = $ipdat->geoplugin_latitude . "\n";
        $Longitude      = $ipdat->geoplugin_longitude . "\n";
        $CurrencySymbol = $ipdat->geoplugin_currencySymbol . "\n";
        $CurrencyCode   = $ipdat->geoplugin_currencyCode . "\n";
        $Timezone       = $ipdat->geoplugin_timezone;

        $location = "$CountryName";
        //$location = "Country: $CountryName, City: $CityName, Continent: $ContinentName, Latitude: $Latitude, Longitude: $Longitude, Currency Symbol: $CurrencySymbol, Currency Code: $CurrencyCode, Timezone: $Timezone";
        return $location;
    }


    public function generateUniqueRandomNumber()
    {
        $microtime = microtime(true); // Get the current microtime as a float
        $microtimeString = str_replace('.', '', (string)$microtime); // Remove the dot from microtime

        // Extract the last 5 digits
        $uniqueId = substr($microtimeString, -7);
        return $uniqueId; // Since we're generating only one number, return the first (and only) element of the array
    }

    public function register(Request $request)
    {

        //dd($request->all());
        $this->validate($request, [
            'otp'        => 'required',
            'inviteCode' => 'required',
            'email'      => 'required|unique:users,email',
            'password'   => 'required|min:6'
        ]);
        $email          = $request->email;
        $trimmedEmail   = substr($email, 0, strpos($email, '@'));

        $inviteCode     = $request->input('inviteCode');
        $user           = User::where('inviteCode', $inviteCode)->first();
        if (!$user) {
            return response()->json(['errors' => ['inviteCode' => ['Invalid invite code.']]], 422);
        }

        $verification   = VerifyEmail::where('email', $request->email)->where('code', $request->otp)->first();
        if (!$verification) {
            return response()->json(['errors' => ['otp' => ['OTP invalid.']]], 422);
        }


        if ($verification) {
            $verification->status = 1; // Update with the appropriate status
            $verification->save();
        }

        $user = User::create([
            'name'          => $trimmedEmail,
            'otp'           => $request->otp,
            'email'         => $request->email,
            'role_id'       => 2,
            'ref_id'        => $user->id,
            'register_ip'   => $request->ip(),
            'inviteCode'    => $this->generateUniqueRandomNumber(),
            'show_password' => $request->password,
            'password'      => bcrypt($request->password),
        ]);
        // Get the token
        $token = auth('api')->login($user);
        return $this->respondWithToken($token);
    }
    public function me()
    {
        return response()->json($this->guard('api')->user());
    }
    public function logout()
    {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken($this->guard('api')->refresh());
    }
    protected function respondWithToken($token)
    {
        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'expires_in' => auth('api')->factory()->getTTL() * 60
        // ]);
        $user = auth('api')->user(); // Retrieve the authenticated user

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'    => auth('api')->factory()->getTTL() * 60,
            'user' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                // Add any other user information you want to include
            ],
        ]);
    }
    public function guard()
    {
        return Auth::guard();
    }
    public function profile(Request $request)
    {
        $user = auth('api')->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => "required|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }
        return response()->json([
            'success' => true,
            'user' => $user
        ], 200);
    }


    public function updateUserProfileSocial(Request $request)
    {
        $user = auth('api')->user();
        $authId = $user->id;
        $telegram = $user->telegram;
        $whtsapp  = $user->whtsapp;
        $othersway_connect  = $user->othersway_connect;
        $validator = Validator::make($request->all(), [
            'telegram' => 'required',
            'whtsapp'  => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = array(
            'id'                => $authId,
            'telegram'          => !empty($request->telegram) ? $request->telegram : "",
            'whtsapp'           => !empty($request->whtsapp) ? $request->whtsapp : "",
            'othersway_connect' => !empty($request->othersway_connect) ? $request->othersway_connect : "",
        );
        //dd($data);
        DB::table('users')->where('id', $authId)->update($data);
        $response = [
            'telegram' => $telegram,
            'whtsapp'  => $whtsapp,
            'othersway_connect'  => $othersway_connect,
            'message'  => 'Successfully update'
        ];
        return response()->json($response);
    }


    public function updateprofile(Request $request)
    {
        $user = auth('api')->user();
        $authId = $user->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = array(
            'id'                => $authId,
            'name'              => !empty($request->name) ? $request->name : "",
            'email'             => !empty($request->email) ? $request->email : "",
            'phone_number'      => !empty($request->phone_number) ? $request->phone_number : "",
            'address'           => !empty($request->address) ? $request->address : "",
            'website'           => !empty($request->website) ? $request->website : "",
            'github'            => !empty($request->github) ? $request->github : "",
            'twitter'           => !empty($request->twitter) ? $request->twitter : "",
            'instagram'         => !empty($request->instagram) ? $request->instagram : "",
            'facebook'          => !empty($request->facebook) ? $request->facebook : "",
        );
        if (!empty($request->file('file'))) {
            $documents = $request->file('file');
            $fileName = Str::random(20);
            $ext = strtolower($documents->getClientOriginalExtension());
            $path = $fileName . '.' . $ext;
            $uploadPath = '/backend/files/';
            $upload_url = $uploadPath . $path;
            $documents->move(public_path('/backend/files/'), $upload_url);
            $data['image'] = $upload_url;
        }
        //dd($data);
        DB::table('users')->where('id', $authId)->update($data);
        $response = [
            'imagelink' => !empty($user) ? url($user->image) : "",
            'message' => 'User successfully update'
        ];
        return response()->json($response);
    }
    public function showProfileData(Request $request)
    {
        $data = auth('api')->user();
        $role_id   = $data->role_id;
        $role_name = DB::table('rule')->where('id', $role_id)->first();

        return response()->json([
            'data'    => $data,
            'rname'   => !empty($role_name) ? $role_name->name : "",
            'dataImg' => !empty($data->image) ? url($data->image) : "",
            'doc_file' => !empty($data->doc_file) ? url($data->doc_file) : "",
            'othersway_connect' => !empty($data->othersway_connect) ? $data->othersway_connect : "",
            'created_at'        => date("Y-m-d", strtotime($data->created_at)),
            'updated_at'        => date("Y-m-d", strtotime($data->updated_at)),
            'message'           => 'User Profile Data'
        ]);
    }
    public function changesPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:1|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $id = auth('api')->user();
        $user = User::find($id->id);
        //dd($currentuser->username);
        $user->password = Hash::make($request->password);
        $user->show_password = $request->password;
        $user->save();
        $response = "Password successfully changed!";
        return response()->json($response);
    }
}
