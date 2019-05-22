function loginHandler(){
	var username = $('#username').val();
    var password = $('#password').val();
	$.ajax({
        type: 'POST',
        url: 'index.php?r=site/checkin',
        data: 'username='+username+'&password='+password,
        success: function(response){
			alert(response);
		}
	})
}

function coba(){
	alert("wawawjhkj");
}