@extends('layouts.admin')

@section('css')
<!-- DataTables -->

 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}">

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
                    <form class="form-horizontal" method="post" action="{{ url('/brand/create_update') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('Brand_name') is-invalid @enderror" name="Brand_name" placeholder="Brand Name" value="{{ old('Brand_name',$data->name) }}" />
                                    @error('Brand_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Ststus</label>
                                <div class="col-sm-10">
                                      <select class="form-control " name="ststus">
                                        <option {{ ($data->ststus == 'available' ? "selected":"") }} value="available" >Available</option>
                                        <option {{ ($data->ststus == 'not_Available' ? "selected":"") }} value="not_Available">Not Available</option>
                                        
                                      </select>
                                    @error('ststus')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">

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