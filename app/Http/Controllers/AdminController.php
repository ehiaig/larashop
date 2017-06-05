<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Product;
use App\Category;
use App\Brand;
use App\User;
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
*/
    public function index()
    {
        //$product = Product::orderBy('id', 'desc')->where('user_id', ->paginate(4));
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('admincp.dashboard')->withProduct($products);
    
    }
}
