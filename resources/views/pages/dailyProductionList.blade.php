@extends('layouts.app')
@section('content')
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Master Setup
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Setup</a></li>
                    <li class="active">Daily Production List</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

                        <div class="box-tools">
                            <a href="{{route('createDailyProduction')}}" class="btn btn-primary">Create Daily Production</a>
                        </div>
                      </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>Worker Name</th>
                          <th>Date-01</th>
                          <th>Date-02</th>
                          <th>Date-03</th>
                          <th>Date-04</th>
                          <th>Date-05</th>
                          <th>Date-06</th>
                          <th>Date-07</th>
                          <th>Total Pcs</th>
                          <th>Total Bill</th>
                          <th>Payment</th>
                          <th>Balance</th>
                        </tr>
                        {{-- @php
                        $key = 1;
                        @endphp

                        @if (count($billPriceList)>0)
                        @foreach ($billPriceList as $BillPrice)
                        <tr>
                            <td>{{$key++}}</td>
                            <td>{{$BillPrice->worker_type==='1' ? 'Lum worker' : 'Yern worker'}}</td>
                            <td>{{$BillPrice->bill_price}}</td>
                            <td>{{ $BillPrice->status ==='0' ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <button class="btn btn-info btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                          </tr>
                          @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-primary">Data Not Available</td>
                        </tr>
                        @endif --}}



                      </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div>
                  </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
@endsection
