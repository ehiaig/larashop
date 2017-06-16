<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Redirect;
use App\Http\Requests;
use App\Category;
use App\Brand;
use App\Product;
//use App\User;
//use Session;
use Illuminate\Filesystem\Filesystem;

class SiteController extends Controller
{
    public function index()
    {
    	$products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('index')->with('products', $products)->with('categories', $categories)->with('brands', $brands);

        //return view('index')->withProduct($products);//->withCategory($categories)->withBrand($brands);

        //return view('index')->with('products', $products);
    }

    public function show($id)
    {   
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::find($id);
        return view('single')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
    }

}
