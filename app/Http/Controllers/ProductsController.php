<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
//use App\Http\Requests\ProductRequest;
use App\Http\Requests;
use App\Category;
use App\Brand;
use App\Product;
use Session;
use Illuminate\Filesystem\Filesystem;

class ProductsController extends Controller
{

	public function __construct(Filesystem $fs)
    {
        $this->fs = $fs;
    }

    public function index()
    {	
    	$products = Product::all();
    	$categories = Category::all();
    	$brands = Brand::all();
        return view('admincp/products.index')->with('categories', $categories)->with('brands', $brands);
    }
    

    public function create()
    {   
        $categories = Category::all();
        return view('dashboard.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->title = $request->input('title');        
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');

        if ($request->hasFile('preview_photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('preview_photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;
            //Destination path for products photo
            $destinationPath = public_path() . '/public/images/uploads/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('/public/images/uploads/'))) {
                $this->fs->makeDirectory(public_path('/public/images/uploads/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('preview_photo')->move($destinationPath, $fileName);
            if ($upload_success) {
                $product->preview_photo = $fileName;
            }
        }

        $product->save();
        Session::flash('flash_message', 'Product successfully created!');
        return redirect()->back();
    }

//This display the content of each challenge

/*    
    public function show($id)
    {   
        //$idea = Idea::all();
        $products = Product::find($id);
        return view('admincp/products.index')->with('products', $products);//->withIdea($idea);
    }
    */

}
