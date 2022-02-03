@extends('layouts.admin')

@section('css')

@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <form class="form-horizontal" method="post" action="{{ url('/bill/update_submit') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="hidden" name="paym_id" value="{{$data->payment_id}}">
                        <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('c_name') is-invalid @enderror" name="c_name" placeholder="Client Name" value="{{ old('c_name',$data->client_name) }}" />
                                    @error('c_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('c_contact') is-invalid @enderror" name="c_contact" placeholder="Client contact" value="{{ old('c_contact',$data->contact) }}" />
                                    @error('c_contact')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Bill No</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control @error('bil_no') is-invalid @enderror" name="bil_no" placeholder="Bill No" value="{{ old('bil_no',$data->bill_no) }}" />
                                    @error('bil_no')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Bill Date</label>
                                <div class="col-sm-10">
                                    <input type="date"  class="form-control @error('bill_date') is-invalid @enderror" name="bill_date" placeholder="bill_date" value="{{ old('bill_date',$data->bill_date) }}" />
                                    @error('bill_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Bill GST</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('bill_gst') is-invalid @enderror" name="bill_gst" placeholder="Bill Gst" value="{{ old('bill_gst',$data->bill_gst) }}" />
                                    @error('bill_gst')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Bill Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('bill_amount') is-invalid @enderror" name="bill_amount" placeholder="Amount" value="{{ old('bill_amount',$data->amount) }}" />
                                    @error('bill_amount')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Ststus</label>
                                <div class="col-sm-10">
                                      <select class="form-control " name="ststus">
                                        <option {{ ($data->Payment_ststus == 'available' ? "selected":"") }} value="available" >Available</option>
                                        <option {{ ($data->Payment_ststus == 'not_Available' ? "selected":"") }} value="not_Available">Not Available</option>
                                        
                                      </select>
                                    @error('ststus')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>


@endsection



@section('js')

    
   
@endsection