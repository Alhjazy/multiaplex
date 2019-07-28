<div class="easyui-panel"  data-options="region:'center'">
    <table id="dg"  class="easyui-datagrid"
           data-options="
                    loadFilter: function(data){
                        if (data.total && data.rows){
                            return data;
                        } else {
                            return {
                                total:data.length,
                                rows:data
                            };
                        }
                    }
                   "
           url="/settings/hrms/roles/load" method="get"
           toolbar="#toolbar" pagination="true"
           rownumbers="true" fitColumns="true" singleSelect="true"  >
        <thead>
        <tr>
            <th field="name" width="50">Name</th>
            <th field="group" width="50">Group</th>
            <th field="department" width="50">Department</th>
            <th field="grade" width="50">Grade</th>
            <th field="status" width="50">Status</th>
        </tr>
        </thead>
    </table>
    <div id="toolbar" >
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newEmployee();" >New</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editEmployee()">Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyEmployee()">Remove</a>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:70%;height: auto;" toolbar="#toolbar-w" data-options="closed:true,modal:true,footer:'#dlg-footer'">
        <table  class="tbl1" style="width:100%;">
            <tbody>
            <tr class="hdr"><td colspan="8">ROLE Information</td></tr>
            <tr>
                <td align="right"><b>Full Name:</b></td>
                <td><input type="text" name="full_name" value="" maxlength="32"></td>
                <td align="right"><b>E-mail:</b></td>
                <td><input type="text" name="email" value="" maxlength="32"></td>
                <td align="right"><b>Mobile Phone:</b></td>
                <td><input type="text" name="phone" value="" maxlength="32"></td>
                <td align="right"><b>Telephone:</b></td>
                <td><input type="text" name="telephone" value="" maxlength="32"></td>
            </tr>
            <tr>
                <td align="right"><b>Username:</b></td>
                <td><input type="text" name="username" value="" maxlength="32"></td>
                <td align="right"><b>Password:</b></td>
                <td><input type="text" name="password" value="" maxlength="32"></td>
                <td align="right"><b>Picture:</b></td>
                <td><input type="file" name="picture" value="" maxlength="32"></td>
                <td align="right"><b>Status:</b></td>
                <td>
                    <select name="status">
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="UnActive">UnActive</option>
                    </select>
                </td>
            </tr>
            <tr class="hdr"><td colspan="8">Employee Skills <a href="javascript:void(0);" style="float: right;">Add</a></td></tr>
            <tr>
                <td align="right"><b>Name:</b></td>
                <td><input type="text" name="skills_name[]" value="" maxlength="32"></td>
                <td align="right"><b>Ratio:</b></td>
                <td><input type="text" name="skills_ratio[]" value="" maxlength="32"></td>
                <td align="right"><b>From:</b></td>
                <td><input type="text" name="skills_from[]" value="" maxlength="32"></td>
                <td align="right"><b>Years:</b></td>
                <td><input type="text" name="skills_years[]" value="" maxlength="32"></td>
            </tr>
            <tr class="hdr"><td colspan="8">Employee Experiences <a href="javascript:void(0);" style="float: right;">Add</a></td></tr>
            <tr>
                <td align="right"><b>Name:</b></td>
                <td><input type="text" name="experience_name" value="" maxlength="32"></td>
                <td align="right"><b>Ratio:</b></td>
                <td><input type="text" name="experience_ratio" value="" maxlength="32"></td>
                <td align="right"><b>From:</b></td>
                <td><input type="text" name="experience_from" value="" maxlength="32"></td>
                <td align="right"><b>Years:</b></td>
                <td><input type="text" name="experience_years" value="" maxlength="32"></td>
            </tr>
            <tr class="hdr"><td colspan="8">Employee Role & jobs</td></tr>
            <tr>
                <td align="right"><b>Select Role || Jobs:</b></td>
                <td colspan="2">
                    <select name="role">
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="UnActive">UnActive</option>
                    </select>
                </td>
                <td align="right"><b>Status:</b></td>
                <td colspan="2">
                    <select name="role_status">
                        <option value="">Status</option>
                        <option value="Active">Active</option>
                        <option value="UnActive">UnActive</option>
                    </select>
                </td>
                <td colspan="2" align="center"></td>
            </tr>

            <tr class="hdr"><td colspan="8">Employee Documents & Contracts</td></tr>
            <tr>
                <td  align="right"><b>Document Name:</b></td>
                <td colspan="2"><input type="text" name="document_name" value="" maxlength="32"></td>
                <td align="right"><b>Document File:</b></td>
                <td colspan="2"><input type="file" name="document_file" value="" maxlength="32"></td>
                <td colspan="2" align="center"><b> <a href="javascript:void(0);" class="" >Upload</a></b></td>
            </tr>
            </tbody>
        </table>
        <div id="toolbar-w" >
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-reload'">Refresh</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" onclick="saveEmployee();" data-options="plain:true,iconCls:'icon-save'">Save</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-cancel'">Cancel</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-print'">Print</a>
            <a href="javascript:void(0);" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-help'">Help</a>
        </div>
        <div id="dlg-footer" style="padding:5px;">
            Footer Content.
        </div>
    </div>
</div>
