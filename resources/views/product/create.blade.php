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
                    <form class="form-horizontal" method="post" action="{{ url('/product/create_submit') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Product Name" value="{{ old('name') }}" />
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                      <select class="form-control select2" name="brand">
                                        
                                        @foreach(get_all_brand() as $val)
                                        @if(old('brand')==$val->id)
                                        <option value="{{$val->id}}" selected>{{$val->name}}</option>
                                          @else

                                          <option value="{{$val->id}}">{{$val->name}}</option>
                                          @endif
                                        @endforeach
                                        @if(empty(old('gst')))
                                        <option selected="selected" value="">Select Brand</option>
                                      @endif
                                      </select>
                                    @error('brand')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control @error('qty') is-invalid @enderror" name="qty" placeholder="Quantity" value="{{ old('qty') }}" />
                                    @error('qty')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">MRP</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control @error('mrp') is-invalid @enderror" name="mrp" placeholder="MRP" value="{{ old('mrp') }}" />
                                    @error('mrp')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Rate</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control @error('rate') is-invalid @enderror" name="rate" placeholder="Rate" value="{{ old('rate') }}" />
                                    @error('rate')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">HSN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('hsm') is-invalid @enderror" name="hsm" placeholder="HSN" value="{{ old('hsm') }}" />
                                    @error('hsm')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">GST</label>
                                <div class="col-sm-10">
                                      <select class="form-control select2" name="gst">
                                      
                                        @foreach(get_all_gst() as $val)
                                        @if(old('gst')==$val->valu)
                                          <option value="{{$val->valu}}" selected>{{$val->name}}</option>
                                          @else

                                          <option value="{{$val->valu}}">{{$val->name}}</option>
                                          @endif
                                        @endforeach
                                        @if(empty(old('gst')))
                                      <option selected value="">Select GST</option>
                                      @endif
                                      </select>
                                    @error('gst')
                                    <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Ststus</label>
                                <div class="col-sm-10">
                                      <select class="form-control " name="ststus">
                                        <option selected="selected" value="available">Available</option>
                                        <option value="not_Available">Not Available</option>
                                        
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