@extends('layouts.app')
@section('content')
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Setup
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Setup</a></li>
                    <li class="active">Create</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Create</h3>
                    </div>
                    <!-- /.box-header -->
                    {{-- =================session success message==================== --}}
                   <div class="d-msg">


                    @if(Session::has('success'))
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">{{ Session::get('success') }}</h3>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                          </div>
                     @endif
                    @if(Session::has('error'))
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title"> {{ Session::get('error') }}</h3>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                              <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                          </div>
                    @endif
                   </div>
                    {{-- =================session success message==================== --}}
                    <!-- form start -->
                    <form method="post" action="{{route('insert.worker')}}">
                        @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="InputWorker">w-setup</label>
                          <input type="text" name="worker_name" class="form-control" id="InputWorker" placeholder="Enter worker name">
                            @error('worker_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select type</label>
                            <select class="form-control" name="worker_type">
                                <option selected disabled>Select Type</option>
                              <option value="Worker_01">option 1</option>
                              <option value="Worker_02">option 2</option>
                              <option value="Worker_03">option 3</option>
                            </select>
                            @error('worker_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                <!-- /.box -->
                {{-- ===============table list================ --}}
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Condensed Full Width Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table class="table table-condensed">
                        <tbody>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Worker Name</th>
                          <th>Worker Type</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        @php
                            $sl = 1;
                            @endphp
                        @foreach ($worker_list as $worker)
                        <tr>
                          <td>{{$sl++}}.</td>
                          <td>{{$worker->worker_name}}</td>
                          <td>
                            {{$worker->worker_type}}
                          </td>
                          <td>{{$worker->status==='0'?'Active':'Inactive'}}</td>
                          <td><span class="badge bg-red">edit</span></td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                {{-- ===============table list================ --}}
            </section>

            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
@endsection
