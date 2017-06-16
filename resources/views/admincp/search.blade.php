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
               <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

        <form action="{{url('admincp/search')}}" method="get">
          {{ csrf_field() }}
          <div class="input-group">
             <input type="text" class="form-control" name="productsearch"
            placeholder="Search Products">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="search">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
          </div>
        </form>
      </div>
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

            </div>
          </div>

        </div>
     </section>

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
