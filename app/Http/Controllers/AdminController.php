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

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        return view('admincp.dashboard');
    }

    public function __construct(Filesystem $fs)
    {
        $this->fs = $fs;
    }

    public function index()
    {
        //$product = Product::orderBy('id', 'desc')->where('user_id', ->paginate(4));
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('admincp/dashboard')->withProduct($products)->withCategory($categories)->withBrand($brands);
    
    }
    */

    public function viewDash()
    {   
        
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admincp/dashboard')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
        /**
        $search =\Request::get('search');
        $products = Product::where('title', 'like', '%'.$search.'%')->orderBy('id')->paginate(3);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admincp/dashboard')->with('products', $products)->with('categories', $categories)->with('brands', $brands);
        */
    }
    
}
