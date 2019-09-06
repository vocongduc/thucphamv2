function checkpercent(obj) {
    var x= document.getElementById('error-'+obj.id);
    if(obj.value<0){
        x.innerHTML= 'phần trăm phải lớn hơn 0%';
        obj.value=0;
    }
    else if(obj.value>100){
        x.innerHTML= 'phần trăm phải nhỏ hơn 100%';
        obj.value=0;
    }
    else{
        x.innerHTML= '';
        if(document.getElementById('price_sale') != undefined) {
            var sale = parseInt($('#price').val()) - (parseInt(obj.value) * parseInt($('#price').val()) / 100);
            document.getElementById('price_sale').innerHTML = sale.toLocaleString() + ' VNĐ';
        }

    }
}