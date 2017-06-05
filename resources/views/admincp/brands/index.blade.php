@extends('layouts.admin.app')
@section('title', 'Brands')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Product Brands
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
              <h3 class="box-title">Create new Brand</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form" method="POST" action="{{url('admincp/brands/save')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                <!-- text input -->
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter ..." >
                </div>
                <!-- select 
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div> -->
                <button class="btn btn-primary" type="submit">Save</button>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          </div>


        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View all Brands</h3>
            </div>
            <!-- /.box-header -->
             @if ($brands->count() > 0 )
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Brand Title</th>
                  <th>Brand Slug</th>
                </tr>
                @foreach ($brands as $brand)
                <tr>
                  <td>{{$brand->title}}</td>
                  <td>{{$brand->slug}}</td>
                  <td><a href="{{ url('admincp/brands/edit', $brand->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                  <td><a href="{{ url('admincp/brands/delete', $brand->id) }}" class="btn btn-primary btn-sm">Delete</a></td>
                </tr>
                @endforeach
              </table>
            </div>
            @endif
            <!-- /.box-body -->
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
          <!-- /.box -->
        </div>
    </section>
</div>

@endsection