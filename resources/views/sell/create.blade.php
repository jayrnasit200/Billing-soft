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
                    <form class="form-horizontal" method="post" action="{{ url('/bill/create_submit') }}">
                        @csrf
                        <div class="card-body">
                        <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Order Date</label>
                                <div class="col-sm-10">
                                    <input type="date"  class="form-control @error('bill_date') is-invalid @enderror" name="bill_date" placeholder="bill_date" value="{{ old('bill_date') }}" />
                                    @error('bill_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client </label>
                                <div class="col-sm-5">
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="old_Client" value="old_Client" name="Select_client" checked>
                                        <label class="custom-control-label" for="old_Client">Old Client</label>
                                    </div>
                                </div>
                                        <div class="col-sm-5">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="new_Client" value="new_Client" name="Select_client" >
                                            <label class="custom-control-label" for="new_Client">New Client</label>
                                        </div>
                                        </div>
                                        
                            </div>

                            <div class="form-group row" id="old_client_select">
                                <label  class="col-sm-2 col-form-label">Select Client</label>
                                <div class="col-sm-10">
                                      <select class="form-control select2" name="gst">
                                      <option value="" selected>Select Client</option>
                                      <option value="111" >jay</option>
                                      </select>
                                    @error('gst')
                                    <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control @error('c_name') is-invalid @enderror" id="c_name" name="c_name" placeholder="Client Name" value="{{ old('c_name') }}" />
                                    @error('c_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled id="client_contact" class="form-control @error('client_contact') is-invalid @enderror" name="client_contact" placeholder="Client Contact" value="{{ old('client_contact') }}" />
                                    @error('client_contact')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client GST No</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled id="client_gst" class="form-control @error('client_gst') is-invalid @enderror" name="client_gst" placeholder="Client GST No" value="{{ old('client_gst') }}" />
                                    @error('client_gst')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Address</label>
                                <div class="col-sm-10">
                                    <textarea disabled id="client_addres" name="client_addres" rows="3" placeholder="Client Address" class="form-control @error('client_addres') is-invalid @enderror" >{{ old('client_addres') }}</textarea>
                                
                                    @error('client_addres')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            
                    <!-- start tabel -->
                    <div class="row">
                        
                        <table class="table" id="productTable">
                            <thead>
                                <tr>
                                    <th style="width: 40%;">Product</th>
                                    <th style="width: 20%;">Rate</th>
                                    <th style="width: 15%;">Quantity</th>
                                    <th style="width: 15%;">Total</th>
                                    <th style="width: 10%;"><a onclick="addRow()" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="row1" class="0">
                                    <td style="margin-left: 20px;">
                                        <div class="form-group">
                                            <select class="form-control select2" name="productName[]" id="productName1" onchange="getProductData(1)">
                                                <option value="">~~SELECT~~</option>
                                                @foreach(get_all_products() as $valu)
                                                <option value="{{ $valu->id }}" id="changeProduct{{ $valu->id }}">{{ $valu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <input type="text" name="rate[]" disabled id="rate1" autocomplete="off" class="form-control" />
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <div class="form-group">
                                            <input type="text" name="quantity[]" id="quantity1" onkeyup="getTotal(1)" autocomplete="off" class="form-control" min="1" />
                                        </div>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <input type="text" name="total[]" id="total1" autocomplete="off" class="form-control" disabled="true" />
                                        <input type="hidden" name="totalValue[]" id="totalValue1" autocomplete="off" class="form-control" />
                                    </td>
                                    <td>
                                        <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(1)"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end tabel -->


                            <!-- <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Ststus</label>
                                <div class="col-sm-10">
                                      <select class="form-control " name="ststus">
                                        <option selected="selected" value="available">Available</option>
                                        <option value="not_Available">Not Available</option>
                                        
                                      </select>
                                    @error('ststus')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> -->


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
<script>
    $("#old_Client").click(function(){
        // alert("old");
        document.getElementById("old_client_select").style.display = null;
        $('#c_name').attr('disabled', 'disabled');
        $('#client_contact').attr('disabled', 'disabled');
        $('#client_gst').attr('disabled', 'disabled');
        $('#client_addres').attr('disabled', 'disabled');

    });

    $("#new_Client").click(function(){
        // alert("new");
        document.getElementById("old_client_select").style.display = "none";
        $('#c_name').removeAttr("disabled");
        $('#client_contact').removeAttr("disabled");
        $('#client_gst').removeAttr("disabled");
        $('#client_addres').removeAttr("disabled");
    });

    function getProductData(row = null) {
	if(row) {
		var productId = $("#productName"+row).val();		
        
		if(productId == "") {
			$("#rate"+row).val("");

			$("#quantity"+row).val("");						
			$("#total"+row).val("");

		} else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			$.ajax({
                url:"{{ url('getproductdata') }}",
				type: 'post',
				data: {productId : productId},
				dataType: 'json',
				success:function(response) {
					$("#rate"+row).val(response.rate);
					$("#rateValue"+row).val(response.rate);

					$("#quantity"+row).val(1);

					var total = Number(response.rate) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
					// subAmount();
                }
			});
		}
				
	} else {
		alert('no row! please refresh the page');
	}
} 
//  totele qty
function getTotal(row = null) {
	if(row) {
		var total = Number($("#rate"+row).val()) * Number($("#quantity"+row).val());
		total = total.toFixed(2);
		$("#total"+row).val(total);
		$("#totalValue"+row).val(total);
		
		subAmount();

	} else {
		alert('no row !! please refresh the page');
	}
}
// remove row
function removeProductRow(row = null) {
	if(row) {
		$("#row"+row).remove();


		subAmount();
	} else {
		alert('error! Refresh the page again');
	}
}

function addRow() {
$("#addRowBtn").button("loading");

var tableLength = $("#productTable tbody tr").length;

var tableRow;
var arrayNumber;
var count;

if(tableLength > 0) {		
    tableRow = $("#productTable tbody tr:last").attr('id');
    arrayNumber = $("#productTable tbody tr:last").attr('class');
    count = tableRow.substring(3);	
    count = Number(count) + 1;
    arrayNumber = Number(arrayNumber) + 1;					
} else {
    // no table row
    count = 1;
    arrayNumber = 0;
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url:"{{ url('getallproductdata') }}",
    type: 'post',
    dataType: 'json',
    success:function(response) {
        $("#addRowBtn").button("reset");			

        var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
            '<td>'+
                '<div class="form-group">'+

                '<select class="form-control select2" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
                    '<option value="">~~SELECT~~</option>';
                    // console.log(response);
                    $.each(response, function(index, value) {
                        tr += '<option value="'+value.id+'">'+value.name+'</option>';							
                    });
                                                
                tr += '</select>'+
                '</div>'+
            '</td>'+
            '<td style="padding-left:20px;"">'+
                '<input type="text" name="rate[]" disabled id="rate'+count+'" autocomplete="off" class="form-control" />'+
                '<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
            '</td style="padding-left:20px;">'+
            '<td style="padding-left:20px;">'+
                '<div class="form-group">'+
                '<input type="text" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
                '</div>'+
            '</td>'+
            '<td style="padding-left:20px;">'+
                '<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control"/>'+
                '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
            '</td>'+
            '<td>'+
                '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="fas fa-trash-alt"></i></button>'+
            '</td>'+
        '</tr>';
        if(tableLength > 0) {							
            $("#productTable tbody tr:last").after(tr);
        } else {				
            $("#productTable tbody").append(tr);
        }		

    } // /success
});	// get the product data

} // /add row
</script>
@endsection