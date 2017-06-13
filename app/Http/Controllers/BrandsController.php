<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Brand;
use Session;

class BrandsController extends Controller
{
    public function viewBrand()
    {	
    	$brands = Brand::all();
        return view('admincp/brands.index')->with('brands', $brands);
    }

    public function saveBrand(Request $request)
    {
    	$brand = new Brand();

    	$brand->title = $request->input('title');
        $brand->slug = $request->input('slug');

        $brand->save();
        Session::flash('flash_message', 'Brand successfully created!');
		return redirect()->back();   

    }

    public function edit($id)
    {
        $brand= Brand::find($id);
        return view('admincp/brand.edit')->withBrand($brand);
    }


    public function update($id, Request $request)
    {
        $brand= Brand::find($id);

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required'
        ]);

        $input = $request->all();
        $brand->fill($input)->save();

        Session::flash('flash_message', 'Brand successfully updated!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $brand= Brand::find($id);
        $brand->delete();
        Session::flash('flash_message', 'Brand successfully deleted!');
        return redirect()->back();
        //return redirect()->route('dashboard.index')->with('success','Challenge deleted successfully');
        
    }
}
