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
                <h3 class="card-title">{{ $title }} List</h3>
                <a href="{{url('sell/create')}}" class="btn btn-outline-info btn-default float-right">Create Sell</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Order Date</th>
                    <th>client Name</th>
                    <th>Order Amount</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  @php $no=1;
                  $delete_action="bill/delete";
                   @endphp
                  <tbody>
                  @foreach($sell as $valu)
                 <tr>
                    <td>{{$no++}}</td>
                    <td>{{$valu->bill_date}}</td>
                    <td>{{$valu->client_name}}</td>
                    <td>{{$valu->totel_amount}}</td>
                    <td>{{$valu->Payment_status}}</td>
                    <td> <a class="btn btn-default dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{url('sell/edit',$valu->id)}}"><i class="far fa-edit"></i> Edit</a>
                              <a class="dropdown-item" href="{{url('sell/sell_print',$valu->id)}}"><i class="fas fa-download"></i> Print</a>
                              <button class="dropdown-item" onClick="confirmDelete('{{$valu->id}}','Client Name :{{$valu->client_name}}','{{$delete_action}}')" ><i class="far fa-trash-alt"></i> Delete</button>
                            </div>
                        </td>
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
            </div>
            </div>
        </div>
    </div>
</section>


@endsection



@section('js')

    
   
@endsection