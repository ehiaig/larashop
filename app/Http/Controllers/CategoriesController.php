<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    public function viewCategory()
    {	
    	$categories = Category::all();
        return view('admincp/categories.index')->with('categories', $categories);
    }

    public function saveCategory(Request $request)
    {
    	$category = new Category();

    	$category->title = $request->input('title');
        $category->slug = $request->input('slug');

        $category->save();
        Session::flash('flash_message', 'Category successfully created!');
		return redirect()->back();   

    }

    public function edit($id)
    {
        $category= Category::find($id);
        return view('admincp/categories.edit')->withCategory($category);
    }


    public function update($id, Request $request)
    {
        $category= Category::find($id);

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required'
        ]);

        $input = $request->all();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category successfully updated!');

        return redirect()->back();
    }

    public function delete($id)
    {
        $category= Category::find($id);
        $category->delete();
        Session::flash('flash_message', 'category successfully deleted!');
        return redirect()->back();
        //return redirect()->route('dashboard.index')->with('success','Challenge deleted successfully');
        
    }


    
}
