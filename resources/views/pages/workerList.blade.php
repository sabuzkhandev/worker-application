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
                    <li class="active">Worker List</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Worker List Report</h3>

                        <div class="box-tools">
                            <a href="{{route('create.worker')}}" class="btn btn-primary">Create Worker</a>
                        </div>
                      </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table class="table table-bordered">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th>Worker Type</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        @php
                        $key = 1;
                        @endphp
                        @if (count($workerLists)>0)
                        @foreach ($workerLists as $workerListItem)
                        <tr>
                            <td>{{$key++}}</td>
                            <td>{{$workerListItem->worker_name}}</td>
                            <td>{{$workerListItem->worker_type === '1' ? 'Lum worker' : 'Yern worker'}}</td>
                            <td>{{ $workerListItem->status ==='0' ? 'Active' : 'Inactive' }}</td>
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
                        @endif


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
