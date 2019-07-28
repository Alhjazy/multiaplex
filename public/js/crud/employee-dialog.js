

function newEmployee(){
    $('#register-employee-dlg').dialog('open').dialog('center').dialog('setTitle','New Employee');
    $('table.tbl1 input').val('');
    $('table.tbl1 select').val('');
}
function showEmployee() {
    alert(1);
}
function editEmployee(){
    var url;
    var row = $('#employee-dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
        $('#fm').form('load',row);
        url = 'update_user.php?id='+row.id;
    }
}
function saveEmployee(){
    var input =  $('table.tbl1 input');
    var status =  $('table.tbl1 select[name="status"]');
    var gender =  $('table.tbl1 select[name="gender"]');
    var isCitizen =  $('table.tbl1 select[name="is_citizen"]');
    var isMarried =  $('table.tbl1 select[name="is_married"]');
    var document_name =  $('table.tbl1 select[name="document_name"]');
    var role =  $('table.tbl1 select[name="role_id"]');
    var role_status =  $('table.tbl1 select[name="role_status"]');
    //Call formData & append inputs with select
    var formData = new FormData();
    formData.append('status',status.val());
    formData.append('gender',gender.val());
    formData.append('is_citizen',isCitizen.val());
    formData.append('is_married',isMarried.val());
    formData.append('role',role.val());
    formData.append('role_status',role_status.val());
    $.each(document_name,function (k,v) {
        formData.append('document_name[]',$(v).val());
    });
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
        url: '/hrms/employee/store',
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
                    msg: 'Employee Has been Successfully registered !'
                });
                // console.log('success'+data);
                $('#register-employee-dlg').dialog('close');        // close the dialog
                $('#employee-dg').datagrid('reload');    // reload the user data
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
function destroyEmployee(){
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
