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
                        <h3 class="card-title">{{ $title }} Date</h3>
                    </div>
                 <!-- /.card-header -->
                    <form action="{{ url('report/get') }}" method="post">@csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control " name="start_date" placeholder="sell_date">

                                    @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control " name="end_date" placeholder="sell_date">
                                    <!-- <input type="text" class="form-control @error('Brand_name') is-invalid @enderror" name="Brand_name" placeholder="End Date" value="{{ old('Brand_name') }}" /> -->
                                    @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
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
            </div>
        </div>
    </div>
</section>


@endsection



@section('js')

<script src="{{url('assets/plugins/jquery-ui/jquery-ui.js')}}"></script>

<script>
 $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>   

@endsection