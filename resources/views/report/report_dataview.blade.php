@extends('layouts.admin')

@section('css')
<!-- DataTables -->

<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}"> -->


@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }} Date</h3>
                        <b class="float-right">{{$from}} - {{$to}}</b>
                    </div>
                 <!-- /.card-header -->
                 <table class="table table-bordered table-striped dataTable dtr-inline datatab display " style="width:100%">
                  <thead>
                  <tr>
                    <th>Credit/Debit</th>
                    <th>Order Date</th>
                    <th>Client Name</th>
                    <th>Contact</th>
                    <th>Grand Total</th>
                  </tr>
                  </thead>
                 
                  <tbody>
                    @foreach($sell as $key=>$valu)
                        <tr>
                            <td>Credited</td>
                            <td>{{$valu->bill_date}}</td>
                            <td>{{$valu->client_name}}</td>
                            <td>{{$valu->client_Contact}}</td>
                            <td>{{$valu->totel_amount}}</td>
                        </tr>
                    @endforeach
                    @foreach($bill as $key=>$valu)
                        <tr>
                            <td>Debited</td>
                            <td>{{$valu->bill_date}}</td>
                            <td>{{$valu->client_name}}</td>
                            <td>{{$valu->contact}}</td>
                            <td>{{$valu->amount}}</td>
                        </tr>
                    @endforeach
                  <!-- <tr>
                    <td>No</td>
                    <td>Order Date</td>
                    <td>Client Name</td>
                    <td>Contact</td>
                    <td>Credit/Debit</td>
                    <td>Grand Total</td>
                  </tr> -->
                  </tbody>
                  
                </table>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <!-- <button type="submit" class="btn btn-primary float-right">submit</button> -->
                        </div>
                        <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



@section('js')

<script>

  $(function () {
    $('.datatab').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // { extend: 'copyHtml5', className: 'btn btn-secondary' },
            { extend: 'csvHtml5', className: 'btn btn-secondary',  title: 'Report' },
            { extend: 'pdfHtml5', className: 'btn btn-secondary' , title: 'Report' },
            // 'copyHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
        ]
       
    } ).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>

@endsection