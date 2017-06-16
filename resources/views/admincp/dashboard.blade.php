@extends('layouts.admin.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
<!--
        <form action="{{url('admincp/search')}}" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="productsearch" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
-->
        <form action="{{url('admincp/dashboard')}}" method="get">
          
          <div class="input-group">
             <input type="text" class="form-control" name="productsearch"
            placeholder="Search Products">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="productsearch">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
          </div>
        </form>
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="col-lg-6 col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">View new Product</h3>
              </div>
              <!-- /.box-header -->
              @foreach ($products as $product)
              <div class="box-body">
                  <img src="{{ asset("/images/uploads/$product->preview_photo") }}" >
                  {{$product->title}}
                  {{$product->description}}

                  <a href="{{ url('admincp/products/edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{ url('admincp/products/delete', $product->id) }}" class="btn btn-primary btn-sm">Delete</a>
              </div>
              @endforeach
            </div>
          </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- <div class="row">
        <!-- Left col 
      <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-

          <div class="col-lg-6 col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">View new Product</h3>
              </div>
{{-- 
          @if($products->count())

            @foreach($products as $key => $product)
              <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="4">There are no data.</td>
            </tr>
          @endif
--}} 
            </div>
          </div>
     </section>
</div>
        <!-- right col -->
      
@endsection
