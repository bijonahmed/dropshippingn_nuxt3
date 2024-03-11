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
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class DropShiProductController extends Controller
{
    protected $userid;
    public function __construct()
    {
        $this->middleware('auth:api');
        $id = auth('api')->user();
        $user = User::find($id->id);
        $this->userid = $user->id;
    }

    public function productUpdate(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            //  'category'       => 'required',
            // 'files' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max:2048 is the maximum file size in kilobytes (2MB)
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $product_id =  (int)$request->id;
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $data = array(
            'name'                       => $request->name,
            'slug'                       => $slug,
            'description_short'          => !empty($request->description_short) ? $request->description_short : "",
            'description_full'           => !empty($request->description_full) ? $request->description_full : "",
            'selling_price'              => !empty($request->selling_price) ? $request->selling_price : "",
            'profit'                     => !empty($request->profit) ? $request->profit : "",
            'buying_price'               => !empty($request->buying_price) ? $request->buying_price : "",
            'status'                     => 1, //!empty($request->status) ? $request->status : "",
            'entry_by'                   => $this->userid
        );
        if (!empty($request->file('files'))) {
            $files = $request->file('files');
            $fileName = Str::random(20);
            $ext = strtolower($files->getClientOriginalExtension());
            $path = $fileName . '.' . $ext;
            $uploadPath = '/backend/files/';
            $upload_url = $uploadPath . $path;
            $files->move(public_path('/backend/files/'), $upload_url);
            $file_url = $uploadPath . $path;
            $data['thumnail_img'] = $file_url;
        }
        Product::where('id', $product_id)->update($data);
        // echo "update====$product_id";
        if (!empty($request->file('images'))) {
            foreach ($request->file('images') as $file) {
                $name = $file->getClientOriginalName();
                $dic_name = uniqid() . $name;
                $uploadPath = '/backend/files/';
                $file->move(public_path() . '/backend/files/', $dic_name);
                // $docs[] = $name;  
                $img_data['images']       = $uploadPath . $dic_name;
                $img_data['product_id']   = $product_id;
                DB::table('produc_img_history')->insert($img_data);
            }
        }
        //INSERT MULTIPLE CATEGORY
        $category     = $request->category;
        $dynamicArray = explode(',', $category); // Convert the string to an array
        $results      = Categorys::whereIn('id', $dynamicArray)->get();
        $formattedResults = [];
        foreach ($results as $result) {
            $path = [];
            $category = $result;
            while ($category) {
                array_unshift($path, $category->id);
                $category = $category->parent;
            }
            $formattedResults[] = [
                'product_id'   => $product_id,
                'category_id'  => $result->id,
                'parent_id'    => implode(',', $path)
            ];
        }
        DB::table('produc_categories')->insert($formattedResults);
        $resdata['product_id'] = $product_id;
        return response()->json($resdata);
        ///return response()->json(['message' => 'Product updated successfully'], 200);
    }

    public function save(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'category'       => 'required',
            'selling_price'  => 'required',
            'profit'         => 'required',
            'buying_price'   => 'required',
            'files' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max:2048 is the maximum file size in kilobytes (2MB)
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $data = array(
            'name'                       => $request->name,
            'slug'                       => $slug,
            'description_short'          => !empty($request->description_short) ? $request->description_short : "",
            'description_full'           => !empty($request->description_full) ? $request->description_full : "",
            'selling_price'              => !empty($request->selling_price) ? $request->selling_price : "",
            'profit'                     => !empty($request->profit) ? $request->profit : "",
            'buying_price'               => !empty($request->buying_price) ? $request->buying_price : "",
            'status'                     => 1, //!empty($request->status) ? $request->status : "",
            'entry_by'                   => $this->userid
        );
        // dd($data);
        if (!empty($request->file('files'))) {
            $files = $request->file('files');
            $fileName = Str::random(20);
            $ext = strtolower($files->getClientOriginalExtension());
            $path = $fileName . '.' . $ext;
            $uploadPath = '/backend/files/';
            $upload_url = $uploadPath . $path;
            $files->move(public_path('/backend/files/'), $upload_url);
            $file_url = $uploadPath . $path;
            $data['thumnail_img'] = $file_url;
        }
        if (empty($request->id)) {
            //INSERT PRODUCT
            $product_id = Product::insertGetId($data);
            //INSERT MULTIPLE IMAGE
            if (!empty($request->file('images'))) {
                foreach ($request->file('images') as $file) {
                    $name = $file->getClientOriginalName();
                    $dic_name = uniqid() . $name;
                    $uploadPath = '/backend/files/';
                    $file->move(public_path() . '/backend/files/', $dic_name);
                    // $docs[] = $name;  
                    $img_data['images']       = $uploadPath . $dic_name;
                    $img_data['product_id']   = $product_id;
                    DB::table('produc_img_history')->insert($img_data);
                }
            }
            //INSERT MULTIPLE CATEGORY
            $category     = $request->category;
            $dynamicArray = explode(',', $category); // Convert the string to an array
            //dd($dynamicArray);
            $results      = Categorys::whereIn('id', $dynamicArray)->get();
            //dd($results);
            $formattedResults = [];
            foreach ($results as $result) {
                $path = [];
                $category = $result;
                while ($category) {
                    array_unshift($path, $category->id);
                    $category = $category->parent;
                }
                $formattedResults[] = [
                    'product_id'   => $product_id,
                    'category_id'  => $result->id,
                    'parent_id'    => implode(',', $path)
                ];
            }
            DB::table('produc_categories')->insert($formattedResults);
            $resdata['product_id'] = $product_id;
            return response()->json($resdata);
        }
    }



    function generateUnique4DigitNumber($existingNumbers = [])
    {
        do {
            $uniqueNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        } while (in_array($uniqueNumber, $existingNumbers));

        return $uniqueNumber;
    }




    public function additionaIMagesDelete(Request $request)
    {
        $images_id =  $request->images_id;
        ProductAdditionalImg::where('id', $images_id)->delete();
        return response()->json("Delete Images");
    }

    public function deleteCategory(Request $request)
    {

        // dd($request->all());
        $dynamicArray = explode(',', $request->item); // Convert the string to an array
        $lastElement  = trim(end($dynamicArray));

        $category_id  = Categorys::where('name', $lastElement)->select('id')->first();
        $row          = ProductCategory::where('category_id', $category_id->id)->where('product_id', $request->product_id)->first();
        if (!empty($row->category_id)) {
            ProductCategory::where('category_id', $row->category_id)->delete();
        }
        return response()->json("Delete Category Category ID: $row->category_id ");
    }

    public function productrow($id)
    {

        $produCategory = ProductCategory::where('product_id', $id)->get();
        $prodimages    = ProductAdditionalImg::where('product_id', $id)->select('images', 'id')->get();
        $prodImages    = Product::find($id);
        $addiImg = [];
        foreach ($prodimages as $v) {
            $addiImg[] = [
                'images'       => url($v->images),
                'id'           => $v->id,
            ];
        }
        $returnData = [];
        foreach ($produCategory as $key => $val) {
            $returnData[] = DB::select("SELECT GROUP_CONCAT(name SEPARATOR ', ') AS name,id,percentage_amt FROM categorys WHERE id IN ($val->parent_id)");
        }
        $concatenated_names = [];
        foreach ($returnData as $inner_array) {
            foreach ($inner_array as $obj) {

                $concatenated_names[] = $obj->name;
            }
        }
        $resulting_string = implode("<br/>", $concatenated_names);
        $show_edit_cat = $concatenated_names; //implode("<br/>", $concatenated_names);
        //dd($resulting_string);
        $responseData['productImg']        = !empty($prodImages) ? url($prodImages->thumnail_img) : "";
        $responseData['product']           = Product::where('product.id', $id)->first();
        //dd($responseData['product']);
        $responseData['product_cat']       = $resulting_string;
        $responseData['product_edit_cat']  = $show_edit_cat;
        $responseData['product_imgs']      = $addiImg;
        //dd($responseData);
        return response()->json($responseData);
    }

    public function getProductList(Request $request)
    {
        //dd($request->all());
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);

        // Get search query from the request
        $searchQuery    = $request->searchQuery;
        $selectedFilter = (int)$request->selectedFilter;
        // dd($selectedFilter);
        $query = Product::orderBy('id', 'desc');

        if ($searchQuery !== null) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        if ($selectedFilter !== null) {

            $query->where('status', $selectedFilter);
        }

        $paginator = $query->paginate($pageSize, ['*'], 'page', $page);

        $modifiedCollection = $paginator->getCollection()->map(function ($item) {
            return [
                'id'         => $item->id,
                'name'       => substr($item->name, 0, 250),
                'stock_qty'  => $item->stock_qty,
                'status'     => $item->status,
            ];
        });

        // Return the modified collection along with pagination metadata
        return response()->json([
            'data' => $modifiedCollection,
            'current_page' => $paginator->currentPage(),
            'total_pages' => $paginator->lastPage(),
            'total_records' => $paginator->total(),
        ], 200);
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
