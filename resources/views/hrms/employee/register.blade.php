<style>

     .avatar {
        width: 48px;
        padding: 4px;
        border-radius: 3px;
        background: #fff;
        margin: 25px 10px 25px 25px;
        float: left;
    }
    .twitter img {
        max-width: 100%;
        vertical-align: sub;
    }
    .twitter, :before, :after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .twitter .clearfix {
        zoom: 1;
    }
    .twitter .clearfix:before, .clearfix:after {
        content: '.';
        display: block;
        overflow: hidden;
        visibility: hidden;
        font-size: 0;
        line-height: 0;
        width: 0;
        height: 0;
    }
    .twitter .clearfix:after {
        clear: both;
    }
    .twitter a {
        text-decoration: none;
    }
    .twitter {
        background: #f7f5f3;
        width: 300px;
        margin: 0 auto 20px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
    }
    .twitter header {
        border-radius: 5px 5px 0 0;
        height: 100px;
        background: #555;
        -moz-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), inset 0 1px 6px rgba(255, 255, 255, 0.3), inset 0 -1px 0px rgba(255, 255, 255, 0.1);
        -webkit-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), inset 0 1px 6px rgba(255, 255, 255, 0.3), inset 0 -1px 0px rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), inset 0 1px 6px rgba(255, 255, 255, 0.3), inset 0 -1px 0px rgba(255, 255, 255, 0.1);
    }
    .twitter .avatar {
        width: 48px;
        padding: 4px;
        border-radius: 3px;
        background: #fff;
        margin: 25px 10px 25px 25px;
        float: left;
    }
    .twitter .user-info {
        float: left;
        margin: 25px 0;
        color: #fff;
        text-shadow: 0 0 5px black;
    }
    .twitter .user-info a {
        color: #fff;
        text-decoration: none;
        font-weight: 800;
        letter-spacing: 1px;
    }
    .twitter .user-info .location {
        margin-top: 5px;
        font-size: .8125em;
    }
    .twitter .stats {
        zoom: 1;
    }
    .twitter .stats .stat {
        -moz-box-shadow: 1px 0 0 rgba(0, 0, 0, 0.11), 2px 0 1px white;
        -webkit-box-shadow: 1px 0 0 rgba(0, 0, 0, 0.11), 2px 0 1px white;
        box-shadow: 1px 0 0 rgba(0, 0, 0, 0.11), 2px 0 1px white;
        width: 31%;
        margin: 20px 1%;
        float: left;
        text-align: center;
        text-shadow: 1px 1px 1px white;
    }
    .twitter .stats .stat:last-child {
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .twitter .stats .stat span {
        display: block;
    }
    .twitter .stats .stat .count {
        font-weight: 800;
        color: #666;
    }
    .twitter .stats .stat .title {
        color: #9b9b9b;
        font-size: 0.75em;
    }

    .twitter .btn {
        background-color: #72b1d7;
        *zoom: 1;
        filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF72B1D7', endColorstr='#FF3B7BA2');
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzcyYjFkNyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzNiN2JhMiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
        background-size: 100%;
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #72b1d7), color-stop(100%, #3b7ba2));
        background-image: -moz-linear-gradient(top, #72b1d7 0%, #3b7ba2 100%);
        background-image: -webkit-linear-gradient(top, #72b1d7 0%, #3b7ba2 100%);
        background-image: linear-gradient(to bottom, #72b1d7 0%, #3b7ba2 100%);
        border: 1px solid #22658e;
        border-radius: 4px;
        width: 85%;
        display: block;
        margin: 0 auto 20px;
        padding: 8px 0;
        text-align: center;
        font-size: .8125em;
        color: #fff;
        text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), 0 2px 2px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), 0 2px 2px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5), 0 2px 2px rgba(0, 0, 0, 0.2);
    }
    .twitter .btn:hover {
        *zoom: 1;
        filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF72B1D7', endColorstr='#FF346C8E');
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzcyYjFkNyIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzM0NmM4ZSIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
        background-size: 100%;
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #72b1d7), color-stop(100%, #346c8e));
        background-image: -moz-linear-gradient(top, #72b1d7 0%, #346c8e 100%);
        background-image: -webkit-linear-gradient(top, #72b1d7 0%, #346c8e 100%);
        background-image: linear-gradient(to bottom, #72b1d7 0%, #346c8e 100%);
    }
    .twitter .btn:active {
        -moz-box-shadow: inset 0 2px 2px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: inset 0 2px 2px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 2px 2px rgba(0, 0, 0, 0.2);
        *zoom: 1;
        filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF346C8E', endColorstr='#FF72B1D7');
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzM0NmM4ZSIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzJmNjM3ZiIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
        background-size: 100%;
        background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #346c8e), color-stop(100%, #2f637f));
        background-image: -moz-linear-gradient(top, #346c8e 0%, #2f637f 100%);
        background-image: -webkit-linear-gradient(top, #346c8e 0%, #2f637f 100%);
        background-image: linear-gradient(to bottom, #346c8e 0%, #2f637f 100%);
    }

    .twitter .form {
        width: 300px;
        margin: 20px auto;
        position: relative;
    }
    .twitter .form input {
        width: 100%;
        display: inline-block;
        height: 28px;
        padding: 4px 6px;
        margin-bottom: 10px;
        font-size: .75em;
        line-height: 20px;
        color: #555;
        vertical-align: middle;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color: white;
        border: 1px solid #CCC;
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
        -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
        -o-transition: border linear 0.2s, box-shadow linear 0.2s;
        transition: border linear 0.2s, box-shadow linear 0.2s;
    }
    .twitter .form input:focus {
        border-color: rgba(82, 168, 236, 0.8);
        outline: 0;
        outline: thin dotted 9;
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    }

    .twitter input::-webkit-input-placeholder {
        color: #999;
    }

    .twitter .btn-create {
        -moz-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5);
        -webkit-box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5);
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.5);
        border-radius: 0 3px 3px 0;
        display: inline-block;
        width: auto;
        height: 28px;
        padding: 5px 10px;
        margin: 0;
        position: absolute;
        top: 0;
        right: 0;
    }

</style>
<table cellspacing="0" onclick="event.stopPropagation()">
    <tbody>
    <tr>

        <td class="caption">FULL Name</td>
        <td class="operator">
            <select id="grid_grid1_operator_0" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 0)">
                <option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select>
        </td>
        <td class="value"><input rel="search" type="text" id="grid_grid1_field_0" name="full_name" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td>
        </tr><tr>
        <td class="close-btn"></td>
        <td class="caption">UserName</td>
        <td class="operator">
            <select id="grid_grid1_operator_1" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 1)">
                <option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select>
        </td>
        <td class="value">
            <input rel="search" type="text" id="grid_grid1_field_1" name="username" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">
        </td>
            </tr><tr>
                <td class="close-btn"></td>
                <td class="caption">Email</td>
                <td class="operator">
                    <select id="grid_grid1_operator_2" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 2)">
                        <option value="is">is</option>
                        <option value="begins">begins</option>
                        <option value="contains">contains</option>
                        <option value="ends">ends</option>
                    </select>
                </td>
            <td class="value">
                <input rel="search" type="text" id="grid_grid1_field_2" name="email" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">Phone</td>    <td class="operator"><select id="grid_grid1_operator_3" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 3)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_3" name="phone" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">Citizen</td>    <td class="operator"><select id="grid_grid1_operator_4" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 4)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_4" name="is_citizen" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">ID NUMBER</td>    <td class="operator"><select id="grid_grid1_operator_5" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 5)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_5" name="number_id" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">gender</td>    <td class="operator"><select id="grid_grid1_operator_6" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 6)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_6" name="gender" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">nationality</td>    <td class="operator"><select id="grid_grid1_operator_7" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 7)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_7" name="nationality" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">ID Expiration DATE</td>    <td class="operator"><select id="grid_grid1_operator_8" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 8)"><option value="is">is</option>
                <option value="between">between</option>
                <option value="less">before</option>
                <option value="more">after</option>
            </select></td>    <td class="value"><input rel="search" type="text" class="w2ui-input w2field" style="width: 90px; box-sizing: border-box;" id="grid_grid1_field_8" name="id_expiration_date" placeholder="m/d/yyyy"><span id="grid_grid1_range_8" style="display: none">&nbsp;-&nbsp;&nbsp;<input rel="search" type="text" class="w2ui-input w2field" style="width: 90px; box-sizing: border-box;" id="grid_grid1_field2_8" name="id_expiration_date" placeholder="m/d/yyyy"></span>    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">Start DATE</td>    <td class="operator"><select id="grid_grid1_operator_9" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 9)"><option value="is">is</option>
                <option value="between">between</option>
                <option value="less">before</option>
                <option value="more">after</option>
            </select></td>    <td class="value"><input rel="search" type="text" class="w2ui-input w2field" style="width: 90px; box-sizing: border-box;" id="grid_grid1_field_9" name="join_date" placeholder="m/d/yyyy"><span id="grid_grid1_range_9" style="display: none">&nbsp;-&nbsp;&nbsp;<input rel="search" type="text" class="w2ui-input w2field" style="width: 90px; box-sizing: border-box;" id="grid_grid1_field2_9" name="join_date" placeholder="m/d/yyyy"></span>    </td></tr><tr>    <td class="close-btn"></td>    <td class="caption">Email</td>    <td class="operator"><select id="grid_grid1_operator_10" class="w2ui-input" onclick="event.stopPropagation();" onchange="w2ui['grid1'].initOperator(this, 10)"><option value="is">is</option>
                <option value="begins">begins</option>
                <option value="contains">contains</option>
                <option value="ends">ends</option>
            </select></td>    <td class="value"><input rel="search" type="text" id="grid_grid1_field_10" name="status" class="w2ui-input w2field" style="width: 250px; box-sizing: border-box;">    </td></tr><tr>    <td colspan="4" class="actions">        <div>        <button class="w2ui-btn" onclick="obj = w2ui['grid1']; if (obj) { obj.searchReset(); }">Reset</button>        <button class="w2ui-btn w2ui-btn-blue" onclick="obj = w2ui['grid1']; if (obj) { obj.search(); }">Search</button>        </div>    </td>
    </tr>
    </tbody>
</table>
<div id="grid2" style=" width: 100%; height: 430px;"></div>
<div id="grid3" style=" width: 100%; height: 430px;"></div>
{{--<form id="form" method="post" enctype="multipart/form-data" style="width: 100%;">--}}
    {{--<div class="w2ui-page page-0">--}}
        {{--<div style="width: 35%; float: left; margin-right: 0px;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">GENERAL EMPLOYEE INFORMATION</div>--}}
            {{--<div class="w2ui-group" style="height: 330px;border-right: 1px solid #000;">--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Full Name:</label>--}}
                    {{--<div>--}}
                        {{--<input name="full_name" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>E-Mail:</label>--}}
                    {{--<div>--}}
                        {{--<input name="email" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Phone:</label>--}}
                    {{--<div>--}}
                        {{--<input name="phone" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Telephone:</label>--}}
                    {{--<div>--}}
                        {{--<input name="telephone" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Gender:</label>--}}
                    {{--<div>--}}
                        {{--<select name="gender" id="" style="width: 100%;">--}}
                            {{--<option value="MALE">MALE</option>--}}
                            {{--<option value="FEMALE">FEMALE</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>IS Married:</label>--}}
                    {{--<div>--}}
                        {{--<label for="is_married"  style="word-wrap:break-word">--}}
                            {{--YES : <input id="is_married" name="is_married" type="radio" value="YES" maxlength="100" style="width: 6%">--}}
                        {{--</label>--}}
                        {{--<label for="is_married2"  style="word-wrap:break-word">--}}
                            {{--NO: <input id="is_married2" name="is_married" type="radio" value="NO" checked maxlength="100" style="width: 10%">--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>IS Citizen:</label>--}}
                    {{--<div>--}}
                        {{--<label for="is_citizen"  style="word-wrap:break-word">--}}
                            {{--YES : <input id="is_citizen" name="is_citizen" type="radio" value="YES" maxlength="100" style="width: 6%">--}}
                        {{--</label>--}}
                        {{--<label for="is_citizen2"  style="word-wrap:break-word">--}}
                            {{--NO: <input id="is_citizen2" name="is_citizen" type="radio" value="NO" checked maxlength="100" style="width: 10%">--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>AGE:</label>--}}
                    {{--<div>--}}
                        {{--<input name="age" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Birthday:</label>--}}
                    {{--<div>--}}
                        {{--<input name="birthday" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div style="width: 35%; float: left; margin-right: 0px;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">GENERAL ID INFORMATION</div>--}}
            {{--<div class="w2ui-group" style="height: 330px;border-right: 1px solid #000;">--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>ID Number:</label>--}}
                    {{--<div>--}}
                        {{--<input name="number_id" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>ID Expiration DATE:</label>--}}
                    {{--<div>--}}
                        {{--<input name="id_expiration_date" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>START DATE:</label>--}}
                    {{--<div>--}}
                        {{--<input name="join_date" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>STATUS:</label>--}}
                    {{--<div>--}}
                        {{--<select name="status" id="" style="width: 100%;">--}}
                            {{--<option value="ACTIVE">ACTIVE</option>--}}
                            {{--<option value="UN-ACTIVE">UN-ACTIVE</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div style="width: 30%; float: right; margin-left: 0px;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">EMPLOYEE SYSTEM USER</div>--}}
            {{--<div class="w2ui-group" style="height: 330px;border-right: 1px solid #000;">--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Picture:</label>--}}
                    {{--<div>--}}
                        {{--<input name="picture" type="file" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Username:</label>--}}
                    {{--<div>--}}
                        {{--<input name="username" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="w2ui-field w2ui-span4">--}}
                    {{--<label>Password:</label>--}}
                    {{--<div>--}}
                        {{--<input name="password" type="text" maxlength="100" style="width: 100%">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div style="clear: both;"></div>--}}
        {{--<div  style="width: 100%;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">SKILL FIELDS</div>--}}
            {{--<div class="w2ui-group" style="height: 70px;">--}}
                {{--<div class="w2ui-field">--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> SKILL NAME:--}}
                        {{--<input name="Skills_name[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> SKILL RATIO:--}}
                        {{--<input name="Skills_ratio[]" type="text" maxlength="100" style="width: 100%" />--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> SKILL FROM:--}}
                        {{--<input name="Skills_from[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%"> SKILL YEARS:--}}
                        {{--<input name="Skills_years[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div  style="width: 100%;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">EXPERIENCE FIELDS</div>--}}
            {{--<div class="w2ui-group" style="height: 70px;">--}}
                {{--<div class="w2ui-field">--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> EXPERIENCE NAME:--}}
                        {{--<input name="experience_name[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> EXPERIENCE RATIO:--}}
                        {{--<input name="experience_ratio[]" type="text" maxlength="100" style="width: 100%" />--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%;margin-right: 20px;"> EXPERIENCE FROM:--}}
                        {{--<input name="experience_from[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                    {{--<label style="width: 24%"> EXPERIENCE YEARS:--}}
                        {{--<input name="experience_years[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div  style="width: 100%;">--}}
            {{--<div style="padding: 3px; font-weight: bold; color: #777;">DOCUMENTS FIELDS</div>--}}
            {{--<div class="w2ui-group" style="height: 70px;">--}}
                {{--<div class="w2ui-field">--}}
                    {{--<label style="width: 50%;margin-right: 20px;"> DOCUMENTS NAME:--}}
                        {{--<input name="documents_name[]" type="text" maxlength="100" style="width: 100%"/>--}}
                    {{--</label>--}}
                    {{--<label style="width: 40%;margin-right: 20px;"> DOCUMENTS FILE:--}}
                        {{--<input name="documents_file[]" type="file" maxlength="100" style="width: 100%" />--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</form>--}}

<script type="text/javascript">


</script>