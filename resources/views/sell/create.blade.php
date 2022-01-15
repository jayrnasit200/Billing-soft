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
                    <form class="form-horizontal" method="post" action="{{ url('/sell/create_submit') }}">
                        @csrf
                        

                        <div class="card-body">
                        <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Order Date</label>
                                <div class="col-sm-10">
                                    <input type="date"  class="form-control @error('sell_date') is-invalid @enderror" name="sell_date" placeholder="sell_date" value="{{ old('sell_date') }}" />
                                    @error('sell_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client </label>
                                <div class="col-sm-5">
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="old_Client" value="old_Client" name="Select_client" @if (old('Select_client') != "new_Client") checked @endif >
                                        <label class="custom-control-label" for="old_Client">Old Client</label>
                                    </div>
                                </div>
                                        <div class="col-sm-5">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="new_Client" value="new_Client" name="Select_client" @if (old('Select_client') == "new_Client") checked @endif>
                                            <label class="custom-control-label" for="new_Client">New Client</label>
                                        </div>
                                        </div>
                            </div>

                            <div class="form-group row" id="old_client_select">
                                <label  class="col-sm-2 col-form-label">Select Client</label>
                                <div class="col-sm-10">
                                      <select class="form-control select2" name="Client_name">
                                      <option value="" selected>Select Client</option>
                                      @foreach(get_all_sellr_Client() as $val)
                                      <option value="{{$val->id}}" @if ($val->id == old('Client_name')) selected="selected"  @endif>{{$val->client_name}} (GST: {{$val->client_gst_no}})</option>
                                      @endforeach
                                      </select>
                                    @error('Client_name')
                                    <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control @error('new_c_name') is-invalid @enderror" id="c_name" name="new_c_name" placeholder="Client Name" value="{{ old('new_c_name') }}" />
                                    @error('new_c_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly id="client_contact" class="form-control @error('client_contact') is-invalid @enderror" name="client_contact" placeholder="Client Contact" value="{{ old('client_contact') }}" />
                                    @error('client_contact')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client GST No</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly id="client_gst" class="form-control @error('client_gst') is-invalid @enderror" name="client_gst" placeholder="Client GST No" value="{{ old('client_gst') }}" />
                                    @error('client_gst')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Client Address</label>
                                <div class="col-sm-10">
                                    <textarea readonly id="client_addres" name="client_addres" rows="3" placeholder="Client Address" class="form-control @error('client_addres') is-invalid @enderror" >{{ old('client_addres') }}</textarea>
                                
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
                                    <th style="width: 10%;">GST</th>
                                    <th style="width: 10%;">Quantity</th>
                                    <th style="width: 15%;">Total</th>
                                    <th style="width: 10%;"><a onclick="addRow()" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                </tr>
                            </thead>
                           
                                @if(old('productName'))
                                    <tbody>
                                        @foreach(old('productName') as $key=>$val)
                                            <tr id="row{{ $key }}" class="0">
                                                <td style="margin-left: 20px;">
                                                    <div class="form-group">
                                                        <select class="form-control select2" name="productName[]" id="productName{{ $key }}" onchange="getProductData({{ $key }})">
                                                            <option value="">~~SELECT~~</option>
                                                            @foreach(get_all_products() as $valu)
                                                            <option value="{{ $valu->id }}" id="changeProduct{{ $valu->id }}" @if($val == $valu->id) selected @endif>{{ $valu->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <input type="text" name="rate[]" readonly id="rate{{ $key }}" value="{{ old('rate')[$key] ?? '' }}" autocomplete="off" class="form-control" />
                                                </td>
                                                <td style="padding-left: 20px;">
                                                <input type="text" name="gst[]" readonly id="gst{{ $key }}" value="{{ old('gst')[$key] ?? '' }}" autocomplete="off" class="form-control" />
                                                    <input type="hidden" readonly id="gstpt{{ $key }}" />
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <div class="form-group">
                                                        <input type="text" name="quantity[]" id="quantity{{ $key }}" value="{{ old('quantity')[$key] ?? '' }}" onkeyup="getTotal({{ $key }})" autocomplete="off" class="form-control" min="1" />
                                                    </div>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <input type="text" name="total[]" id="total{{ $key }}" value="{{ old('total')[$key] ?? '' }}" autocomplete="off" class="form-control" readonly="true" />
                                                    <input type="hidden" name="totalValue[]" value="{{ old('totalValue')[$key] ?? '' }}" id="totalValue{{ $key }}" autocomplete="off" class="form-control" />
                                                </td>
                                                <td>
                                                    <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow({{ $key }})"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr id="row50" class="0">
                                            <td style="margin-left: 20px;">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="productName[]" id="productName50" onchange="getProductData(50)">
                                                        <option value="">~~SELECT~~</option>
                                                        @foreach(get_all_products() as $valu)
                                                        <option value="{{ $valu->id }}" id="changeProduct{{ $valu->id }}">{{ $valu->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td style="padding-left: 20px;">
                                                <input type="text" name="rate[]" readonly id="rate50" autocomplete="off" class="form-control" />
                                            </td>
                                            <td style="padding-left: 20px;">
                                            <input type="text" name="gst[]" readonly id="gst50" autocomplete="off" class="form-control" />
                                                <input type="hidden" readonly id="gstpt50" />
                                            </td>
                                            <td style="padding-left: 20px;">
                                                <div class="form-group">
                                                    <input type="text" name="quantity[]" id="quantity50" onkeyup="getTotal(50)" autocomplete="off" class="form-control" min="1" />
                                                </div>
                                            </td>
                                            <td style="padding-left: 20px;">
                                                <input type="text" name="total[]" id="total50" autocomplete="off" class="form-control" readonly="true" />
                                                <input type="hidden" name="totalValue[]" id="totalValue50" autocomplete="off" class="form-control" />
                                            </td>
                                            <td>
                                                <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(50)"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                        </table>
                        @error('productName.*') <b><span class="text-danger">{{ $message }}</span></b>@enderror
                    </div>
                    <!-- end tabel -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Sub Amount</label>
                                <div>
                                    <input type="text" class="form-control" id="subTotal" value="{{ old('subTotal') }}" name="subTotal"  readonly />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="gstTotal" class="col-sm-3 control-label">Gst Total</label>
                                <div>
                                    <input type="text" class="form-control" id="gstTotal" value="{{ old('gstTotal') }}" name="gstTotal" readonly />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Total Amount</label>
                                <div>
                                    <input type="text" class="form-control" id="totalAmount" value="{{ old('totalAmount') }}" name="totalAmount" readonly />
                                </div>
                            </div>
                            <!--/form-group-->
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Paid Amount</label>
                                <div>
                                    <input type="text" class="form-control" id="paid" value="{{ old('paid') }}" name="paid" autocomplete="off" onkeyup="paidAmount()" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="due" class="col-sm-3 control-label">Due Amount</label>
                                <div>
                                    <input type="text" class="form-control" value="{{ old('due') }}" id="due" name="due" readonly />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
                                <div>
                                    <select class="form-control" name="paymentType" id="paymentType">
                                        <option value="">~~SELECT~~</option>
                                        <option value="cheque" {{ (old("paymentType") == "cheque" ? "selected":"") }}>Cheque</option>
                                        <option value="cash" {{ (old("paymentType") == "cash" ? "selected":"") }}>Cash</option>
                                        <option value="credit_Card" {{ (old("paymentType") == "credit_Card" ? "selected":"") }}>Credit Card</option>
                                    </select>
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
                                <div>
                                    <select class="form-control" name="paymentStatus" id="paymentStatus">
                                        <option value="">~~SELECT~~</option>
                                        <option value="Full_Payment" {{ (old("paymentStatus") == "Full_Payment" ? "selected":"") }}>Full Payment</option>
                                        <option value="Advance_Payment" {{ (old("paymentStatus") == "Advance_Payment" ? "selected":"") }}>Advance Payment</option>
                                        <option value="No_Payment" {{ (old("paymentStatus") == "No_Payment" ? "selected":"") }}>No Payment</option>
                                    </select>
                                </div>
                            </div>
                            <!--/form-group-->
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
<script>
    $( document ).ready(function() {
        $('input[name="Select_client"]:checked').each(function() {
            if(this.value == "new_Client") {
                document.getElementById("old_client_select").style.display = "none";
                $('#c_name').removeAttr("readonly");
                $('#client_contact').removeAttr("readonly");
                $('#client_gst').removeAttr("readonly");
                $('#client_addres').removeAttr("readonly");
            }
        });

        
    });
    $("#old_Client").click(function(){
        // alert("old");
        document.getElementById("old_client_select").style.display = null;
        $('#c_name').attr('readonly', 'readonly');
        $('#client_contact').attr('readonly', 'readonly');
        $('#client_gst').attr('readonly', 'readonly');
        $('#client_addres').attr('readonly', 'readonly');

    });

    $("#new_Client").click(function(){
        // alert("new");
        document.getElementById("old_client_select").style.display = "none";
        $('#c_name').removeAttr("readonly");
        $('#client_contact').removeAttr("readonly");
        $('#client_gst').removeAttr("readonly");
        $('#client_addres').removeAttr("readonly");
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
					var gst = Number(response.rate) / 100 * Number(response.GST);
					total = total.toFixed(2);
                    // alert(gst)gstpt
					$("#total"+row).val(total);
					$("#gst"+row).val(gst);
					$("#gstpt"+row).val(response.GST);
					$("#totalValue"+row).val(total);
					subAmount();
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
        var gst = Number($("#rate"+row).val()) / 100 * Number($("#gstpt"+row).val()) * Number($("#quantity"+row).val());
        // alert(gst)
		total = total.toFixed(2);
		$("#total"+row).val(total);
		$("#gst"+row).val(gst);
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
    count = 51;
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
                '<input type="text" name="rate[]" readonly id="rate'+count+'" autocomplete="off" class="form-control" />'+
                '<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
            '</td style="padding-left:20px;">'+
            '<td style="padding-left: 20px;">'+
            '<input type="text" name="gst[]" readonly="" id="gst'+count+'" autocomplete="off" class="form-control">'+
                '<input type="hidden" readonly="" id="gstpt'+count+'">'+
            '</td>'+
            '<td style="padding-left:20px;">'+
                '<div class="form-group">'+
                '<input type="text" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
                '</div>'+
            '</td>'+
            '<td style="padding-left:20px;">'+
                '<input type="text" name="total[]" id="total'+count+'" readonly="true" autocomplete="off" class="form-control"/>'+
                '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" readonly="true" autocomplete="off" class="form-control" />'+
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
        $('.select2').select2();
    } // /success
});	// get the product data

} // /add row

function subAmount() {
	
	var tableProductLength = $("#productTable tbody tr").length;
	var totalSubAmount = 0;
	var totalgst = 0;
	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

		totalSubAmount = Number(totalSubAmount) + Number($("#total"+count).val());
		totalgst = Number(totalgst) + Number($("#gst"+count).val());
	} // /for
    // alert(totalgst)
	totalSubAmount = totalSubAmount.toFixed(2);

	// sub total
	$("#subTotal").val(totalSubAmount - totalgst);
	$("#subTotalValue").val(totalSubAmount - totalgst);

	
	$("#gstTotal").val(totalgst);
	

	// total amount
	var totalAmount = (Number($("#subTotal").val()) + Number(totalgst));
	totalAmount = totalAmount.toFixed(2);
	$("#totalAmount").val(totalAmount);
	$("#totalAmountValue").val(totalAmount);

	
	var paidAmount = $("#paid").val();
	if(paidAmount) {
		paidAmount =  Number($("#totalAmount").val()) - Number(paidAmount);
		paidAmount = paidAmount.toFixed(2);
		$("#due").val(paidAmount);
		$("#dueValue").val(paidAmount);
	} else {	
		$("#due").val($("#totalAmount").val());
		$("#dueValue").val($("#totalAmount").val());
	} // else

} // /sub total amount

function paidAmount() {
	var grandTotal = $("#totalAmount").val();

	if(grandTotal) {
		var dueAmount = Number($("#totalAmount").val()) - Number($("#paid").val());
		dueAmount = dueAmount.toFixed(2);
		$("#due").val(dueAmount);
		$("#dueValue").val(dueAmount);
	} // /if
} // /paid amoutn function


</script>
@endsection