<style>
    .sidemenu .accordion .accordion-header {
        background: #cbe0f1;
    }
</style>
<div class="easyui-layout" data-options="fit:true" style="height:100%; ">
    <div data-options="region:'west',split:true" style="width:250px;">
        <div id="sm" class="easyui-sidemenu" style="width:98%;" data-options="data:data"></div>
    </div>
    <div id="settings-view" data-options="region:'center'"  style="background: #eaf6ff;" >

    </div>
</div>
<script>
    var data = [
    {
        text: 'GENERAL',
        iconCls: 'fa fa-wpforms',
        state: 'open',
        children: [{
            text: 'GENERAL SETTINGS',
            attributes:{
                url:'/settings/general/company/settings'
            },
        },{
            text: 'TAX SETTINGS',
            attributes:{
                url:'/settings/general/company/tax'
            },
        },{
            text: 'Reports'
        }]
    },
    {
        text: 'HRMS',
        iconCls: 'fa fa-wpforms',
        state: 'open',
        children: [{
            text: 'Roles',
            attributes:{
                url:'/settings/hrms/roles'
            },
        },{
            text: 'Register'
        },{
            text: 'Reports'
        }]
    },
    {
            text: 'Requests',
            iconCls: 'fa fa-at',
            selected: true,
            state: 'open',
            children: [{
                text: 'Inbox'
            },{
                text: 'Sent'
            },{
                text: 'Trash',
                children: [{
                    text: 'Item1'
                },{
                    text: 'Item2'
                }]
            }]
    }
     ,
    {
        text: 'Cases',
        iconCls: 'fa fa-at',
        selected: true,
        state: 'open',
        children: [{
            text: 'Inbox'
        },{
            text: 'Sent'
        },{
            text: 'Trash',
            children: [{
                text: 'Item1'
            },{
                text: 'Item2'
            }]
        }]
    },{
        text: 'Settings',
        iconCls: 'fa fa-table',
        state: 'open',
        children: [{
            text: 'Jobs'
        },{
            text: 'Salaries'
        },{
            text: 'Leave'
        }]
    }];

    var opts = $.fn.panel.defaults;
console.log(opts);
//    function toggle(){
//        var opts = $('#sm').sidemenu('options');
//        $('#sm').sidemenu(opts.collapsed ? 'expand' : 'collapse');
//        opts = $('#sm').sidemenu('options');
//        $('#sm').sidemenu('resize', {
//            width: opts.collapsed ? 60 : 200
//        })
//    }
</script>
<script>
    loadViewFromSideMenu($('#sm'),$('#settings-view'));
</script>
{{--<form method="post" action="http://letwatch.to/" onsubmit="return CheckForm(this);">--}}
    {{--<input type="hidden" name="op" value="report_file_send">--}}
    {{--<input type="hidden" name="rand" value="eh7h5xtrj3pvcfvt42intawempbhvenganx3ary">--}}
    {{--<input type="hidden" name="id" value="drzj4wnxft7h">--}}
    {{--<table cellpadding="3" cellspacing="1" class="tbl1">--}}
        {{--<tbody><tr class="hdr"><td colspan="2">Report File</td></tr>--}}
        {{--<tr><td align="right"><b>Filename:</b></td><td>UFC.200.PPV.Lesnar.vs.Hunt..-FMN_00h00m00s-00h48m50s_.mp4</td></tr>--}}
        {{--<tr><td align="right"><b>Your IP:</b></td><td>39.47.186.185</td></tr>--}}
        {{--<tr><td align="right"><b>Timestamp:</b></td><td>2016-07-10 04:18:38</td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your Name:</b></td><td><input type="text" name="name" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Your E-mail:</b></td><td><input type="text" name="email" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Phone Number:</b></td><td><input type="text" name="phone" value="" maxlength="32"></td></tr>--}}
        {{--<tr><td align="right"><b>Reason:</b></td><td>--}}
                {{--<select name="reason">--}}
                    {{--<option value="Content copyright restriction">Content copyright restriction</option>--}}
                    {{--<option value="File corrupt">File corrupt</option>--}}
                    {{--<option value="Other">Other</option>--}}
                {{--</select>--}}
            {{--</td></tr>--}}
        {{--<tr><td align="right" valign="top"><b>Information:</b></td><td><textarea name="message" rows="7" cols="24" style="width:100%;height: 100%;"></textarea></td></tr>--}}




        {{--<tr><td align="right"><b>Captcha:</b></td><td align="left"><table cellspacing="0" cellpadding="1"><tbody><tr><td><div style="width:80px;height:26px;font:bold 13px Arial;background:#ccc;text-align:left;direction:ltr;"><span style="position:absolute;padding-left:60px;padding-top:7px;">5</span><span style="position:absolute;padding-left:42px;padding-top:4px;">9</span><span style="position:absolute;padding-left:24px;padding-top:7px;">7</span><span style="position:absolute;padding-left:6px;padding-top:6px;">2</span></div></td><td><input type="text" name="code" class="captcha_code"></td></tr></tbody></table></td></tr>--}}



        {{--<tr><td colspan="2" align="center"><font class="err"></font><br><input type="submit" value="Send File Report"><br><br></td></tr>--}}
        {{--</tbody></table>--}}
{{--</form>--}}