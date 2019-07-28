
<div id="main" style="width: 100%; height: 100%;"></div>
<script type="text/javascript">
    var nationality = [
        "Afghan",
        "Albanian",
        "Algerian",
        "American",
        "Andorran",
        "Angolan",
        "Antiguans",
        "Argentinean",
        "Armenian",
        "Australian",
        "Austrian",
        "Azerbaijani",
        "Bahamian",
        "Bahraini",
        "Bangladeshi",
        "Barbadian",
        "Barbudans",
        "Batswana",
        "Belarusian",
        "Belgian",
        "Belizean",
        "Beninese",
        "Bhutanese",
        "Bolivian",
        "Bosnian",
        "Brazilian",
        "British",
        "Bruneian",
        "Bulgarian",
        "Burkinabe",
        "Burmese",
        "Burundian",
        "Cambodian",
        "Cameroonian",
        "Canadian",
        "Cape Verdean",
        "Central African",
        "Chadian",
        "Chilean",
        "Chinese",
        "Colombian",
        "Comoran",
        "Congolese",
        "Costa Rican",
        "Croatian",
        "Cuban",
        "Cypriot",
        "Czech",
        "Danish",
        "Djibouti",
        "Dominican",
        "Dutch",
        "East Timorese",
        "Ecuadorean",
        "Egyptian",
        "Emirian",
        "Equatorial Guinean",
        "Eritrean",
        "Estonian",
        "Ethiopian",
        "Fijian",
        "Filipino",
        "Finnish",
        "French",
        "Gabonese",
        "Gambian",
        "Georgian",
        "German",
        "Ghanaian",
        "Greek",
        "Grenadian",
        "Guatemalan",
        "Guinea-Bissauan",
        "Guinean",
        "Guyanese",
        "Haitian",
        "Herzegovinian",
        "Honduran",
        "Hungarian",
        "I-Kiribati",
        "Icelander",
        "Indian",
        "Indonesian",
        "Iranian",
        "Iraqi",
        "Irish",
        "Israeli",
        "Italian",
        "Ivorian",
        "Jamaican",
        "Japanese",
        "Jordanian",
        "Kazakhstani",
        "Kenyan",
        "Kittian and Nevisian",
        "Kuwaiti",
        "Kyrgyz",
        "Laotian",
        "Latvian",
        "Lebanese",
        "Liberian",
        "Libyan",
        "Liechtensteiner",
        "Lithuanian",
        "Luxembourger",
        "Macedonian",
        "Malagasy",
        "Malawian",
        "Malaysian",
        "Maldivan",
        "Malian",
        "Maltese",
        "Marshallese",
        "Mauritanian",
        "Mauritian",
        "Mexican",
        "Micronesian",
        "Moldovan",
        "Monacan",
        "Mongolian",
        "Moroccan",
        "Mosotho",
        "Motswana",
        "Mozambican",
        "Namibian",
        "Nauruan",
        "Nepalese",
        "New Zealander",
        "Nicaraguan",
        "Nigerian",
        "Nigerien",
        "North Korean",
        "Northern Irish",
        "Norwegian",
        "Omani",
        "Pakistani",
        "Palauan",
        "Panamanian",
        "Papua New Guinean",
        "Paraguayan",
        "Peruvian",
        "Polish",
        "Portuguese",
        "Qatari",
        "Romanian",
        "Russian",
        "Rwandan",
        "Saint Lucian",
        "Salvadoran",
        "Samoan",
        "San Marinese",
        "Sao Tomean",
        "Saudi",
        "Scottish",
        "Senegalese",
        "Serbian",
        "Seychellois",
        "Sierra Leonean",
        "Singaporean",
        "Slovakian",
        "Slovenian",
        "Solomon Islander",
        "Somali",
        "South African",
        "South Korean",
        "Spanish",
        "Sri Lankan",
        "Sudanese",
        "Surinamer",
        "Swazi",
        "Swedish",
        "Swiss",
        "Syrian",
        "Taiwanese",
        "Tajik",
        "Tanzanian",
        "Thai",
        "Togolese",
        "Tongan",
        "Trinidadian or Tobagonian",
        "Tunisian",
        "Turkish",
        "Tuvaluan",
        "Ugandan",
        "Ukrainian",
        "Uruguayan",
        "Uzbekistani",
        "Venezuelan",
        "Vietnamese",
        "Welsh",
        "Yemenite",
        "Zambian",
        "Zimbabwean"
    ];
    var data  = new FormData();
    function rules_add() {
        $.get('/settings/hrms/rules/load',function (data_json) {
            var rules_options = '';
            $.each(data_json,function (k,v) {
                rules_options += '<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#tb_grid2_toolbar_item_add_rules').w2overlay({
                openAbove:false,
                align: 'none',
                onShow:function () {
                    var rule_data = [];
                    var rules_id = $('select#rules');
                    var g = w2ui.grid2.records;
                    $('button#saveBTN').click(function () {
                        if(rules_id.val() !== '') {
                            $.each(data_json,function (k,v) {
                                if (v.id == rules_id.val()) {
                                    rule_data = v;
                                    return false;
                                }
                            });
                            $.each(g,function (k,v) {
                                if(v.rule_name === '' && v.rule_department === '' && v.rule_grade === ''){
                                    w2ui.grid2.set(v.recid,{rule_name:rule_data.name,rule_department:rule_data.department,rule_grade:rule_data.grade} );
                                    data.append('rules_id['+v.recid+']', rules_id.val());
                                    $('#tb_grid2_toolbar_item_add_rules').w2overlay();
                                    w2ui.grid2.message({
                                        width: 400,
                                        height: 180,
                                        html: '<div  style="padding: 60px; text-align: center">The Rules Has Been Add.</div>' +
                                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                    });
                                    return false;
                                }
                            });
                        }

                    });
                },
                html:'<div style="padding: 10px; line-height: 150%">'+
                '<label for="rules" >Rules: </label><select  id="rules"  name="rules_id">'+rules_options+'</select> <button id="saveBTN" class="w2ui-btn">Add</button>'+
                '</div>',
            });
            return false;
        });
    }
    function documents_save() {
        var doc_name = $('select#doc_name');
        var doc_file = $('input#doc_file')[0];
        var g = w2ui.grid2.records;
        if($(doc_name).val() !== '' && $(doc_file).val() !== ''){
            data.append('document_name[]',doc_name.val());
            data.append('document_file[]',doc_file.files[0]);
            $('#tb_grid2_toolbar_item_add_document').w2overlay();
            $.each(g,function (k,v) {
                if(v.doc_name === '' && v.doc_file === ''){
                    w2ui.grid2.set(v.recid,{doc_name:doc_name.val(),doc_file:doc_file.files[0].name} );
                    return false;
                }
            });
            w2ui.grid2.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Documents Has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
            });
        }
    }
    function upload_picture() {
        var g = w2ui.grid2.records;
        var pic = $('input#picture')[0];
        if($(pic).val() !== ''){
            data.append('picture',pic.files[0]);
            $('#tb_grid2_toolbar_item_add_picture').w2overlay();
            $.each(g,function (k,v) {
                if(v.name === 'Picture:'){
                    w2ui.grid2.set(v.recid,{value:pic.files[0].name} );
//                   w2ui.grid222.editField(v.recid, 1, pic.files[0].name);
                    return false;
                }
            });
            w2ui.grid2.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Picture has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
            });
        }
    }
    // widget configuration
    var config = {
        layout: {
            name: 'layout',
            padding: 0,
            panels: [
                { type: 'left', size: 200, resizable: true, minSize: 120 },
                { type: 'main', minSize: 550, overflow: 'hidden' }
            ]
        },
        sidebar: {
            name: 'sidebar',
            nodes: [
                { id: 'general', text: 'General', group: true, expanded: true, nodes: [
                    { id: 'dashboard', text: 'Dashboard', img: 'icon-page', selected: true },
                    { id: 'cases', text: 'Cases', img: 'icon-page' },
                    { id: 'request', text: 'Request', img: 'icon-page' }
                ]}
            ],
            onClick: function (event) {
                switch (event.target) {
                    case 'cases':
//                        w2ui.layout.content('main', w2ui.grid1);
                        break;
                    case 'request':
                        $.ajax({
                            url:'/hrms/employee/register',
                            type:'get',
                            success:function (data) {
                                w2ui.layout.content('main', data);
                            },
                            error:function (xhr, status, error) {
                                if(xhr.status === 401){
                                    return window.location.href = '/login';
                                }
                            },
                        });
//                        w2ui.layout.content('main', w2ui.grid1);
                        break;
                    case 'dashboard':
                        w2ui.layout.content('main', w2ui.grid1);
                        break;
                    case 'html':
                        w2ui.layout.content('main', w2ui.grid1);
                        $(w2ui.layout.el('main'))
                            .removeClass('w2ui-grid')
                            .css({
                                'border-left': '1px solid silver'
                            });
                        break;
                }
            }
        },
        grid1: {
            name: 'grid1',
            reorderColumns: true,
            reorderRows: true,
            multiSelect: false,
            selectType : 'row',
            multiSearch: true,
            show: {
                selectColumn: true,
                toolbar: true,
                footer: true,
                toolbarAdd: true,
                toolbarDelete: true,
                toolbarSave: true,
                toolbarEdit: true,
            },
            toolbar: {
                items: [
                    { type: 'break' },
                    { id: 'show', type: 'button', caption: 'Show', icon: 'w2ui-icon-plus'},
                    { type: 'break' },
                    { id: 'print', type: 'button', caption: 'Print', icon: 'w2ui-icon-plus' },
                    { id: 'export', type: 'button', caption: 'Export', icon: 'w2ui-icon-cross' },
                ],
                onClick: function (event) {
                    if (event.target === 'show') {
                        var selected = w2ui['grid1'].getSelection();
                        console.log(selected);
                        w2ui.grid2.url = '/hrms/employee/'+selected[0]+'/find';
                        w2ui.grid2.method = 'get';
                        w2ui.grid2.type = 'show';
                        return w2ui.layout.content('main', w2ui.grid2);
                    }
                    if (event.target === 'delete_rules') {
                        var g = w2ui.grid2.records;
                        var selected = w2ui['grid2'].getSelection();
                        $.each(g,function (k,v) {
                            if (selected[0].column === 2 || selected[0].column === 3 || selected[0].column === 4){
                                if(v.rule_name !== '' && v.rule_department !== '' && v.rule_grade !== ''){
                                    data.delete('rule_id['+selected[0].recid+']');
                                    w2ui.grid2.set(selected[0].recid,{rule_name:'',rule_department:'',rule_grade:''} );
                                    w2ui.grid2.message({
                                        width: 400,
                                        height: 180,
                                        html: '<div  style="padding: 60px; text-align: center">The Rules Has Been Removed.</div>' +
                                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                    });
                                    return false;
                                }
                            }
                        });
                        return  w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'delete_document') {
                        var g = w2ui.grid2.records;
                        var selected = w2ui['grid2'].getSelection();
                        $.each(g,function (k,v) {
                            if (selected[0].column === 7 || selected[0].column === 8 ){
                                if(v.doc_name !== '' && v.doc_file !== '' ){
                                    data.delete('document_name['+selected[0].recid+']');
                                    data.delete('document_file['+selected[0].recid+']');
                                    w2ui.grid2.set(selected[0].recid,{doc_name:'',doc_file:''} );
                                    w2ui.grid2.message({
                                        width: 400,
                                        height: 180,
                                        html: '<div  style="padding: 60px; text-align: center">The Document Has Been Removed.</div>' +
                                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                    });
                                    return false;
                                }
                            }
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'add_document') {
                        $('#tb_grid2_toolbar_item_add_document').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="doc_name" >Document Name: </label><select  id="doc_name"  name="document_name"><option value="ID">ID</option><option value="FAMILY_ID">FAMILY ID</option><option value="CONTRACT">CONTRACT</option><option value="JOB_OFFER_LATTER">JOB OFFER LATTER</option><option value="GRADUATION_CERTIFICATE">GRADUATION CERTIFICATE</option><option value="SKILLS_AND_TRAINING_CERTIFICATE">SKILLS AND TRAINING CERTIFICATE</option><option value="EXPERIENCE_CERTIFICATE">EXPERIENCE CERTIFICATE</option></select> | <input id="doc_file" type="file" name="document_file"><button class="w2ui-btn" onclick="documents_save();">Save</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'add_picture') {
                        $('#tb_grid2_toolbar_item_add_picture').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<input id="picture" type="file" name="picture"><button class="w2ui-btn" onclick="upload_picture();">Upload</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                }
            },
            searches: [
                { field: 'full_name', caption: 'FULL Name', type: 'text' },
                { field: 'username', caption: 'UserName', type: 'text' },
                { field: 'email', caption: 'Email', type: 'text' },
                { field: 'phone', caption: 'Phone', type: 'text' },
                { field: 'is_citizen', caption: 'Citizen', type: 'text' },
                { field: 'number_id', caption: 'ID NUMBER', type: 'text' },
                { field: 'gender', caption: 'gender', type: 'text' },
                { field: 'nationality', caption: 'nationality', type: 'text' },
                { field: 'id_expiration_date', caption: 'ID Expiration DATE', type: 'date' },
                { field: 'join_date', caption: 'Start DATE', type: 'date' },
                { field: 'status', caption: 'Email', type: 'text' },
            ],
            url:'/hrms/employee/load',
            method:'get',
            columns: [
                { field: 'full_name', caption: 'Full Name', size: '20%' },
                { field: 'username', caption: 'UserName', size: '10%' },
                { field: 'email', caption: 'E-Mail', size: '20%' },
                { field: 'phone', caption: 'Phone', size: '10%' },
                { field: 'telephone', caption: 'Telephone', size: '10%' },
                { field: 'gender', caption: 'Gender', size: '5%' },
                { field: 'age', caption: 'Age', size: '5%' },
                { field: 'is_citizen', caption: 'IS Citizen', size: '5%' },
                { field: 'nationality', caption: 'Nationality', size: '5%' },
                { field: 'number_id', caption: 'ID Number', size: '10%' },
                { field: 'id_expiration_date', caption: 'ID Expiration DATE', size: '5%' },
                { field: 'join_date', caption: 'Start Date', size: '5%' },
                { field: 'status', caption: 'Status', size: '5%' },
            ],
            onAdd: function (event) {
                w2ui.grid2.type = 'new';
                return w2ui.layout.content('main', w2ui.grid2);
            },
            onEdit: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'edit';
                return w2ui.layout.content('main', w2ui.grid2);
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
            onSave: function (event) {
                w2alert('save');
            },
            onDblClick: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'show';
                return w2ui.layout.content('main', w2ui.grid2);
            }
        },
        grid2: {
            header: 'Register Employee',
            name: 'grid2',
            fixedBody: false,
            columnGroups: [
                { caption: 'General Information', span: 2 },
                { caption: 'Rules & Jobs', span: 3 },
                { caption: 'Salaries', span: 2 },
                { caption: 'Documents', span: 2 }
            ],
            multiSelect :true ,
            selectType : 'cell',
            show: {
                header: true,
                columnHeaders: true,
                toolbar: true,
                footer: false,
                toolbarSave: true,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:true,
            },
            toolbar: {
                items: [
                    { type: 'break' ,id:'br1'},
                    { id: 'add_picture', type: 'button', caption: 'Picture', icon: 'w2ui-icon-plus'},
                    { type: 'break',id:'br2' },
                    { id: 'add_rules', type: 'button', caption: 'Rules', icon: 'w2ui-icon-plus' },
                    { id: 'delete_rules', type: 'button', caption: 'Rules', icon: 'w2ui-icon-cross' },
                    { type: 'break',id:'br3' },
                    { id: 'add_document', type: 'button', caption: 'Document', icon: 'w2ui-icon-plus' },
                    { id: 'delete_document', type: 'button', caption: 'Document', icon: 'w2ui-icon-cross' },
                ],
                onClick: function (event) {
                    console.log(event);
                    if (event.target === 'add_rules') {
                        rules_add();
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'delete_rules') {
                        var g = w2ui.grid2.records;
                        var selected = w2ui['grid2'].getSelection();
                        if (selected[0].column === 2 || selected[0].column === 3 || selected[0].column === 4){
                            if(g[selected[0].recid].rule_name !== '' && g[selected[0].recid].rule_department !== '' && g[selected[0].recid].rule_grade !== ''){
                                if(w2ui.grid2.type === 'edit' && g[selected[0].recid].rule_id){
                                    $.post('/hrms/employee/'+g[selected[0].recid].empID+'/rule/'+g[selected[0].recid].rule_id+'/delete',function (res) {
                                        if(res.errors){
                                            return false;
                                        }
                                    },'json');
                                }else{
                                    data.delete('rules_id['+selected[0].recid+']');
                                }
                                w2ui.grid2.set(selected[0].recid,{rule_name:'',rule_department:'',rule_grade:''} );
                                w2ui.grid2.message({
                                    width: 400,
                                    height: 180,
                                    html: '<div  style="padding: 60px; text-align: center">The Rules Has Been Removed.</div>' +
                                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                });
                                return false;
                            }
                        }
                        return  w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'delete_document') {
                        var g = w2ui.grid2.records;
                        var selected = w2ui['grid2'].getSelection();
                        if (selected[0].column === 7 || selected[0].column === 8 ){
                            if(g[selected[0].recid].doc_name !== '' && g[selected[0].recid].doc_file !== '' ){
                                if(w2ui.grid2.type === 'edit' && g[selected[0].recid].doc_id){
                                    $.post('/hrms/employee/'+g[selected[0].recid].empID+'/document/'+g[selected[0].recid].doc_id+'/delete',function (res) {
                                        if(res.errors){
                                            return false;
                                        }
                                    },'json');
                                }else{
                                    data.delete('document_name['+selected[0].recid+']');
                                    data.delete('document_file['+selected[0].recid+']');
                                }

                                w2ui.grid2.set(selected[0].recid,{doc_name:'',doc_file:''} );
                                w2ui.grid2.message({
                                    width: 400,
                                    height: 180,
                                    html: '<div  style="padding: 60px; text-align: center">The Document Has Been Removed.</div>' +
                                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                });
                                return false;
                            }
                        }
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'add_document') {
                        $('#tb_grid2_toolbar_item_add_document').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="doc_name" >Document Name: </label><select  id="doc_name"  name="document_name"><option value="ID">ID</option><option value="FAMILY_ID">FAMILY ID</option><option value="CONTRACT">CONTRACT</option><option value="JOB_OFFER_LATTER">JOB OFFER LATTER</option><option value="GRADUATION_CERTIFICATE">GRADUATION CERTIFICATE</option><option value="SKILLS_AND_TRAINING_CERTIFICATE">SKILLS AND TRAINING CERTIFICATE</option><option value="EXPERIENCE_CERTIFICATE">EXPERIENCE CERTIFICATE</option></select> | <input id="doc_file" type="file" name="document_file"><button class="w2ui-btn" onclick="documents_save();">Save</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'add_picture') {
                        $('#tb_grid2_toolbar_item_add_picture').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<input id="picture" type="file" name="picture"><button class="w2ui-btn" onclick="upload_picture();">Upload</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                }
            },
            columns: [
                { field: 'name', caption: 'Column', size: '20%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=right" },
                { field: 'value', caption: 'Value', size: '20%',editable: { type: 'text' }},
                { field: 'rule_department', caption: 'Department', size: '20%',editable: { type: 'text' },style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'rule_name', caption: 'Name', size: '20%',editable: { type: 'text' }},
                { field: 'rule_grade', caption: 'Grade', size: '20%',editable: { type: 'text' }},
                { field: 'salary_name', caption: 'Column', size: '20%',editable: { type: 'text' },style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=right"},
                { field: 'salary_value', caption: 'Value', size: '20%',editable: { type: 'text' }},
                { field: 'doc_name', caption: 'Name', size: '20%',editable: { type: 'text' },style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=right"},
                { field: 'doc_file', caption: 'File', size: '20%',editable: { type: 'text' }},
            ],
            records: [
                { recid: 0, name: 'Full Name:',type:'text',value: '',rule_name:'', rule_department:'',rule_grade:'',salary_name:'FIXED INCOME:',salary_value:'' ,doc_name:'', doc_file:''},
                { recid: 1, name: 'Email:',type:'text', value: '',rule_name:'',rule_department:'',rule_grade:'',salary_name:'BASIC:',salary_value:'',doc_name:'',doc_file:'' },
                { recid: 2, name: 'Phone:',type:'text', value: '',rule_name:'',rule_department:'',rule_grade:'',salary_name:'HOUSING:',salary_value:'',doc_name:'',doc_file:'' },
                { recid: 3, name: 'Telephone:',type:'text', value: '' ,rule_name:'',rule_department:'',rule_grade:'',salary_name:'TRANSPORT:',salary_value:'',doc_name:'',doc_file:''},
                { recid: 4, name: 'Gender:',type:'list',items:[{id:'MALE',value:'MALE'},{id:'FEMALE',value:'FEMALE'}],showAll:true, value: '',rule_name:'',rule_department:'',rule_grade:'',salary_name:'FUEL:',salary_value:'',doc_name:'',doc_file:'' },
                { recid: 5, name: 'Birthday:',type:'date', value: '' ,rule_name:'',rule_department:'',rule_grade:'',salary_name:'MOBILE:',salary_value:'',doc_name:'',doc_file:''},
                { recid: 6, name: 'AGE:',type:'text', value: '' ,rule_name:'',rule_department:'',rule_grade:'',salary_name:'OTHER BENEFIT:',salary_value:'',doc_name:'',doc_file:''},
                { recid: 7, name: 'IS Married:',type:'list',items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],showAll:true, value: '',salary_name:'TOTAL:',salary_value:'',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:'' },
                { recid: 8, name: 'Nationality:',type:'list',items:nationality.sort(),showAll:true, value: '' ,rule_name:'',rule_department:'',rule_grade:'',salary_name:'',salary_value:'',doc_file:''},
                { recid: 9, name: 'IS Citizen:',type:'list',items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],showAll:true, value: '' ,rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:''},
                { recid: 10, name: 'Number ID:',type:'text', value: '' ,rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:''},
                { recid: 11, name: 'ID Expiration DATE:',type:'date', value: '' ,rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:''},
                { recid: 12, name: 'Join DATE:',type:'date', value: '',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:'' },
                { recid: 13, name: 'Picture:',type:'files', value: '',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:'' },
                { recid: 14, name: 'Username:',type:'text', value: '',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:'' },
                { recid: 15, name: 'Password:',type:'password', value: '',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:''},
                { recid: 16, name: 'Status:',type:'list',items:[{id:'ACTIVE',value:'ACTIVE'},{id:'UN-ACTIVE',value:'UN-ACTIVE'}],showAll:true, value: '',rule_name:'',rule_department:'',rule_grade:'',doc_name:'',doc_file:''},
            ],
            onEditField: function(event) {
                if(this.type === 'show'){
                    this.columns[event.column].editable = false;
                }
                if(this.type === 'edit' || this.type === 'new'){
                    this.columns[1].editable.type = this.records[event.recid].type;
                    if(this.columns[1].editable.type === 'list'){
                        this.columns[1].editable.items = this.records[event.recid].items;
                        this.columns[1].editable.showAll = this.records[event.recid].showAll;
                    } if(this.columns[1].editable.type === 'date'){
                        this.columns[1].editable.items = this.records[event.recid].items;
                        this.columns[1].editable.format = 'yyyy/m/d';
                    }

                    if(this.columns[1].editable.type === 'files'){
                        w2ui.grid2['toolbar'].click('add_picture');
                        return false;
                    }
                    if(this.columns[6].editable.type === 'text'){
                        this.columns[6].editable.type = 'money';
                    }
                    this.columns[2].editable = false;
                    this.columns[3].editable = false;
                    this.columns[4].editable = false;
                    this.columns[5].editable = false;
                    this.columns[7].editable = false;
                    this.columns[8].editable = false;
                    w2ui.grid2['toolbar'].enable('w2ui-save');
                }
            },
            onSave: function(event) {
                event.preventDefault();
                w2ui.grid2.mergeChanges();
                var g = w2ui.grid2.records;
                $.each(g,function (k,v) {
                    if(v.value === ''){
                        w2ui.grid2.message({
                            width   : 400,
                            height  : 180,
                            html    : '<div  style="padding: 60px; text-align: center">The '+v.name+' field is required .</div>'+
                            '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                        });
                        return false;
                    }
                    if (v.salary_name){
                        if(v.salary_name === '' && v.salary_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.salary_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                    }

                    data.append(v.name.toLowerCase().split(' ').join('_').split(':').join(''),v.value);
                    if (v.salary_name){
                        data.append(v.salary_name.toLowerCase().split(' ').join('_').split(':').join(''),v.salary_value);
                    }
                });
                if(g[0].doc_name === '' && g[0].doc_file === '' ){
                    w2ui.grid2.message({
                        width   : 400,
                        height  : 180,
                        html    : '<div  style="padding: 60px; text-align: center">Please Upload the required Documents For This Employee.</div>'+
                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                    });
                    return false;
                }
                if(g[0].rule_department === '' || g[0].rule_name === '' || g[0].rule_grade === ''){
                    w2ui.grid2.message({
                        width   : 400,
                        height  : 180,
                        html    : '<div  style="padding: 60px; text-align: center">Please Add Rules For This Employee .</div>'+
                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                    });
                    return false;
                }
                if(this.type === 'new'){
                    this.url = '/hrms/employee/store';
                }
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:w2ui.grid2.url,
                    type:'post',
                    dataType:'json',
                    data:data,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        // setting a timeout
                        w2ui.grid2.lock('Please Waite.....', true);
                    },
                    success:function (data) {
                        if(data.status === 'success'){
                            w2ui.grid2.message('The Employee Has Been Registered Successfully . ');
                            return w2ui.layout.content('main', w2ui.grid1);
                        }
                    },
                    error:function (xhr) {
                        if (xhr.status === 302){
                            var err = $.parseJSON(xhr.responseText);
                           console.log(err);
                        }
                        if (xhr.status === 422){
                            var err = $.parseJSON(xhr.responseText);
                            $.each(err.errors,function (k,v) {
                                w2ui.grid2.message({
                                    width   : 400,
                                    height  : 180,
                                    html    : '<div  style="padding: 60px; text-align: center">'+v[0]+'</div>'+
                                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                });
                                return false;
                            });
                        }
                    }
                });
                w2ui.grid2['toolbar'].enable('w2ui-save');
            },
            onLoad: function(event) {
                if(this.type === 'show'){
                    var data = $.parseJSON(event.xhr.responseText);
                    this.toolbar.insert('w2ui-reload',[{ id: 'print', type: 'button', caption: 'Print', icon: 'w2ui-icon-plus' }]);
                    this.toolbar.insert('print',[{ id: 'copy', type: 'button', caption: 'Copy', icon: 'w2ui-icon-plus' }]);
                    this.toolbar.hide('w2ui-save', 'w2ui-reload','add_picture','add_rules','delete_rules','add_document','delete_document','br1','br2','br3');
                    this.header = 'EMPLOYEE - '+ data.full_name.toUpperCase();
                    this.add([
                        {
                            recid: 0,
                            name: 'Full Name:',
                            value: data.full_name,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'FIXED INCOME:',
                            salary_value: data.salary === null ? 0 : data.salary.fixed_income ,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 1,
                            name: 'Email:',
                            value: data.email,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'BASIC:',
                            salary_value: data.salary === null ? 0 :data.salary.basic,
                            doc_name:'',
                            doc_file:'' ,
                            type:'text',
                        },
                        {
                            recid: 2,
                            name: 'Phone:',
                            value: data.phone,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'HOUSING:',
                            salary_value: data.salary === null ? 0 :data.salary.housing,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 3,
                            name: 'Telephone:',
                            value: data.telephone ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'TRANSPORT:',
                            salary_value: data.salary === null ? 0 :data.salary.transport,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 4,
                            name: 'Gender:',
                            value: data.gender,rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'FUEL:',
                            salary_value: data.salary === null ? 0 :data.salary.fuel,
                            doc_name:'',
                            doc_file:'' ,
                            type:'list',
                            items:[{id:'MALE',value:'MALE'},{id:'FEMALE',value:'FEMALE'}],
                            showAll:true,
                        },
                        {
                            recid: 5,
                            name: 'Birthday:',
                            value: data.birthday ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'MOBILE:',
                            salary_value: data.salary === null ? 0 :data.salary.mobile,
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 6,
                            name: 'AGE:',
                            value: data.age ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'OTHER BENEFIT:',
                            salary_value: data.salary === null ? 0 :data.salary.other_benefit,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 7,
                            name: 'IS Married:',
                            value: data.is_married,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'TOTAL:',
                            salary_value: data.salary === null ? 0 :data.salary.total,
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 8,
                            name: 'Nationality:',
                            value: data.nationality ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_file:'',
                            items:nationality.sort(),
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 9,
                            name: 'IS Citizen:',
                            value: data.is_citizen ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 10,
                            name: 'Number ID:',
                            value: data.number_id ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 11,
                            name: 'ID Expiration DATE:',
                            value: data.id_expiration_date ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 12,
                            name: 'Join DATE:',
                            value: data.join_date,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 13,
                            name: 'Picture:',
                            value: data.picture,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'' ,
                            type:'files',
                        },
                        {
                            recid: 14,
                            name: 'Username:',
                            value:data.username,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 15,
                            name: 'Password:',
                            value: data.password,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'password',
                        },
                        {
                            recid: 16,
                            name: 'Status:',
                            value: data.status,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'ACTIVE',value:'ACTIVE'},{id:'UN-ACTIVE',value:'UN-ACTIVE'}],
                            showAll:true,
                            type:'list',
                        },
                    ]);
                    $.each(this.records,function (k,v) {
                        if(data.rule[k]){
                            w2ui.grid2.set(v.recid,{rule_name:data.rule[k].name,rule_department:data.rule[k].department,rule_grade:data.rule[k].grade});
                        }
                        if(data.documents[k]){
                            w2ui.grid2.set(v.recid,{doc_name:data.documents[k].name,doc_file:data.documents[k].file});
                        }
                    })
                }
                if(this.type === 'edit'){
                    var data = $.parseJSON(event.xhr.responseText);
                    console.log(event);
                    this.url = '/hrms/employee/'+data.id+'/update';
                    this.method = 'post';
                    $.ajaxSetup({
                        headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') , 'method':'PUT'}
                    });
                    this.header = 'EDIT EMPLOYEE - ' + data.full_name.toUpperCase() ;
                    this.add([
                        {
                            recid: 0,
                            empID:data.id,
                            name: 'Full Name:',
                            value: data.full_name,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'FIXED INCOME:',
                            salary_value:data.salary.fixed_income ,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 1,
                            empID:data.id,
                            name: 'Email:',
                            value: data.email,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'BASIC:',
                            salary_value:data.salary.basic,
                            doc_name:'',
                            doc_file:'' ,
                            type:'text',
                        },
                        {
                            recid: 2,
                            empID:data.id,
                            name: 'Phone:',
                            value: data.phone,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'HOUSING:',
                            salary_value:data.salary.housing,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 3,
                            empID:data.id,
                            name: 'Telephone:',
                            value: data.telephone ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'TRANSPORT:',
                            salary_value:data.salary.transport,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 4,
                            empID:data.id,
                            name: 'Gender:',
                            value: data.gender,rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'FUEL:',
                            salary_value:data.salary.fuel,
                            doc_name:'',
                            doc_file:'' ,
                            type:'list',
                            items:[{id:'MALE',value:'MALE'},{id:'FEMALE',value:'FEMALE'}],
                            showAll:true,
                        },
                        {
                            recid: 5,
                            empID:data.id,
                            name: 'Birthday:',
                            value: data.birthday ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'MOBILE:',
                            salary_value:data.salary.mobile,
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 6,
                            empID:data.id,
                            name: 'AGE:',
                            value: data.age ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'OTHER BENEFIT:',
                            salary_value:data.salary.other_benefit,
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 7,
                            empID:data.id,
                            name: 'IS Married:',
                            value: data.is_married,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'TOTAL:',
                            salary_value: data.salary === null ? 0 :data.salary.total,
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 8,
                            empID:data.id,
                            name: 'Nationality:',
                            value: data.nationality ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_file:'',
                            items:nationality.sort(),
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 9,
                            empID:data.id,
                            name: 'IS Citizen:',
                            value: data.is_citizen ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'YES',value:'YES'},{id:'NO',value:'NO'}],
                            showAll:true,
                            type:'list',
                        },
                        {
                            recid: 10,
                            empID:data.id,
                            name: 'Number ID:',
                            value: data.number_id ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 11,
                            empID:data.id,
                            name: 'ID EXPIRATION DATE:',
                            value: data.id_expiration_date ,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 12,
                            empID:data.id,
                            name: 'Join DATE:',
                            value: data.join_date,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'date',
                        },
                        {
                            recid: 13,
                            empID:data.id,
                            name: 'Picture:',
                            value: data.picture,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'' ,
                            type:'files',
                        },
                        {
                            recid: 14,
                            empID:data.id,
                            name: 'Username:',
                            value:data.username,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'text',
                        },
                        {
                            recid: 15,
                            empID:data.id,
                            name: 'Password:',
                            value: data.password,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            type:'password',
                        },
                        {
                            recid: 16,
                            empID:data.id,
                            name: 'Status:',
                            value: data.status,
                            rule_name:'',
                            rule_department:'',
                            rule_grade:'',
                            salary_name:'',
                            salary_value:'',
                            doc_name:'',
                            doc_file:'',
                            items:[{id:'ACTIVE',value:'ACTIVE'},{id:'UN-ACTIVE',value:'UN-ACTIVE'}],
                            showAll:true,
                            type:'list',
                        },
                    ]);
                    $.each(this.records,function (k,v) {
                        if(data.rule[k]){
                            w2ui.grid2.set(v.recid,{rule_name:data.rule[k].name,rule_department:data.rule[k].department,rule_grade:data.rule[k].grade,rule_id:data.rule[k].id});
                        }
                        if(data.documents[k]){
                            w2ui.grid2.set(v.recid,{doc_name:data.documents[k].name,doc_file:data.documents[k].file,doc_id:data.documents[k].id});
                        }
                    })
                }
            },
        },
    };

    $(function () {
        // initialization
        $('#main').w2layout(config.layout);
        w2ui.layout.content('left', $().w2sidebar(config.sidebar));
        w2ui.layout.content('main', $().w2grid(config.grid1));
        // in memory initialization
        $().w2grid(config.grid2);
    });
</script>
