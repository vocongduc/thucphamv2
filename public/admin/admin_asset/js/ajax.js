$(document).ready(function(){
    $('.add-item').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        alert(url);
        $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            data:{
                name:$('#name').val()
            },
            success:function(res){
                console.log(res);
                // alert('abc');
                $('.add-joblevel').load(location.href + ' .add-joblevel');
            },
            error: function(err, statusCode, msg){
                console.log(err);
                // console.log(statusCode);
                // console.log(msg);
            }
        });
});

$(document).on('click','.remove-item',function(e){
    alert('abc');
         e.preventDefault();
         var url = $(this).attr('href');
         // alert(url);
        $.ajax({
            url:url,
            type:'GET',
            // dataType:'json',
            success:function(res){
                // console.log(res);
                // alert('abc');
                // $('#menu-cart').load(location.href + ' #menu-cart');
                $('.remove-table').load(location.href + ' .remove-table');
            },
            error: function(err, statusCode, msg){
                console.log(err);
                // console.log(statusCode);
                // console.log(msg);
            }
        });
    });
});
