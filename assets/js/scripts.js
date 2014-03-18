//Request Error function
function rError()
{
    $('#connectionError').removeClass('hidden');
    $('#connectionError').addClass('show');
}
//Request Success function
function rSuccess(returnedData)
{
	var  data = JSON.parse(returnedData);
	//alert(returnedData);
	if(data.has_error)
	{
        $('#inputError').removeClass('hidden');
		$('#inputError').addClass('show');

		if(data.pib)
			$('#pib').parent().addClass('has-error');
		else
			$('#pib').parent().addClass('has-success');

		if(data.phone)
			$('#phone').parent().addClass('has-error');
		else
			$('#phone').parent().addClass('has-success');

		if(data.addr)
			$('#addr').parent().addClass('has-error');
		else if($('#addr').val() != '')
			$('#addr').parent().addClass('has-success');

		if(data.count)
			$('#count').parent().addClass('has-error');
		else
			$('#count').parent().addClass('has-success');

		if(data.captcha)
		{
			$('#captcha').parent().addClass('has-error');
			$('#captcha_img').attr('src','pages/captcha');
		}
		else
			$('#captcha').parent().addClass('has-success');
	}
	else
    {
		$('#requestSucces').removeClass('hidden');
        $('#requestSucces').addClass('show');
    }
}
//Request complete function
function rComplete()
{
	$('#submit').html('Оформити заявку');
	$('#submit').removeAttr('disabled');
}
//Ajax request
$('#submit').click(function(e){
	e.preventDefault();
	$('.form-group').each(function(){$(this).attr('class','form-group')});
	$('.alert').each(function(){$(this).addClass('hidden')});
	$(this).attr('disabled','disabled');
	$(this).html('Надсилання заявки…');
	$.ajax('pages/validator',{
		cache:false,
		complete:rComplete,
		data:{
				'pib':$('#pib').val(),
				'phone':$('#phone').val(),
				'addr':$('#addr').val(),
				'commodity':$('input:radio[name=commodity]:checked').val(),
				'count':$('#count').val(),
				'captcha':$('#captcha').val(),
				'ajax':'TRUE'
			},
		error:rError,
		success:rSuccess,
		timeout:20000,
		type:'post'
	});
});
//Captcha refresh
$('.glyphicon-refresh').click(function(){$('#captcha_img').attr('src','pages/captcha');});

//Active tabs
/*var active = $('#nav').attr('data-active');
$('.nav a').each(function(){
	if($(this).html() == active)
		$(this).parent().addClass('active');
});*/
$('#nav a:contains('+$('#nav').attr('data-active')+')').parent().addClass('active');