function viewTagihan(id){
    //alert(id);
	/*$.ajax({
        type: 'POST',
        url: 'tagihan/viewtag',
        data: 'id'=+id,
        success: function(response){
            //var resp = $(parseHTML(response, 'DIV'));
            //$('#rsakey').val(resp.html());
			alert(response);
        }
    })*/
	//alert(id);
	window.location='index.php?r=tagihan/viewtag&id='+id;
}

function updateStatus(){
alert('aaa');
}

