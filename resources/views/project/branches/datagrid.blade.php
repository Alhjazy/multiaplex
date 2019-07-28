<div class="easyui-panel"  data-options="region:'center'">
    <table id="branches-dg"  class="easyui-datagrid"
           url="/project/branches/load" method="get"
           toolbar="#toolbar" pagination="true"
           rownumbers="true" fitColumns="true" singleSelect="true"  >
        <thead>
        <tr>
            <th field="id" width="20">ID</th>
            <th field="name" width="30">NAME</th>
            <th field="telephone" width="30">TELEPHONE</th>
            <th field="email" width="30">EMAIL</th>
            <th field="city" width="30">CITY</th>
            <th field="type" width="30">TYPE</th>
            <th field="status" width="30">STATUS</th>
        </tr>
        </thead>
    </table>
    <div id="toolbar" >
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newBranches();" >New</a>
    </div>
    <div id="register-branches-dlg" class="easyui-dialog" style="width:70%;height: auto;" toolbar="#toolbar-branches" data-options="closed:true,modal:true,footer:'#dlg-branches-footer',maximizable:false">
        <div id="toolbar-branches" >
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refresh</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" onclick="saveBranches();" data-options="plain:true,iconCls:'icon-save'">Save</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-print'">Print</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Help</a>
        </div>
        <table  class="tbl1" style="width:100%;">
            <tbody>
            <tr class="hdr"><td colspan="9">Branches Information</td></tr>
            <tr>
                <td align="right"><b>NAME:</b></td>
                <td><input type="text" name="name" class="easyui-validatebox" data-options="required:true,validType:'length[3,30]',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>TELEPHONE:</b></td>
                <td><input type="text" name="telephone"  class="easyui-validatebox" data-options="required:true,validType:'length[10,15]',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>E-MAIL:</b></td>
                <td colspan="2"><input type="text" name="email" class="easyui-validatebox" data-options="required:true,validType:'length[10,15]',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>CITY:</b></td>
                <td><input type="text" name="city"  class="easyui-validatebox" data-options="required:true,validType:'length[10,15]',validateOnCreate:false,validateOnBlur:true"></td>
            </tr>
            <tr>
                <td align="right"><b>STREET:</b></td>
                <td><input type="text" name="street" class="easyui-validatebox" data-options="required:true,validType:'length[3,30]',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>ADDRESS LINE 1:</b></td>
                <td><input type="text" name="address_line1" class="easyui-validatebox" data-options="required:true,validType:'email',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>ADDRESS LINE 2:</b></td>
                <td><input type="text" name="address_line2"  class="easyui-validatebox" data-options="required:true,validType:'length[10,15]',validateOnCreate:false,validateOnBlur:true"></td>
                <td align="right"><b>ZIP CODE:</b></td>
                <td colspan="2"><input type="text" name="zip_code" class="easyui-validatebox" data-options="required:true,validType:'length[10,15]',validateOnCreate:false,validateOnBlur:true"></td>
            </tr>
            <tr>
                <td align="right"><b>TYPE:</b></td>
                <td colspan="3">
                    <select name="type" class="easyui-validatebox" data-options="required:true,validateOnCreate:false,validateOnBlur:true">
                        <option value="">Choose...</option>
                        <option value="WAREHOUSE">WAREHOUSE</option>
                        <option value="RETAIL">RETAIL</option>
                    </select>
                </td>
                <td align="right"><b>Status:</b></td>
                <td colspan="3">
                    <select name="status" class="easyui-validatebox" data-options="required:true,validateOnCreate:false,validateOnBlur:true">
                        <option value="">Choose...</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="UN-ACTIVE">UN-ACTIVE</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <div id="dlg-branches-footer" style="padding:5px;">
            Footer Content.
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#branches-dg').datagrid({
            onDblClickRow:function (k,row) {
                console.log(row.id);
            }
        });
    });

</script>
