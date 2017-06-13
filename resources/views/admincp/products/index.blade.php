@extends('layouts.admin.app')
@section('title', 'Product Category')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Product categories
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Create new Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form" enctype='multipart/form-data' method="POST" files="true" action="{{url('admincp/products/save')}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                      <div class="input-field col s6">
                          @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                              {{ Session::get('flash_message') }}
                            </div>
                          @endif
                      </div>
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="price" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                  <label>Product Category</label>
                      <select class="form-control" name="category_id">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                          @endforeach
                      </select>
                </div>
                <div class="form-group">
                  <label>Brand</label>
                      <select class="form-control" name="brand_id">
                          @foreach($brands as $brand)
                          <option value="{{$brand->id}}">{{$brand->title}}</option>
                          @endforeach
                      </select>
                </div> 
                <div class="form-group">
                  <label>File input</label>
                  <input type="file" name="preview_photo">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View new Product</h3>
            </div>
            @foreach ($products as $product)
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">

                    <img alt="Product Image" src="{{ asset("/images/uploads/$product->preview_photo") }}" >
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{$product->title}}
                      <span class="label label-warning pull-right">${{$product->price}}</span></a>
                        <span class="product-description">{{$product->description}}
                        </span>
                  </div>
                  <a href="{{ url('admincp/products/edit', $product->id) }}" class="btn btn-primary btn-xs">Edit</a>
                  <a href="{{ url('admincp/products/delete', $product->id) }}" class="btn btn-primary btn-xs">Delete</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            @endforeach
            <div class="box-footer text-center" style="display: block;">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
    </section>
</div>

@endsection