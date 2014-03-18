//Request Error function
function rError()
{
    $('#connectionError').removeClass('hidden');
    $('#connectionError').addClass('show');
}
//Request Success function
function pSuccess(returnedData)
{
    var  data = JSON.parse(returnedData);
    //alert($('#bean_price').val());
    if(data.has_error)
    {
        $('#inputError').removeClass('hidden');
        $('#inputError').addClass('show');

        if(data.bean_price)
            $('#bean_price').parent().addClass('has-error');
        else
            $('#bean_price').parent().addClass('has-success');

        if(data.oil_price)
            $('#oil_price').parent().addClass('has-error');
        else
            $('#oil_price').parent().addClass('has-success');
    }
    else
    {
        $('#priceSuccess').removeClass('hidden');
        $('#priceSuccess').addClass('show');
    }
}
//Request Success function
function iSuccess(returnedData)
{
    var  data = JSON.parse(returnedData);
    //alert($('#bean_price').val());
    if(data.has_error)
    {
        $('#inputError').removeClass('hidden');
        $('#inputError').addClass('show');

        if(data.email)
            $('#email').parent().addClass('has-error');
        else
            $('#email').parent().addClass('has-success');

        if(data.phone)
            $('#phone').parent().addClass('has-error');
        else
            $('#phone').parent().addClass('has-success');

        if(data.name)
            $('#name').parent().addClass('has-error');
        else
            $('#name').parent().addClass('has-success');
    }
    else
    {
        $('#priceSuccess').removeClass('hidden');
        $('#priceSuccess').addClass('show');
    }
}
//Request complete function
function pComplete()
{
    $('#change_price').html('Оновити ціну');
    $('#change_price').removeAttr('disabled');
}
//Request complete function
function iComplete()
{
    $('#change_info').html('Оновити інформацію');
    $('#change_info').removeAttr('disabled');
}
//Ajax request prices update
$('#change_price').click(function(e){
    e.preventDefault();
    $('.input-group').attr('class','input-group');
    $('.alert').each(function(){$(this).addClass('hidden')});
    $(this).attr('disabled','disabled');
    $(this).html('Зміна цін…');
    $.ajax('price_validator',{
        cache:false,
        complete:pComplete,
        data:{
            'bean_price':$('#bean_price').val(),
            'oil_price':$('#oil_price').val()
        },
        error:rError,
        success:pSuccess,
        timeout:20000,
        type:'post'
    });
});
//Ajax request info update
$('#change_info').click(function(e){
    e.preventDefault();
    $('.input-group').attr('class','input-group');
    $('.alert').each(function(){$(this).addClass('hidden')});
    $(this).attr('disabled','disabled');
    $(this).html('Інформація оновлюється…');
    $.ajax('info_validator',{
        cache:false,
        complete:iComplete,
        data:{
            'email':$('#email').val(),
            'phone':$('#phone').val(),
            'name':$('#name').val()
        },
        error:rError,
        success:iSuccess,
        timeout:20000,
        type:'post'
    });
});
//Captcha refresh
$('.glyphicon-refresh').click(function(){$('#captcha_img').attr('src','pages/captcha');});
//Current page highlight
$('#nav a:contains('+$('#nav').attr('data-active')+')').parent().addClass('active');
//Select all/nothing orders
$('#check_all').click(function () {
	if($(this).is(':checked'))
		$('input[name=selector]').prop('checked',true);
	else
		$('input[name=selector]').prop('checked',false);
});
//Надсилання списку переглянутих замовлень

$('input:checkbox').click(function(){
    if($('input:checkbox').is(':checked') && !$('a').is('#set_viewed'))
    {
        var arr = [];
        $('.control-bar').append('<div class="btn-group"><a href="#" id="set_viewed" class="btn btn-success btn-sm" title="Відмітити виділені, як переглянуті"><span class="glyphicon glyphicon-eye-open"></span></a>' +
            '<a href="#" id="set_archived" class="btn btn-success btn-sm" title="Перемістити виділені до архіву"><span class="glyphicon glyphicon-inbox"></span></a>' +
            '<a href="#" id="delete" class="btn btn-success btn-sm" title="Видалити виділені"><span class="glyphicon glyphicon-trash"></span></a></div>');
        $('#set_viewed').click(function(e){
            arr = [];
            $('input[name=selector]:checked').each(function(){
                arr.push($(this).val());
            });
            //var str = JSON.stringify(arr);
            $.ajax('../orders_manipulating',{
                cache:false,
                data:{
                    'id_array':JSON.stringify(arr),
                    'type':'set_viewed'
                },
                error:function(){alert('Помилка з\'єднання');},
                success:function(returnedData){
                    if(returnedData == 1)
                        location.reload();
                    else
                        alert('Не вдалося виконати запит!');
                },
                timeout:20000,
                type:'post'
            });
        });
        $('#set_archived').click(function(e){
            arr = [];
            $('input[name=selector]:checked').each(function(){
                arr.push($(this).val());
            });
            //var str = JSON.stringify(arr);
            $.ajax('../orders_manipulating',{
                cache:false,
                data:{
                    'id_array':JSON.stringify(arr),
                    'type':'set_archived'
                },
                error:function(){alert('Помилка з\'єднання');},
                success:function(returnedData){
                    if(returnedData == 1)
                        location.reload();
                    else
                        alert('Не вдалося виконати запит!');
                },
                timeout:20000,
                type:'post'
            });
        });
        $('#delete').click(function(e){
            if(confirm('Ви дійсно хочете видалити вибрані замовлення?'))
            {
                arr = [];
                $('input[name=selector]:checked').each(function(){
                    arr.push($(this).val());
                });
                //var str = JSON.stringify(arr);
                $.ajax('../orders_manipulating',{
                    cache:false,
                    data:{
                        'id_array':JSON.stringify(arr),
                        'type':'delete'
                    },
                    error:function(){alert('Помилка з\'єднання');},
                    success:function(returnedData){
                        if(returnedData == 1)
                            location.reload();
                        else
                            alert('Не вдалося виконати запит!');
                    },
                    timeout:20000,
                    type:'post'
                });
            }
        });
    }
    else if(!$('input:checkbox').is(':checked') && $('a').is('#set_viewed'))
    {
        $('#set_viewed').detach();
        $('#set_archived').detach();
        $('#delete').detach();
    }
});



$('#archive_current').click(function(e){
    arr = [];
    arr.push($("#order_id").val());
    $.ajax('../orders_manipulating',{
        cache:false,
        data:{
            'id_array':JSON.stringify(arr),
            'type':'set_archived'
        },
        error:function(){alert('Помилка з\'єднання');},
        success:function(returnedData){
            if(returnedData == 1)
                alert('Успішно переміщено до архіву!');
            else
                alert('Не вдалося виконати запит!');
        },
        timeout:20000,
        type:'post'
    });
});
$('#delete_current').click(function(e){
    if(confirm('Ви дійсно хочете видалити замовлення?'))
    {
        arr = [];
        arr.push($("#order_id").val());
        $.ajax('../orders_manipulating',{
            cache:false,
            data:{
                'id_array':JSON.stringify(arr),
                'type':'delete'
            },
            error:function(){alert('Помилка з\'єднання');},
            success:function(returnedData){
                if(returnedData == 1)
                    window.location.href = '../orders/all';
                else
                    alert('Не вдалося виконати запит!');
            },
            timeout:20000,
            type:'post'
        });
    }
});