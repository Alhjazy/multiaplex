function loadHRMSView() {
    $('#main-panel').panel({
        href:'/hrms',
        method:'get'
    });
}
function loadPurchaseView() {
    $('#main-panel').panel({
        href:'/purchase',
        method:'get'
    });
}
function loadSalesView() {
    $('#main-panel').panel({
        href:'/sales',
        method:'get'
    });
}
function loadInventoryView() {
    $('#main-panel').panel({
        href:'/inventory',
        method:'get'
    });
}
function loadProjectView() {
    $('#main-panel').panel({
        href:'/project',
        method:'get'
    });
}
function loadMarketingView() {
    $('#main-panel').panel({
        href:'/marketing',
        method:'get'
    });
}
function loadAccountingView() {
    $('#main-panel').panel({
        href:'/accounting',
        method:'get'
    });
}
function loadSettingsView() {
    $('#main-panel').panel({
        href:'/settings',
        method:'get'
    });
}

function loadViewFromSideMenu(el,p) {
    el.sidemenu({
        onSelect: function(node){
            console.log(node);
            var url = node.attributes.url;
            p.panel({
                href:url,
                method:'get'
            });
        }
    });
}

function duplicated(el) {
    var tr  = el.parents('tr').next('tr');
    tr.after('<tr>'+tr.html()+'<td><a href="javascript:void(0);" onclick="removeLine($(this));" style="color: red;">[-]</a></td></tr>');
}
function removeLine(el) {
    el.parents('tr').remove();
}

function formatColumn(colName, value, row, index) {
    return eval("row." + colName);
}

(function($){

})(jQuery);
function openDialog(id,title,url) {
    $(id).dialog({
        title:title,
        maximizable:false,
        maximized:false,
        minimizable:false,
        minimized:false,
        modal:true,
        collapsible:false,
        collapsed:false,
        closed: false,
        cache: false,
        href: url,
        inline:true
    });
}
function getFieldInAllRowsValue(dg, field){
    var rows = dg.datagrid('getRows');
    var value = 0;
    $.each(rows, function(k, v){
        if (dg.datagrid('validateRow', k) && dg.datagrid('endEdit', k)){
            if (rows[k][field] === 'NaN' || rows[k][field] === undefined || rows[k][field] === '' || rows[k][field] === null){
                rows[k][field] = 0;
            }
            value += parseFloat(rows[k][field]);
        }
    });
    return parseFloat(value);
}
function getSelectedValue(dg, field){
    var dg = $(dg);
    var row = dg.datagrid('getSelected');
    if (!row){return undefined;}
    var fields = dg.datagrid('getColumnFields',true).concat(dg.datagrid('getColumnFields',false));
    if (typeof field == 'number'){
        return row[fields[field]];
    } else {
        return row[field];
    }
}
function loadViewFromTree(el,p) {
    el.tree({
        onClick:function(node){
            p.panel({
                href:node.url,
                method:'get'
            });
        }
    });
}


function selectText(node) {
    if (document.body.createTextRange) {
        const range = document.body.createTextRange();
        range.moveToElementText(node[0].value);
        range.select();
    } else if (window.getSelection) {
        const selection = window.getSelection();
        const range = document.createRange();
        range.selectNodeContents(node[0]);
        selection.removeAllRanges();
        selection.addRange(range);
    } else {
        console.warn("Could not select text in node: Unsupported browser.");
    }
}

function uploadDocuments() {
    var username = $('table tbody input[name="username"]');
    var name = $('table tbody input[name="document_name"]');
    var file = $('table tbody input[name="document_file"]');
    if (username.val() == '' || username.val() == null || name.val() == '' || name.val() == null || file.val() == '' || file.val() == null){
        $.messager.alert('Error','Please Complete the Application Before you upload any documents.');
        return false;
    }
    console.log(file[0].files);
    var formData = new FormData();
    formData.append('username',username.val());
    formData.append('document_name',name.val());
    formData.append('document_file',file[0].files[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/hrms/employee/upload',
        method: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            var result = data;
            if (result.errors){
                $.messager.show({
                    title: 'Error',
                    msg: result.message
                });
            } else {
                name.parents('tr').after('<tr></tr><td  align="right"><b>Document ID:</b></td> <td colspan="2"><input type="text" name="document_id" value="'+data.id+'" readonly></td><td  align="right"><b>Document Name:</b></td> <td colspan="2"><input type="text" name="document_name" value="'+data.name+'" readonly></td><td colspan="2"><a href="'+data.file+'"><span class="fa fa-eye">show</span></a></td></tr>');
                console.log('success'+data);
                formData.reset();
                return false;
//                    $('#dlg').dialog('close');        // close the dialog
//                    $('#dg').datagrid('reload');    // reload the user data
            }
        },
        error: function (data) {
            $.messager.alert('Error',data.errors);
            return false;
        }
    });
}



var tax_type = [
    {type:'TAX-ZERO',name:'TAX ZERO'},
    {type:'TAX-FREE',name:'TAX FREE'},
    {type:'TAX-VAT-COMPLEX',name:'TAX VAT COMPLEX'},
    {type:'TAX-VAT-INDIVIDUAL',name:'TAX VAT INDIVIDUAL'},
];

var discount_type = [
    {type:'PERCENTAGE_PER_UNIT',name:'PERCENTAGE (%) PER UNIT'},
    {type:'VALUE_PER_UNIT',name:'VALUE PER UNIT'},
    {type:'PERCENTAGE_PER_SUM_TOTAL_UNIT',name:'PERCENTAGE (%) PER SUM TOTAL'},
    {type:'VALUE_PER_SUM_TOTAL_UNIT',name:'VALUE PER SUM TOTAL'},
];

var data = {"total":0,"rows":[
    {"product_code":"","price":0.00,"quantity":"","unit_type":"","discount_type":"NO DISCOUNT","discount_value":0.00,"discount_total":0.00,
        "tax_type":"","tax_value":0.00,"total":0.00,comments:"",
    },
],"footer":[
    {"product_name":"TOTAL DISCOUNT:","price":getFieldInAllRowsValue(dg,'discount_total')},
    {"product_name":"TOTAL ITEMS:","price":dg.datagrid('getRows').length},
    {"product_name":"TOTAL QTY:","price":getFieldInAllRowsValue(dg,'quantity')},
    {"product_name":"TOTAL TAX VALUE:","price":getFieldInAllRowsValue(dg,'tax_value')},
    {"product_name":"TOTAL AMOUNT:","price":getFieldInAllRowsValue(dg,'total')},
]};


$.extend($.fn.datagrid.defaults.editors,{
    combobox: {
        init: function(container, options){
            var combo = $('<input type="text">').appendTo(container);
            combo.combobox(options || {});
            return combo;
        },
        destroy: function(target){
            $(target).combobox('destroy');
        },
        getValue: function(target){
            if ($(target).combobox('options').multiple){
                return $(target).combobox('getValues');
            } else {
                return $(target).combobox('getValue');
            }
        },
        setValue: function(target, value){
            if ($(target).combobox('options').multiple){
                $(target).combobox('setValues', value ? ($.isArray(value) ? value : [value]) : []);
            } else {
                $(target).combobox('setValue', value);
            }
        },
        resize: function(target, width){
            $(target).combobox('resize', width)
        }
    }
});