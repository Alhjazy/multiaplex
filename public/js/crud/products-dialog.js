

function newProduct(){
    $('#register-products-dlg').dialog('open').dialog('center').dialog('setTitle','New Product');
    $('table.tbl1 input').val('');
    $('table.tbl1 select').val('');
}
function showProduct() {
    alert(1);
}
function editProduct(){
    var url;
    var row = $('#employee-dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
        $('#fm').form('load',row);
        url = 'update_user.php?id='+row.id;
    }
}
function saveProduct(){
    var input =  $('table.tbl1 input');
    var status =  $('table.tbl1 select[name="status"]');
    var category_id =  $('table.tbl1 select[name="category_id"]');
    var brand_id =  $('table.tbl1 select[name="brand_id"]');
    var production =  $('table.tbl1 select[name="production"]');
    var stored =  $('table.tbl1 select[name="stored"]');
    var expenses =  $('table.tbl1 select[name="expenses"]');
    var raw_material =  $('table.tbl1 select[name="raw_material"]');
    var unit_type =  $('table.tbl1 select[name="unit_type"]');
    var length_class =  $('table.tbl1 select[name="length_class"]');
    var weight_class =  $('table.tbl1 select[name="weight_class"]');
    //Call formData & append inputs with select
    var formData = new FormData();
    formData.append('status',status.val());
    formData.append('brand_id',brand_id.val());
    formData.append('category_id',category_id.val());
    formData.append('production',production.val());
    formData.append('stored',stored.val());
    formData.append('expenses',expenses.val());
    formData.append('raw_material',raw_material.val());
    formData.append('unit_type',unit_type.val());
    formData.append('length_class',length_class.val());
    formData.append('weight_class',weight_class.val());
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
        url: '/inventory/products/store',
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
                    msg: 'Product Has been Successfully Submit it !'
                });
                // console.log('success'+data);
                $('#register-products-dlg').dialog('close');        // close the dialog
                $('#products-dg').datagrid('reload');    // reload the user data
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
function destroyProduct(){
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



$('#category').combobox({
    url:'/settings/inventory/category/load',
    valueField: 'id',
    textField: 'name',
    mode: 'remote',
    method: 'get',
});

$('#brand').combobox({
    url:'/settings/inventory/brand/load',
    valueField: 'id',
    textField: 'name',
    mode: 'remote',
    method: 'get',
});