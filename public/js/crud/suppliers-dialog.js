

function newSupplier(){
    $('#register-suppliers-dlg').dialog('open').dialog('center').dialog('setTitle','New Supplier');
    $('table.tbl1 input').val('');
    $('table.tbl1 select').val('');
}
function showSupplier() {
    alert(1);
}
function editSupplier(){
    var url;
    var row = $('#suppliers-dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
        $('#fm').form('load',row);
        url = 'update_user.php?id='+row.id;
    }
}
function saveSupplier(){
    var input =  $('table.tbl1 input');
    var status =  $('table.tbl1 select[name="status"]');
    //Call formData & append inputs with select
    var formData = new FormData();
    formData.append('status',status.val());
    $.each(input,function (k,v) {
        if ($(v).attr('type') == 'file'){
            formData.append($(v).attr('name'),$(v)[0].files[0]);
        }
        formData.append($(v).attr('name'),$(v).val());
    });
    //Call Ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/purchase/supplier/store',
        method: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            var result = data;
            if (result.errors){
                return $.messager.alert({
                    title: 'Error',
                    msg: result.errors
                });
            } else {
                $.messager.alert({
                    title: 'Success',
                    msg: 'Supplier Has been Successfully Submit it !'
                });
                // console.log('success'+data);
                $('#register-suppliers-dlg').dialog('close');        // close the dialog
                $('#suppliers-dg').datagrid('reload');    // reload the user data
            }
        },
        error: function (data) {
            return $.messager.alert({
                title: 'Error',
                msg: data
            });
        }
    });
}
function destroySupplier(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
            if (r){
                $.post('destroy_user.php',{id:row.id},function(result){
                    if (result.success){
                        $('#dg').datagrid('reload');    // reload the user data
                    } else {
                        $.messager.show({    // show error message
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    }
                },'json');
            }
        });
    }
}
