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

              <div class="row">
                <div class="input-field col s4">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                </div>
              </div>

            <div class="box-header with-border">
              <h3 class="box-title">Update category</h3>
            </div>
            <!-- /.box-header -->

            
            <div class="box-body">


            {!! Form::model($category, [ 'method' => 'PATCH', 'route' => ['categories.update', $category->id] ]) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

              <!--<form class="form" method="PATCH" action="{{url('admincp/categories/update', $category->id)}}">
                <!-- text input --
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" name="slug" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Update</button>

              </form> 
              -->
            </div>
            <!-- /.box-body -->
          </div>
          </div>

    </section>
</div>

@endsection