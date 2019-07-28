$(function () {

    $('#employee').combobox({
        url:'/hrms/employee/load',
        valueField: 'id',
        textField: 'full_name',
        mode: 'remote',
        method: 'get',
    });

    $('#supplier').combobox({
        url:'/purchase/supplier/load',
        valueField: 'id',
        textField: 'company_name',
        mode: 'remote',
        method: 'get',
    });

    $('#branches').combobox({
        url:'/project/branches/load',
        valueField: 'id',
        textField: 'name',
        mode: 'remote',
        method: 'get',
    });

});



var range = document.createRange();
var selection = window.getSelection();
var dg  = $('#purchases-items-dg');
var dlg = $('#register-purchases-dlg');
function newPurchase(){
    dlg.dialog('open').dialog('center').dialog('setTitle','New Purchase');
    $('table.tbl1 input').val('');
    $('table.tbl1 select').val('');
}
function showPurchase() {
    alert(1);
}
function editPurchase(){
    var url;
    var row = $('#purchases-dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
        $('#fm').form('load',row);
        url = 'update_user.php?id='+row.id;
    }
}
function resetPurchaseModel() {

}
function savePurchase(){
    var input =  $('table.tbl1 input');
    var status =  $('table.tbl1 select[name="status"]');
    var supplier_id =  $('table.tbl1 select[name="supplier_id"]');
    var employee_id =  $('table.tbl1 select[name="employee_id"]');
    var branch_id =  $('table.tbl1 select[name="branch_id"]');
    var type =  $('table.tbl1 select[name="type"]');
    //Call formData & append inputs with select
    var formData = new FormData();
    formData.append('status',status.val());
    formData.append('supplier_id',supplier_id.val());
    formData.append('employee_id',employee_id.val());
    formData.append('branch_id',branch_id.val());
    formData.append('type',type.val());
    $.each(input,function (k,v) {
        if ($(v).attr('type') == 'file'){
            formData.append($(v).attr('name'),$(v)[0].files[0]);
        }
        formData.append($(v).attr('name'),$(v).val());
    });
    var rows  = dg.datagrid('getRows');
    console.log();
    if (rows.length-1 === 0 && !dg.datagrid('validateRow', rows.length-1) ){
        return $.messager.alert({
            title: 'Error',
            msg: 'Please Enter Items For This Order ',
        });
    }else{
        $.each(rows, function(k, v){
            if (dg.datagrid('validateRow', k) && dg.datagrid('endEdit', k)){
                formData.append('product_id[]',v.product_id);
                formData.append('price[]',v.price);
                formData.append('quantity[]',v.quantity);
                formData.append('unit_type[]',v.unit_type);
                formData.append('discount_type[]',v.discount_type);
                formData.append('discount_value[]',v.discount_value);
                formData.append('discount_total[]',v.discount_total);
                formData.append('tax_type[]',v.tax_type);
                formData.append('tax_value[]',v.tax_value);
                formData.append('total[]',v.total);
                formData.append('comments[]',v.comments);
                formData.append('item_status[]',v.status);
            } else {
                dg.datagrid('cancelEdit', k).datagrid('deleteRow', k);
            }
        });
    }


    dg.datagrid('acceptChanges');
    formData.append('total_discount_amount',getFieldInAllRowsValue(dg,'discount_total'));
    formData.append('total_items',dg.datagrid('getRows').length);
    formData.append('total_qty',getFieldInAllRowsValue(dg,'quantity'));
    formData.append('total_tax_amount',getFieldInAllRowsValue(dg,'tax_value'));
    formData.append('total_amount',getFieldInAllRowsValue(dg,'total'));
    //Call Ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/purchase/store',
        method: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            if (data.errors){
                $.each(data.errors,function (k,v) {
                    $.messager.alert({
                        title: 'Errors:',
                        msg: v[0],
                    });
                });
                $('#dlg-purchases-footer').html(errors);
            } else {
                $.messager.confirm('Success', 'Purchase Order Has been Successfully Submit it ! Please Press Ok To Close This Window.', function(r){
                    if (r){
                        // console.log('success'+data);
                        $('#register-purchases-dlg').dialog('close');        // close the dialog
                    }
                });
                $('#purchases-dg').datagrid('reload');    // reload the user data
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
function destroyPurchase(){
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

var editIndex = undefined;
function endEditing(){
    if (editIndex == undefined){return true}
    if (dg.datagrid('validateRow', editIndex)){
        dg.datagrid('endEdit', editIndex);
        editIndex = undefined;
        return true;
    } else {
        return false;
    }
}
function onOpen() {
    if (endEditing()){


        // insert a new row at second row position
        dg.datagrid('appendRow', {
            product_code:'',
        });
        dg.datagrid('reloadFooter', [
            {product_name:'TOTAL DISCOUNT:',price:getFieldInAllRowsValue(dg,'discount_total')},
            {product_name:'TOTAL ITEMS:',price:dg.datagrid('getRows').length},
            {product_name:'TOTAL QTY:',price:getFieldInAllRowsValue(dg,'quantity')},
            {product_name:'TOTAL TAX VALUE:',price:getFieldInAllRowsValue(dg,'tax_value')},
            {product_name:'TOTAL AMOUNT:',price:getFieldInAllRowsValue(dg,'total')}
        ]);
        editIndex = dg.datagrid('getRows').length-1;
        dg.datagrid('selectRow', editIndex).datagrid('beginEdit', editIndex);
        var ed = dg.datagrid('getEditor', {index:editIndex,field:'product_code'});
        $(ed.target).textbox('textbox').focus();

        dg.datagrid('resize');
    }
}
function onDblClickCell(index, field){
    if (editIndex != index){
        if (endEditing()){
            dg.datagrid('selectRow', index).datagrid('beginEdit', index);
            var ed = dg.datagrid('getEditor', {index:index,field:field});
            if (ed){
                ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
            }
            editIndex = index;
            $(ed.target).textbox('textbox').bind('keydown', function(e){
                if (e.keyCode === 13){	// when press ENTER key, accept the inputed value.
                    if ($(ed.target).data('textbox')){
                        $(ed.target).textbox('setValue', $(this).val());
                    }
                    else if($(ed.target).data('numberbox')){
                        $(ed.target).numberbox('setValue', $(this).val());
                    }
                    else if($(ed.target).data('combobox')){
                        $(ed.target).combobox('setValue', $(this).val());
                    }
                    return append();
                }
            });
        } else {
            setTimeout(function(){
                dg.datagrid('selectRow', editIndex);
            },0);
        }
    }
}
function append(){
    if (endEditing()){
//            $('#purchases-items-dg').datagrid('appendRow',{product_id:''});
        dg.datagrid('reloadFooter', [
            {product_name:'TOTAL DISCOUNT:',price:getFieldInAllRowsValue(dg,'discount_total')},
            {product_name:'TOTAL ITEMS:',price:dg.datagrid('getRows').length},
            {product_name:'TOTAL QTY:',price:getFieldInAllRowsValue(dg,'quantity')},
            {product_name:'TOTAL TAX VALUE:',price:getFieldInAllRowsValue(dg,'tax_value')},
            {product_name:'TOTAL AMOUNT:',price:getFieldInAllRowsValue(dg,'total')}
        ]);
        dg.datagrid('appendRow', {product_code:''});
        editIndex = dg.datagrid('getRows').length-1;
        dg.datagrid('selectRow', editIndex).datagrid('beginEdit', editIndex);
        var ed = dg.datagrid('getEditor', {index:editIndex,field:'product_code'});
        $(ed.target).textbox('textbox').focus();
        $('#dlg-purchases-footer').html('');
    }
}
function removeRow() {
    var row = dg.datagrid('getSelected');
    var rowIndex = dg.datagrid('getRowIndex', row);
    dg.datagrid('deleteRow', rowIndex);
    dg.datagrid('reloadFooter', [
        {product_name:'TOTAL DISCOUNT:',price:getFieldInAllRowsValue(dg,'discount_total')},
        {product_name:'TOTAL ITEMS:',price:dg.datagrid('getRows').length},
        {product_name:'TOTAL QTY:',price:getFieldInAllRowsValue(dg,'quantity')},
        {product_name:'TOTAL TAX VALUE:',price:getFieldInAllRowsValue(dg,'tax_value')},
        {product_name:'TOTAL AMOUNT:',price:getFieldInAllRowsValue(dg,'total')}
    ]);
    if(dg.datagrid('getRows').length === 0){
        return append();
    }
}
function onBeginEdit(index,row) {
    var dg = $(this);
    dg.datagrid('autoSizeColumn');  // fix all columns size
    dg.datagrid('fixColumnSize');  // fix all columns size
    dg.datagrid('resize');
    var product_id = dg.datagrid('getEditor', {index:index,field:'product_id'});
    var product_code = dg.datagrid('getEditor', {index:index,field:'product_code'});
    var price = dg.datagrid('getEditor', {index:index,field:'price'});
    var quantity = dg.datagrid('getEditor', {index:index,field:'quantity'});
    var discount_type = dg.datagrid('getEditor', {index:index,field:'discount_type'});
    var discount_value = dg.datagrid('getEditor', {index:index,field:'discount_value'});
    var discount_total = dg.datagrid('getEditor', {index:index,field:'discount_total'});
    var tax_type = dg.datagrid('getEditor', {index:index,field:'tax_type'});
    var tax_value = dg.datagrid('getEditor', {index:index,field:'tax_value'});
    var total = dg.datagrid('getEditor', {index:index,field:'total'});
    var status = dg.datagrid('getEditor', {index:index,field:'status'});
    // var col = $(this).datagrid('getColumnOption', 'product_id');
    $(product_code.target).textbox({
        value: row.product_code,
        onChange: function(value){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get('/inventory/products/'+value+'/find',function (o) {
                if (o.length == 0){
                    $('#dlg-purchases-footer').css('color','red').html('Product Code is invalid !');
                    return false;
                }
                var product_name = dg.datagrid('getEditor', {index:index,field:'product_name'});
                var price = dg.datagrid('getEditor', {index:index,field:'price'});
                var unit_type = dg.datagrid('getEditor', {index:index,field:'unit_type'});
                $(product_id.target).textbox('setValue',o[0].id);
                $(product_name.target).textbox('setValue',o[0].name);
                $(unit_type.target).textbox('setValue',o[0].unit_type);
                $(status.target).textbox('setValue',o[0].status);
                $(discount_type.target).textbox('setValue','NO DISCOUNT');
                $(discount_value.target).textbox('setValue',0.00);
                $(discount_total.target).textbox('setValue',0.00);
                $(price.target).textbox('textbox').focus();

            },'json');
            setTimeout(function(){
//                  $('#dg').datagrid('endEdit', index);
//                    dg.datagrid('reloadFooter', [
//                        {product_name:'Total Bal',price:123},
//                        {product_name:'Available Bal',price:456}
//                    ]);
                $('#dlg-purchases-footer').html('');
            },0);
        },
    });
    $(price.target).numberbox({
        value: row.price,
        onChange: function(value){
            $(quantity.target).numberbox('textbox').focus();
        }
    });
    $(quantity.target).numberbox({
        value: row.quantity,
        onChange: function(value){
            $(discount_type.target).combobox('textbox').focus();
        }
    });
    $(discount_type.target).combobox({
        value: row.discount_type,
        onChange: function(value){
            $(discount_value.target).numberbox('textbox').focus();
        }
    });
    $(discount_value.target).numberbox({
        value: row.discount_value,
        onChange: function(value){
            if ($(discount_type.target).combobox('getValue') === 'PERCENTAGE_PER_SUM_TOTAL_UNIT'){
                $(discount_total.target).numberbox('setValue',(value * ($(price.target).numberbox('getValue') * $(quantity.target).numberbox('getValue')) / 100));
            }
            if ($(discount_type.target).combobox('getValue') === 'VALUE_PER_SUM_TOTAL_UNIT'){
                $(discount_total.target).numberbox('setValue',value);
            }

            if ($(discount_type.target).combobox('getValue') === 'VALUE_PER_UNIT'){
                $(discount_total.target).numberbox('setValue',value * $(quantity.target).numberbox('getValue'));
            }

            if ($(discount_type.target).combobox('getValue') === 'PERCENTAGE_PER_UNIT'){
                $(discount_total.target).numberbox('setValue',(value * $(price.target).numberbox('getValue') / 100) * $(quantity.target).numberbox('getValue'));
            }
            $(tax_type.target).combobox('textbox').focus();
        }
    });

    $(tax_type.target).combobox({
        value: row.tax_type,
        onChange: function(value){
            var totalFinalValue = ($(quantity.target).numberbox('getValue') * $(price.target).numberbox('getValue')) - $(discount_total.target).numberbox('getValue') ;
            var taxValue = ( 5 * totalFinalValue) / 100;
            // set tax amount
            if (value === 'TAX-VAT-INDIVIDUAL'){
                $(tax_value.target).numberbox('setValue',taxValue);
                $(total.target).numberbox('setValue',parseFloat(totalFinalValue) + parseFloat($(tax_value.target).numberbox('getValue')));
            }
            else if (value === 'TAX-VAT-COMPLEX'){
                $(tax_value.target).numberbox('setValue',taxValue);
                $(total.target).numberbox('setValue',totalFinalValue);
            }
            else{
                $(tax_value.target).numberbox('setValue',parseFloat(0));
                $(total.target).numberbox('setValue',totalFinalValue);
            }

            setTimeout(function(){
               return  append();
//                  $('#dg').datagrid('endEdit', index);
            },0);
        }
    });
//        col.editor = {
//            type:'numberbox',
//            options:{
//                valueField:'product_id',
//                textField:'product_id',
//                method:'get',
//                url:'products.json',
//                required:true,
//                value: row.product_id,
//                onChange: function(value){
//                    var dg = $('#dg');
//                    var row = dg.datagrid('getSelected');
//                    var rowIndex = dg.datagrid('getRowIndex', row);
//                    var ed = dg.datagrid('getEditor', {index:rowIndex,field:'product_id'});
//                    var text = $(ed.target).textbox('getValue');
//                    alert(text)
//                }
//            }
//        }

}


function onEndEdit(index, row){

}


