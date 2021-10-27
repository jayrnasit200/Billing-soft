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
                    <form class="form-horizontal" method="post" action="{{ url('/brand/create_submit') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('Brand_name') is-invalid @enderror" name="Brand_name" placeholder="Product Name" value="{{ old('Brand_name') }}" />
                                    @error('Brand_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                      <select class="form-control select2" name="brand">
                                        <option selected="selected" value="">Select Brand</option>
                                        @foreach(get_all_brand() as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                      </select>
                                    @error('ststus')<span class="text-danger">{{ $message }}</span>@enderror
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