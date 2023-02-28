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
                      <h3 class="box-title">Create Bill Price</h3>
                      <button type="submit" class="btn btn-primary">Bill Price List</button>
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
                    <form method="post" action="{{route('insert_bill_price')}}">
                        @csrf
                      <div class="box-body">
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
                        <div class="form-group">
                          <label for="InputWorker">P-setup</label>
                          <input type="number" name="bill_price" class="form-control" id="BillPrice" placeholder="Enter bill price">
                            @error('bill_price')
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
