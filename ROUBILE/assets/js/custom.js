
function run(id, dari, ke){
	$('#ddari').html(dari);
	$('#dke').html(ke);
	$('#lihat').attr("href", $('#lihat').attr("href")+'?id='+id);
	$('#edit').attr("href", $('#edit').attr("href")+'?id='+id);
	$('#hapus').attr("href", $('#hapus').attr("href")+'?id='+id);
}

$(this).ready(function(){
	try {	
	if($('#dari').val().length ==0&&$('#ke').val().length ==0){
        $('.btncari').attr('disabled', true);
    }
    $('#dari').on('change keyup',function(event){
    	disableButton();
    })
    $('#ke').on('change keyup',function(event){
    	disableButton();
    })
    function disableButton(){
    	if($('#dari').val().length !=0||$('#ke').val().length !=0){
            $('.btncari').attr('disabled', false);
        }
        else{
        $('.btncari').attr('disabled',true);
        $('#error').fadeOut(1000);
        }
    }
	} catch (e) {
		// TODO: handle exception
	}
});