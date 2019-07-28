
<div id="main" style="position: relative; height: 100%;width: 100%;"></div>
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
                { type: 'left', size:900, resizable: true,  content: 'left' },
                { type: 'main', overflow: 'hidden', content: 'main'  }
            ]
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
                { field: 'name', caption: 'FULL Name', type: 'text' },
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
            url:'/control/suppliers/load',
            method:'get',
            columns: [
                { field: 'name', caption: 'Full Name', size: '20%' },
                { field: 'email', caption: 'Phone', size: '10%' },
                { field: 'phone', caption: 'Telephone', size: '10%' },
                { field: 'telephone', caption: 'Gender', size: '5%' },
                { field: 'status', caption: 'Age', size: '5%' },
            ],
            onClick: function (event) {
                w2ui.grid2.columns[1].editable  = false;
                w2ui['grid2'].clear();
                w2ui['grid2'].type = 'show';
                var record = this.get(event.recid);
                w2ui['grid2'].add([
                    { recid: 0, name: 'Name:', value: record.name },
                    { recid: 1, name: 'Email:', value: record.email },
                    { recid: 2, name: 'Phone:', value: record.phone },
                    { recid: 3, name: 'Telephone:', value: record.telephone },
                    { recid: 4, name: 'City:', value: record.city },
                    { recid: 5, name: 'Street:', value: record.street },
                    { recid: 6, name: 'Address line1:', value: record.address_line1},
                    { recid: 7, name: 'Address line2:', value: record.address_line2 },
                    { recid: 8, name: 'Zip code:', value: record.zip_code },
                    { recid: 9, name: 'Status:', value:record.status}
                ]);
            },
            onLoad:function (event) {
            },
            onAdd: function (event) {
                w2ui['grid2'].url = '';
                w2ui['grid2'].clear();
                w2ui['grid2'].add([
                    { recid: 0, name: 'Name:', value: '',type:'text' },
                    { recid: 1, name: 'Email:', value: '' ,type:'text'},
                    { recid: 2, name: 'Phone:', value: '',type:'text' },
                    { recid: 3, name: 'Telephone:', value: '' ,type:'text'},
                    { recid: 4, name: 'City:', value: '',type:'text' },
                    { recid: 5, name: 'Street:', value: '',type:'text' },
                    { recid: 6, name: 'Address line1:', value: '',type:'text' },
                    { recid: 7, name: 'Address line2:', value: '',type:'text' },
                    { recid: 8, name: 'Zip code:', value: '' ,type:'text'},
                    { recid: 9, name: 'Status:', value:'' ,type:'text'}
                ]);
                w2ui.grid2.columns[1].editable = {type:'text'};
                w2ui.grid2.type = 'new';
                w2ui.grid1['toolbar'].enable('w2ui-save');
                return w2ui.layout.content('main', w2ui.grid2);
            },
            onEdit: function (event) {
                var record = this.get(event.recid);
                w2ui['grid2'].clear();
                w2ui['grid2'].add([
                    { recid: 0, name: 'Name:', value: record.name,type:'text' ,supplier_id:record.id},
                    { recid: 1, name: 'Email:', value: record.email,type:'text',supplier_id:record.id },
                    { recid: 2, name: 'Phone:', value: record.phone ,type:'text',supplier_id:record.id},
                    { recid: 3, name: 'Telephone:', value: record.telephone,type:'text',supplier_id:record.id },
                    { recid: 4, name: 'City:', value: record.city,type:'text' ,supplier_id:record.id},
                    { recid: 5, name: 'Street:', value: record.street ,type:'text',supplier_id:record.id},
                    { recid: 6, name: 'Address line1:', value: record.address_line1,type:'text',supplier_id:record.id},
                    { recid: 7, name: 'Address line2:', value: record.address_line2,type:'text',supplier_id:record.id },
                    { recid: 8, name: 'Zip code:', value: record.zip_code,type:'text' ,supplier_id:record.id},
                    { recid: 9, name: 'Status:', value:record.status,type:'text',supplier_id:record.id}
                ]);
                w2ui.grid2.columns[1].editable = {type:'text'};
                w2ui.grid2.type = 'edit';
                w2ui.grid1['toolbar'].enable('w2ui-save');
                return w2ui.layout.content('main', w2ui.grid2);
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
            onSave: function (event) {
                event.preventDefault();
                w2ui.grid2.mergeChanges();
                var g = w2ui.grid2.records;
                $.each(g,function (k,v) {
                    data.append(v.name.toLowerCase().split(' ').join('_').split(':').join(''),v.value);
                });
                if(w2ui.grid2.type === 'new'){
                    w2ui.grid2.url = '/purchases/suppliers/store';
                }
                if(w2ui.grid2.type === 'edit'){
                    w2ui.grid2.url = '/purchases/suppliers/'+g[0].supplier_id+'/update';
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

                        if(data.status === 'success' && w2ui.grid2.type === 'new'){
                            w2ui.grid2.message('The Supplier Has Been Registered Successfully . ');
                            w2ui['grid2'].clear();
                            w2ui['grid1'].reload();
                        }
                        if(data.status === 'success' && w2ui.grid2.type === 'edit'){
                            w2ui.grid2.message('The Supplier Has Been Updated Successfully . ');
                            w2ui['grid2'].clear();
                            w2ui['grid1'].reload();
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
            },
            onDblClick: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'show';
                return w2ui.layout.content('main', w2ui.grid2);
            }
        },
        grid2: {
            header: 'Details',
            show: { header: true, columnHeaders: false },
            name: 'grid2',
            columns: [
                { field: 'name', caption: 'Name', size: '100px', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=right" },
                { field: 'value', caption: 'Value', size: '100%' ,editable: { type: 'text' }}
            ],
            onEditField: function(event) {
                w2ui.grid2.columns[1].editable.type = this.records[event.recid].type;
            },
        },
    };

    $(function () {
        // initialization
        $('#main').w2layout(config.layout);
        w2ui.layout.content('left', $().w2grid(config.grid1));
        w2ui.layout.content('main', $().w2grid(config.grid2));
    });
</script>
