//action change status product --0:pendding && 3:deactive -> 1:active
function myEventChangeStatus(obj,id){
    
    let status = obj.options[obj.selectedIndex].value;
    console.log(status);
    
    let ids = id;
    document.getElementById('loadding').style.display = 'block';
    let parentRemove = obj.parentNode.parentNode.parentNode;
    let _token =  $('meta[name="csrf-token"]').attr('content');
    if(confirm('xác nhận trạng thái')){
        $.ajax({
            url: "admincp/profile/change-status-products",
            type: 'POST',
            data:{"status": status,'id':ids,"_token": _token},
            success: function(data){
                document.getElementById('alert_change_product').style.display = 'block';
                document.getElementById('alert_change').innerText = data.success;
                if(data){
                    document.getElementById('loadding').style.display = 'none';
                    parentRemove.remove();
                    alert('Bạn đã phê duyệt thành công');
                }
            }
        });
    }else{
    document.getElementById('loadding').style.display = 'none';
    }
}

//delete product
function deleteProduct(obj,id){
    if(confirm('bạn có muốn xóa sản phẩm này không???')){
        let parentRemove = obj.parentNode.parentNode;
        let _token =  $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "admincp/profile/delete-products",
            type: 'POST',
            data:{"id": id,"_token": _token},
            success: function(data){
                document.getElementById('alert_change_product').style.display = 'block';
                document.getElementById('alert_change').innerText = data.success;
                parentRemove.remove();
            }
        });
    }
}
//get data user
// function getDataUser(id){
//     let _token =  $('meta[name="csrf-token"]').attr('content');
//     document.getElementById('status_load').style.display = 'block';
//     $.ajax({
//         url: "admincp/profile/account-user-list",
//         type: 'POST',
//         data:{"id": id,"_token": _token},
//         success: function(data){
//             document.getElementById('upated_name_user').value = data.user.email;
//             // {{asset('images/avatar/'.$user->avatar)}}
//             document.getElementById('idAvatar').src =  '{{asset('')}}/admin/img/'+data.user.avatar;


//             document.getElementById('status_load').style.display = 'none';
//         }
//     });
// }