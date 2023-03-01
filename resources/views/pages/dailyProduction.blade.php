@extends('layouts.app')
@section('content')
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Daily Production
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Setup</a></li>
                    <li class="active">Daily Production</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create Daily Production</h3>

                        <div class="box-tools">
                            <a href="{{route('dailyProductionList')}}" class="btn btn-primary">Weekly Production List</a>
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
                    <div class="box-body">
                    <!-- form start -->
                    <form method="post" action="{{route('insertDailyProduction')}}">
                        @csrf
                        <table class="table table-bordered">
                            <tbody><tr>
                              <th>Worker Name</th>
                              <th>Bill Price</th>
                              <th>Qty</th>
                              <th>Total</th>
                            </tr>
                            @if (count($workerDailyProduction)>0)
                            @php $i = 0; @endphp
                            @foreach ($workerDailyProduction as $production)
                                @php $i++; @endphp
                            <tr>
                                <td><input type="text" name="worker_id[]" value="{{$production->w_id}}" hidden>{{$production->worker_name}}</td>
                                <td><input type="number" name="bill_price[]" id="bill_price_{{ $i }}" value="{{number_format($production->bill_price)}}" hidden>{{number_format($production->bill_price)}}</td>
                                <td style="width:250px"><input type="number" name="qty[]" id="qty_{{ $i }}" onkeyup="total_price(this, {{ $i }})" class="form-control" placeholder="pcs"></td>
                                <td style="width:250px">
                                    <input type="number" id="total_{{ $i }}" name="total[]" class="form-control" placeholder="Total" readonly>
                                </td>
                              </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-primary">Data Not Available</td>
                                </tr>
                            @endif

                          </tbody></table>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                <!-- /.box -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    <script>
    function total_price(e, sl)
        {
            var bill_price = document.getElementById('bill_price_'+sl);
            var qty = $(e).val();
            var total = bill_price.value * qty;
            $("#total_"+sl).val(total);
        }
    </script>
@endsection
