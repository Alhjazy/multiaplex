<style>
    .datagrid-footer .datagrid-row{
        background: #ddd;
    }
</style>
<script type="text/javascript" src="/public/js/crud/purchase-dialog.js"></script>
<div id="toolbar-purchases" >
    <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refresh</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" onclick="savePurchase();" data-options="plain:true,iconCls:'icon-save'">Save</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-print'">Print</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Help</a>
</div>
<table  class="tbl1" style="width:100%;">
    <tbody>
    <tr class="hdr"><td colspan="9">Purchase Order Information</td></tr>
    <tr>
        <td align="right" ><b>Supplier:</b></td>
        <td>
            <select id="supplier" class="easyui-combobox easyui-validatebox" name="supplier_id" style="width: 100%;" data-options="required:true,validateOnBlur:true,editable:false" >
                <option value="">Choose...</option>
            </select>
        </td>
        <td align="right" ><b>Employee:</b></td>
        <td>
            <select id="employee" class="easyui-combobox easyui-validatebox" name="employee_id" style="width: 100%;" data-options="required:true,validateOnBlur:true,editable:false" >
                <option value="">Choose...</option>
            </select>
        </td>
        <td align="right" ><b>Received In Branch:</b></td>
        <td>
            <select id="branches" class="easyui-combobox easyui-validatebox" name="branch_id" style="width: 100%;" data-options="required:true,validateOnBlur:true,editable:false" >
                <option value="">Choose...</option>
            </select>
        </td>
        <td align="right"><b>Required Date:</b></td>
        <td><input  style="width: 100%;" name="required_date" class="easyui-datebox easyui-validatebox"  data-options="required:true,validateOnBlur:true"></td>
    </tr>
    <tr>
        <td align="right"><b>Shipped Date:</b></td>
        <td><input style="width: 100%;" name="shipped_date" class="easyui-datebox easyui-validatebox" data-options="required:true,validateOnBlur:true"></td>
        <td align="right"><b>Type:</b></td>
        <td >
            <select name="type" class="easyui-validatebox" data-options="required:true,validateOnBlur:true,editable:false">
                <option value="">Choose...</option>
                <option value="PURCHASE">PURCHASE</option>
                <option value="RETURN-PURCHASE">RETURN PURCHASE</option>
            </select>
        </td>
        <td align="right"><b>Status:</b></td>
        <td>
            <select name="status" class="easyui-validatebox" data-options="required:true,validateOnBlur:true,editable:false">
                <option value="">Choose...</option>
                <option value="PENDING">PENDING</option>
                <option value="PROCESSING">PROCESSING</option>
                <option value="REJECTED">REJECTED</option>
                <option value="COMPLETED">COMPLETED</option>
            </select>
        </td>
    </tr>
    <tr class="hdr"><td colspan="9">Purchase Order Items <a class="btn btn-danger" href="javascript:void(0);" onclick="removeRow();" style="float: right;"><i class="icon-white icon-trash"></i></a> <a class="btn btn-success" href="javascript:void(0);" onclick="append();" style="float: right;color: wheat;"><i class="icon-white icon-plus"></i></a></td></tr>
    </tbody>
</table>
<table id="purchases-items-dg" class="easyui-datagrid"  style="width: 100%;height: auto;"
       data-options="
                fitColumns: true,
                singleSelect: true,
                rownumbers: true,
                showFooter: true,
                onOpen:onOpen,
                striped:false,
                onDblClickCell: onDblClickCell,
                onEndEdit: onEndEdit,
                onBeginEdit:onBeginEdit,
            ">
    <thead>
    <tr>
        <th data-options="field:'product_id',width:180,hidden:true,editor:{type:'textbox',options:{precision:2,readonly:true}}">Product ID</th>
        <th data-options="field:'product_code',width:180,editor:{type:'textbox',options:{precision:2,required:true}}">Product Code</th>
        <th data-options="field:'product_name',width:250,align:'center',editor:{type:'textbox',options:{readonly:true}}">Product Name</th>
        <th data-options="field:'price',width:140,align:'left',editor:{type:'numberbox',options:{precision:2,required:true}}">Price</th>
        <th data-options="field:'quantity',width:140,align:'left',editor:{type:'numberbox',options:{precision:2,required:true}}">Quantity</th>
        <th data-options="field:'unit_type',width:180,align:'left',editor:{type:'textbox',options:{readonly:true}}">Unit Type</th>
        <th data-options="field:'discount_type',width:240,align:'left',editor:{type:'combobox',options:{valueField:'type',textField:'name',data:discount_type,editable:false}}">Discount Type</th>
        <th data-options="field:'discount_value',width:140,align:'left',editor:{type:'numberbox',options:{precision:2}}">Discount Value</th>
        <th data-options="field:'discount_total',width:140,align:'left',editor:{type:'numberbox',options:{precision:2,readonly:true}}">Discount Total</th>
        <th data-options="field:'tax_type',width:180,align:'center',editor:{type:'combobox',options:{valueField:'type',textField:'name',data:tax_type,required:true,editable:false}}">Tax Type</th>
        <th data-options="field:'tax_value',width:140,align:'left',editor:{type:'numberbox',options:{precision:2,readonly:true}}">Tax</th>
        <th data-options="field:'total',width:200,editor:{type:'numberbox',options:{precision:2,readonly:true}}">total</th>
        <th data-options="field:'comments',width:120,editor:{type:'textbox',options:{precision:2}}">Comments</th>
        <th data-options="field:'status',width:120,hidden:true,editor:{type:'textbox',options:{precision:2}}">status</th>
    </tr>
    </thead>
</table>
<div id="dlg-purchases-footer" style="padding:5px;">
    Hi There
</div>

