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
                    <div class="box-header">
                        <h3 class="box-title">Create Worker</h3>

                        <div class="box-tools">
                            <a href="{{route('worker_list')}}" class="btn btn-primary">Worker List</a>
                        </div>
                      </div>
                    <!-- /.box-header -->
                    {{-- =================session success message==================== --}}
                   <div class="d-msg">


                    @if(Session::has('success'))
                        <div class="box box-success box-solid">
                            <div class="box-header">
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
                            <div class="box-header">
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
                              <option value="1">Lum worker</option>
                              <option value="2">Yern worker</option>
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
            </section>

            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
@endsection
