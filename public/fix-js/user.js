
// registration for user
var _token =  $('meta[name="csrf-token"]').attr('content');  
function registration(){
    let btn_registration = document.getElementById('btn_registration');
    let name = document.querySelector('.ip_name').value;
    let mail = document.querySelector('.ip_mail').value;
    let pass = document.querySelector('.ip_pass').value;
    let comfirmpass = document.querySelector('.ip_comfirm_pass').value;
    btn_registration.addEventListener('click',function(){
        alert('ádjgasg');
        $.ajax({
            url: "registration-user",
            type: 'POST',
            data:{"name": name,"mail":mail,"pass":pass,"comfirmpass":comfirmpass,"_token": _token},
            success: function(data){
                console.log(data);
            },
            error: function(data) {
                alert(data.responseJSON.success); 
            } 
        });
    });
}
//validation
function lengthPasswword(obj) {
    var x = obj.value;
    if (x.length < 8) {
        document.getElementById('lengthpass').style.display = 'block';
        document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
    } else {
        document.getElementById('lengthpass').style.display = 'none';
    }
}

function confirmPasswword(obj) {
    var y = document.getElementById('password').value;
    var x = obj.value;
    if (x != y) {
        document.getElementById('errorpass').style.display = 'block';
        document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
    } else {
        document.getElementById('errorpass').style.display = 'none';
    }
}


registration();