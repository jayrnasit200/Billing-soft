

function confirmDelete(id, item_name, action)
{
	var csrf = $('meta[name="csrf-token"]').attr('content');
	
	// console.log(item_name);
	// return false;
	var html  = '<div class="modal-dialog">'+
					'<form action="'+action+'" method="post">'+
						'<input type="hidden" name="_token" value="'+csrf+'">'+
						'<input type="hidden" name="id" value="'+id+'">'+
						'<div class="modal-content">'+
							'<div class="modal-header">'+
							'<h4 class="modal-title">Delete Confirmation</h4>'+
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
											'<span aria-hidden="true">&times;</span>'+
							'</button>'+
							'</div>'+
						
							'<div class="modal-body">'+
								'<div id="modal_error"></div>'+
								'<p>Are you sure to delete this '+item_name+'</p>'+
							'</div>'+
						
							'<div class="modal-footer with-border">'+
								'<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>'+
								'<button type="submit" class="btn btn-danger send_btn"> Delete</button>'+
							'</div>'+
						'</div>'+
					'</form>'+
				'</div>';
	$('#confirm_model').html(html);
	$('#confirm_model').modal('show');
}

function delete_items(frm,id){
	// console.log(frm);
	$("#id").val(id);
	$("#action").val("delete");
	$("#"+frm).submit();
}

    setTimeout(function () {
        $("#msg").fadeOut("fast");
    }, 5000); // <-- time in milliseconds
