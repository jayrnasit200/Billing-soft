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
		'<td style="padding-left: 20px;">'+
		'<input type="text" name="gst[]" disabled="" id="gst'+count+'" autocomplete="off" class="form-control">'+
			'<input type="hidden" name="gst" disabled="" id="gstpt'+count+'">'+
		'</td>'+
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
	$('.select2').select2();
} // /success
});	// get the product data

} // /add row

function subAmount() {

var sgst = $("#sgst").val();
var cgst = $("#cgst").val();
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
$("#subTotal").val(totalSubAmount);
$("#subTotalValue").val(totalSubAmount);


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

