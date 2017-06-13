<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Category;
use App\Brand;
use App\Product;
use App\User;
use Session;
use Illuminate\Filesystem\Filesystem;

class ProductsController extends Controller
{

	public function __construct(Filesystem $fs)
    {
        $this->fs = $fs;
    }

    public function viewProduct()
    {	
    	$products = Product::all();
    	$categories = Category::all();
    	$brands = Brand::all();
        return view('admincp/products.index')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
    }
    
/**
    public function create()
    {   
        $categories = Category::all();
        return view('dashboard.create')->withCategories($categories);
    }
    */

    public function storeProduct(Request $request)
    {
        $products = new Product();

        $products->title = $request->input('title');        
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');
        $products->brand_id = $request->input('brand_id');


      if ($request->hasFile('preview_photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('preview_photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;
            //Destination path for products photo
            $destinationPath = public_path() . 'images/uploads/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('images/uploads/'))) {
                $this->fs->makeDirectory(public_path('images/uploads/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('preview_photo')->move($destinationPath, $fileName);
            
            if ($upload_success) {
                $products->preview_photo = $fileName;
            }

        
        }
        //request()->file('preview_photo')->store('images/uploads/');

        $products->save();
        Session::flash('flash_message', 'Product successfully created!');
        return redirect()->back();
    }

//This display each product
/**   
    public function show($id)
    {   
        $products = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admincp/products.index')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
    }
    
*/

    //This calls the function to edit each challenge
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admincp/products.edit')->withProduct($products)->withCategories($categories)->withBrand($brands);
    }


    public function update($id, Request $request)
    {
        $products= Product::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'preview_photo' => 'required',
            'slug' => 'required',
            'price' => 'required',
          
        ]);

        $input = $request->all();
        $products->fill($input)->save();

        Session::flash('flash_message', 'Product successfully updated!');
        return redirect()->back();
        //return view('challenges.viewchallenge', compact('challenge'));
    }

    public function delete($id)
    {
        $products= Product::find($id);
        $products->delete();
        Session::flash('flash_message', 'Product successfully deleted!');
        return redirect()->back();
        //return redirect()->route('dashboard.index')->with('success','Challenge deleted successfully');
        
    }



/**    public function storeProduct(Request $request)
    {
        $products = new Product();

        $products->title = $request->input('title'); 
        $products->description = $request->input('description');
        $products->price = $request->input('price');

        if ($request->hasFile('preview_photo')) {
            $randomKey = sha1(time() . microtime());
            $extension = $request->file('preview_photo')->getClientOriginalExtension();
            $fileName = $randomKey . '.' . $extension;
            //Destination path for products photo
            $destinationPath = public_path() . 'images/uploads/';
            // Check if the folder exists on upload, create it if it doesn't
            if (!is_dir(public_path('images/uploads/'))) {
                $this->fs->makeDirectory(public_path('images/uploads/'), 0777, true);
            }
            //Move the photo to a temporary path
            $upload_success = $request->file('preview_photo')->move($destinationPath, $fileName);
            
            if ($upload_success) {
                $products->preview_photo = $fileName;
            }
        }

        $products->save();
        Session::flash('flash_message', 'Product successfully created!');
        return redirect()->back();
    }
*/
}
