<?php

namespace App\Http\Controllers\Dropshipping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Helper;
use App\Models\Holiday;
use App\Models\User;
use App\Models\ProductAttributeValue;
use App\Models\ProductVarrientHistory;
use App\Models\Categorys;
use App\Models\ProductAttributes;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductAdditionalImg;
use App\Models\ProductVarrient;
use App\Models\AttributeValues;
use App\Models\CurrencyType;
use App\Models\Deposit;
use App\Models\MakeBank;
use App\Models\Withdraw;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class DropUserController extends Controller
{
    protected $userid;
    public function __construct()
    {
        $this->middleware('auth:api');
        $id = auth('api')->user();
        $user = User::find($id->id);
        $this->userid = $user->id;
    }



    public function checkWithdrawalMethod()
    {
        try {
            $data = MakeBank::where('user_id',$this->userid)->first();
            return response()->json(
                ['data'=> $data], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


 public function chkfindWithdraInfo()
    {
        try {
            $data = MakeBank::where('user_id',$this->userid)->first();
            $ctypeData = CurrencyType::where('id',$data->currency_type_id)->first();
            return response()->json(
                ['data'=> $ctypeData], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    
    
    public function getCurrencyType()
    {

        try {
            $query = CurrencyType::orderBy('id', 'desc')->get();
            $chkBank = MakeBank::where('user_id',$this->userid)->first();
            return response()->json(
                [
                    'data'          => $query,
                    'chkWallet'     => !empty($chkBank->wallet_address) ? $chkBank->wallet_address : "",
            ], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function depositRequest(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'depsoitAmount'  => 'required|numeric',
                'payment_method' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $generateID = "W" . date("Y") . $this->generateUnique4DigitNumber();
            $data = array(
                'depositID'      => $generateID,
                'depscription'   => $generateID,
                'deposit_amount' => $request->depsoitAmount,
                'payment_method' => $request->payment_method,
                'status'         => 0,
                'user_id'        => $this->userid
            );
            $resonse = Deposit::insertGetId($data);
            return response()->json($resonse);
        } catch (QueryException $e) {
            // Log the error or handle it as needed
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }



    public function updateMakeBank(Request $request){

        try {
            $validator = Validator::make($request->all(), [
                'id'  => 'required|numeric',
                'currency_type_id'  => 'required|numeric',
                'wallet_address' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $existingRecord = MakeBank::where('id', $request->id)->where('user_id', $this->userid)->first();

            if ($existingRecord) {
                // Update existing record
                $existingRecord->update([
                    'currency_type_id' => $request->currency_type_id,
                    'wallet_address'   => $request->wallet_address
                ]);
                $response = $existingRecord->id; // Assuming you need to return the ID
                return response()->json($response);
            }
            
        } catch (QueryException $e) {
            // Log the error or handle it as needed
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }

    }

    public function makeBank(Request $request)
    {

         
        try {
            $validator = Validator::make($request->all(), [
                'currency_type_id'  => 'required|numeric',
                'wallet_address' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $data = array(
                'currency_type_id' => $request->currency_type_id,
                'wallet_address'   => $request->wallet_address,
                'user_id'          => $this->userid
            );
            $resonse = MakeBank::insertGetId($data);
            return response()->json($resonse);
        } catch (QueryException $e) {
            // Log the error or handle it as needed
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    public function withdrawRequest(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'withdraw_amount'  => 'required|numeric',
                'bank_card'        => 'required',
                'payable_amount'   => 'required',
                'password'         => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $chkDeposit = Deposit::where('id', $this->userid)->first();
            $depositAmt = !empty($chkDeposit) ? $chkDeposit->deposit_amount : 0;
            $chkSetting = Setting::find(1);
            $generateID = "W" . date("Y") . $this->generateUnique4DigitNumber();
            $withAmt    = !empty($chkSetting->withdraw_minimum_amount) ? $chkSetting->withdraw_minimum_amount : 0;
            $withMethod = MakeBank::where('user_id', $this->userid)->first();
            if ($request->withdraw_amount > $withAmt) {
                //condition is true
                if ($request->withdraw_amount <= $depositAmt) {
                    //Condition is true
                    //echo "Deposit amount $depositAmt. ---price is okay $depositAmt ";
                    $currentpassword =  $request->password;
                    $checkUser       =  User::find($this->userid);
                    // Compare the hashed input password with the hashed password stored in the database
                    if (Hash::check($currentpassword, $checkUser->with_password)) {
                        $data = array(
                            'withdrawID'      => $generateID,
                            'depscription'    => $generateID,
                            'withdraw_amount' => $request->withdraw_amount,
                            'withdrawal_method_id' => !empty($withMethod->id) ? $withMethod->id : "",
                            'transection_fee' => !empty($chkSetting) ? $chkSetting->withdraw_service_charge : 0,
                            'payable_amount'  => $request->payable_amount,
                            'password'        => $request->password,
                            'status'          => 0,
                            'user_id'         => $this->userid
                        );
                        $resonse = Withdraw::insertGetId($data);
                        return response()->json(['last id' => $resonse], 200);
                    } else {
                        return response()->json(['password_error' => 'Invalid password'], 422);
                    }
                } else {
                    //Condition is false
                    $msg = "Your amount is $$depositAmt. Please valid request";
                    return response()->json(['deposit_error' => $msg], 422);
                }
            } else {
                //conditon is false; 
                $msg = "Please increase your amount. Minimum withdrawal Amount $$withAmt";
                return response()->json(['withdrawal_mini_error' => $msg], 422);
            }
        } catch (QueryException $e) {
            // Log the error or handle it as needed
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    function generateUnique4DigitNumber($existingNumbers = [])
    {
        do {
            $uniqueNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (in_array($uniqueNumber, $existingNumbers));

        return $uniqueNumber;
    }

    public function getMyDepositAmount()
    {

        try {
            $depostSum = Deposit::where('user_id', $this->userid)->sum('receivable_amount');
            $setting   = Setting::find(1);
            return response()->json(
                [
                    'data'    => $depostSum,
                    'setting' => $setting,
                ],
                200
            );
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }



    public function withDrawalRequestList(Request $request)
    {
       
        try {

            //Withdraw::where('user_id', $this->userid)->orderBy('id', 'desc');
            $query = Withdraw::select('withdraw.*','currency_type.name as currency_type_name')
            ->join('withdrawal_method', 'withdraw.withdrawal_method_id', '=', 'withdrawal_method.id')
                        ->join('currency_type', 'withdrawal_method.currency_type_id', '=', 'currency_type.id')
                        ->where('withdraw.user_id', $this->userid)
                        ->orderBy('withdraw.id', 'desc');

            if ($request->has('orderId')) {
                $query->where('withdrawID', $request->orderId);
            }
            $depositArr = $query->get();
            return response()->json(['data' => $depositArr], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }



    public function depositRequestList(Request $request)
    {
        try {
            $query = Deposit::where('user_id', $this->userid)->orderBy('id', 'desc');

            if ($request->has('orderId')) {
                $query->where('depositID', $request->orderId);
            }
            $depositArr = $query->get();
            return response()->json(['data' => $depositArr], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error occurred.'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function removeProducts($id)
    {
        //echo $id;exit; 
        if (!empty($id)) {
            Product::where('id', $id)->delete();
            ProductAttributes::where('product_id', $id)->delete();
            ProductAttributeValue::where('product_id', $id)->delete();
            ProductVarrient::where('product_id', $id)->delete();
            ProductVarrientHistory::where('product_id', $id)->delete();
            ProductCategory::where('product_id', $id)->delete();
            ProductAdditionalImg::where('product_id', $id)->delete();
        }
        return response()->json("successfully delete product", 200);
    }
}
