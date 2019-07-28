
<div id="main" style="width: 100%; height: 100%;"></div>
<script type="text/javascript">

    var country = [
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
    function attributes_save() {
        var attribute_name = $('input#attribute_name');
        var attribute_value = $('input#attribute_value');
        var g = w2ui.grid3.records;
        if($(attribute_name).val() !== '' && $(attribute_value).val() !== ''){
            data.append('attribute_name[]',attribute_name.val());
            data.append('attribute_value[]',attribute_value.val());
            $('#tb_grid2_toolbar_item_add_attribute').w2overlay();
            $.each(g,function (k,v) {
                if(v.name === '' && v.value === ''){
                    w2ui.grid3.set(v.recid,{name:attribute_name.val(),value:attribute_value.val()} );
                    w2ui.grid3.mergeChanges();
                    return false;
                }else{
                    w2ui.grid3.add({recid: g.length, name:attribute_name.val(),value:attribute_value.val()});
                    w2ui.grid3.mergeChanges();
                    return false;
                }
            });
            w2ui.grid2.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Attribute Has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
            });
        }
    }
    function images_save() {
        var image_name = $('input#image_name');
        var image_file = $('input#image_file');
        var g = w2ui.grid3.records;
        if($(image_name).val() !== '' && $(image_file).val() !== ''){
            data.append('image_name[]',image_name.val());
            data.append('image_file[]',image_file[0].files[0].file);
            $('#tb_grid2_toolbar_item_add_images').w2overlay();
            $.each(g,function (k,v) {
                if(v.image_name === '' && v.image_value === ''){
                    w2ui.grid3.set(v.recid,{image_name:image_name.val(),image_value:image_file[0].files[0].name} );
                    w2ui.grid3.mergeChanges();
                    return false;
                }else{
                    w2ui.grid3.add({recid: g.length, image_name:image_name.val(),image_value:image_file[0].files[0].name});
                    w2ui.grid3.mergeChanges();
                    return false;
                }
            });
            w2ui.grid2.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Image Has Been Add.</div>'+
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
                { type: 'left', size:'12%', resizable: true,  },
                { type: 'main',overflow: 'hidden'},
            ]
        },
        sidebar: {
            name: 'sidebar',
            nodes: [
                { id: 'stock_control', text: 'Stock Control', group: true, expanded: true, nodes: [
                    { id: 'stock', text: 'Stock', img: 'icon-page', selected: true },
                    { id: 'stock_movement', text: 'Stock Movement', img: 'icon-page' },
                ]}
            ],
            onClick: function (event) {
                switch (event.target) {
                    case 'stock':
                        w2ui.layout.content('main', config.grid1);
                        break;
                    case 'stock_movement':
                        w2ui.layout.content('main', $().w2grid(config.grid2));
                        break;
                }
            }
        },
        grid1: {
            header: 'Stock Control',
            fixedBody: true,
            name: 'grid',
            recid:'id',
            url:'/control/stock/load',
            method:'get',
            reorderColumns: true,
            reorderRows: true,
            multiSelect: false,
            selectType : 'row',
            multiSearch: true,
            show: {
                header: true,
                selectColumn: true,
                toolbar: true,
                footer: true,
                toolbarAdd: true,
                toolbarDelete: true,
                toolbarSave: false,
                toolbarEdit: true,
            },
            toolbar: {
                items: [
                    { type: 'break' },
                    { id: 'show', type: 'button', caption: 'Show', icon: 'fa fa-search'},
                    { type: 'break' },
                    { id: 'print', type: 'button', caption: 'Print', icon: 'fa fa-print' },
                    { id: 'export', type: 'button', caption: 'Export', icon: 'fa fa-share' },
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
            columns: [
                { field: 'product.sku', caption: 'SKU', size: '10%' },
                { field: 'product.name', caption: 'SKU', size: '10%' },
                { field: 'location.name', caption: 'Name', size: '20%' },
                { field: 'quantity', caption: 'model', size: '10%' },
                { field: 'status', caption: 'Status', size: '5%' },
            ],
            onAdd: function (event) {
                w2ui['layout'].content('main',w2ui['layout2']);
                config.grid2.type = 'new';
                if (!w2ui['grid2'] && !w2ui['grid3']){
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'button',  id: 'back',  text: 'Back', icon: 'fa fa-arrow-left' });
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'break',id:'br4' });
                }else{
                    $().w2destroy('grid2');
                    $().w2destroy('grid3');
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'button',  id: 'back',  text: 'Back', icon: 'fa fa-arrow-left' });
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'break',id:'br4' });
                }
            },
            onEdit: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'edit';
                if (!w2ui['grid2'] && !w2ui['grid3']){
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                }else{
                    w2ui['layout2'].content('main',w2ui['grid2']);
                    w2ui['layout2'].content('bottom',w2ui['grid3']);
                }
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
            onDblClick: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'show';
                return w2ui.layout.content('main', w2ui.grid2);
            }
        },
        grid2: {
            header: 'Stock Control',
            fixedBody: true,
            name: 'grid2',
            recid:'id',
            url:'/control/stock/movement',
            method:'get',
            reorderColumns: true,
            reorderRows: true,
            multiSelect: false,
            selectType : 'row',
            multiSearch: true,
            show: {
                header: true,
                selectColumn: true,
                toolbar: true,
                footer: true,
                toolbarAdd: true,
                toolbarDelete: true,
                toolbarSave: false,
                toolbarEdit: true,
            },
            toolbar: {
                items: [
                    { type: 'break' },
                    { id: 'show', type: 'button', caption: 'Show', icon: 'fa fa-search'},
                    { type: 'break' },
                    { id: 'print', type: 'button', caption: 'Print', icon: 'fa fa-print' },
                    { id: 'export', type: 'button', caption: 'Export', icon: 'fa fa-share' },
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
            columns: [
                { field: 'date', caption: 'Date', size: '5%'},
                { field: 'reference', caption: 'Reference', size: '5%'},
                { field: 'type', caption: 'Type', size: '20%'},
                { field: 'quantity', caption: 'Quantity', size: '20%'},
                { field: 'stock', caption: 'Stock', size: '5%'},
            ],
            onAdd: function (event) {
                w2ui['layout'].content('main',w2ui['layout2']);
                config.grid2.type = 'new';
                if (!w2ui['grid2'] && !w2ui['grid3']){
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'button',  id: 'back',  text: 'Back', icon: 'fa fa-arrow-left' });
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'break',id:'br4' });
                }else{
                    $().w2destroy('grid2');
                    $().w2destroy('grid3');
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'button',  id: 'back',  text: 'Back', icon: 'fa fa-arrow-left' });
                    w2ui['grid2'].toolbar.insert('w2ui-reload', { type: 'break',id:'br4' });
                }
            },
            onEdit: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'edit';
                if (!w2ui['grid2'] && !w2ui['grid3']){
                    w2ui['layout2'].content('main',$().w2grid(config.grid2));
                    w2ui['layout2'].content('bottom',$().w2grid(config.grid3));
                }else{
                    w2ui['layout2'].content('main',w2ui['grid2']);
                    w2ui['layout2'].content('bottom',w2ui['grid3']);
                }
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
            onDblClick: function (event) {
                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
                w2ui.grid2.method = 'get';
                w2ui.grid2.type = 'show';
                return w2ui.layout.content('main', w2ui.grid2);
            }
        },
        grid3: {
            name: 'grid3',
            fixedBody: false,
            columnGroups: [
                { caption: 'Product Attribute', span: 2 },
                { caption: 'Product Images', span: 2 },
            ],
            multiSelect :true ,
            selectType : 'cell',
            show: {
                header: false,
                columnHeaders: true,
                toolbar: false,
                footer: false,
                toolbarSave: false,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
            columns: [
                { field: 'name', caption: 'Column', size: '20%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=left" },
                { field: 'value', caption: 'Value', size: '20%'},
                { field: 'image_name', caption: 'Column', size: '20%',style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;',attr: "align=left"},
                { field: 'image_value', caption: 'value', size: '20%'},
            ],
            records: [
                { recid: 0, name: '',value: '',image_name:'', image_value:'',type:'text'},
            ],
        },
        grid4: {
            name: 'grid4',
            fixedBody: false,
            multiSelect :true ,
            selectType : 'cell',
            show: {
                header: false,
                columnHeaders: true,
                toolbar: false,
                footer: false,
                toolbarSave: false,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
        },
    };
    $().w2layout({
        name: 'layout2',padding: 0,
        panels: [
            { type: 'main', content: 'main' },
            { type: 'bottom', overflow: 'hidden' ,size:370, },
        ],
    });
    $(function () {
        // initialization
        $('#main').w2layout(config.layout);
        w2ui.layout.content('left', $().w2sidebar(config.sidebar));
        w2ui.layout.content('main', $().w2grid(config.grid1));
//        w2ui['layout2'].content('main',$().w2grid(config.grid1));
    });
</script>
