$(document).ready(function(){
	$("#toast").fadeIn().delay(2000).fadeOut();
	$("#alert").modal("show");
});

function showConfirm(title, msg, yesFunc){
	var yesClk = false;
	var modal ='<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="jConfirm">'
				+'<div class="modal-dialog modal-sm" role="document">'
				+'	<div class="modal-content">'
				+'		<div class="modal-header">'
				+'			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
				+'			<h4 class="modal-title">'+title+'</h4>'
				+'		</div>'
				+'		<div class="modal-body">'+msg+'</div>'
				+'		<div class="modal-footer">'
				+'			<button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-yes">Yes</button>'
				+'			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>'
				+'		</div>'
				+'	</div>'
				+'</div>'
			+'</div>';
	$("body").append(modal);
	$("#btn-yes").click(function(){yesClk=true;});
	$('#jConfirm').on('hidden.bs.modal', function (e) {$('#jConfirm').remove();if(yesClk)eval(yesFunc);});
	$("#jConfirm").modal("show");
}

function showAlert(title, msg){
	var modal ='<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="jAlert">'
				+'<div class="modal-dialog modal-sm" role="document">'
				+'	<div class="modal-content">'
				+'		<div class="modal-header">'
				+'			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
				+'			<h4 class="modal-title">'+title+'</h4>'
				+'		</div>'
				+'		<div class="modal-body">'+msg+'</div>'
				+'	</div>'
				+'</div>'
			+'</div>';
	$("body").append(modal);
	$('#jAlert').on('hidden.bs.modal', function (e) {$('#jAlert').remove();});
	$("#jAlert").modal("show");
}