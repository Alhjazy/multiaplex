
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
                { type: 'main', overflow: 'hidden' },
            ]
        },
        grid1: {
            header: 'Product Control',
            fixedBody: true,
            name: 'grid',
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
            url:'/control/product/load',
            method:'get',
            columns: [
                { field: 'sku', caption: 'SKU', size: '10%' },
                { field: 'name', caption: 'Name', size: '20%' },
                { field: 'model', caption: 'model', size: '10%' },
                { field: 'brand.name', caption: 'Brand', size: '10%' },
                { field: 'category.name', caption: 'Category', size: '5%' },
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
            header: 'Register Product',
            name: 'grid2',
            fixedBody: false,
            columnGroups: [
                { caption: 'General Information', span: 2 },
                { caption: 'Product Codes', span: 2 },
                { caption: 'Product Type', span: 2 },
                { caption: 'Shipping Attribute', span: 2 }
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
                    { type: 'break',id:'br2' },
                    { id: 'add_attribute', type: 'button', caption: 'Attribute', icon: 'w2ui-icon-plus' },
                    { id: 'delete_attribute', type: 'button', caption: 'Attribute', icon: 'w2ui-icon-cross' },
                    { type: 'break',id:'br3' },
                    { id: 'add_images', type: 'button', caption: 'Images', icon: 'w2ui-icon-plus' },
                    { id: 'delete_images', type: 'button', caption: 'Images', icon: 'w2ui-icon-cross' },
                ],
                onClick: function (event) {
                    if (event.target === 'add_attribute') {
                        $('#tb_grid2_toolbar_item_add_attribute').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="attribute_name" >Name: </label><input  id="attribute_name"  name="attribute_name"> | <label for="attribute_value" >Value: </label><input id="attribute_value" name="attribute_value"><button class="w2ui-btn" onclick="attributes_save();">Save</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'delete_attribute') {
                        var g = w2ui.grid3.records;
                        var selected = w2ui['grid3'].getSelection();
                        if (selected[0].column === 0 || selected[0].column === 1 ){
                            if(g[selected[0].recid].name !== '' && g[selected[0].recid].value !== '' ){
                                if(w2ui.grid3.type === 'edit' && g[selected[0].recid].attr_id){
                                    $.post('/hrms/employee/'+g[selected[0].recid].empID+'/document/'+g[selected[0].recid].attr_id+'/delete',function (res) {
                                        if(res.errors){
                                            return false;
                                        }
                                    },'json');
                                }else{
                                    data.delete('attribute_name['+selected[0].recid+']');
                                    data.delete('attribute_value['+selected[0].recid+']');
                                }

                                w2ui.grid3.set(selected[0].recid,{name:'',value:''} );
                                w2ui.grid2.message({
                                    width: 400,
                                    height: 180,
                                    html: '<div  style="padding: 60px; text-align: center">The Attribute Has Been Removed.</div>' +
                                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                });
                                return false;
                            }
                        }
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'add_images') {
                        $('#tb_grid2_toolbar_item_add_images').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="image_name" >Name: </label><input  id="image_name"  name="image_name"> | <label for="image_file" > File: </label><input id="image_file" type="file" name="image_file[]"><button class="w2ui-btn" onclick="images_save();">Save</button>'+
                            '</div>',
                        });
                        return w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'delete_images') {
                        var g = w2ui.grid3.records;
                        var selected = w2ui['grid3'].getSelection();
                        if (selected[0].column === 2 || selected[0].column === 3){
                            if(g[selected[0].recid].rule_name !== '' && g[selected[0].recid].rule_department !== '' && g[selected[0].recid].rule_grade !== ''){
                                if(w2ui.grid2.type === 'edit' && g[selected[0].recid].rule_id){
                                    $.post('/hrms/employee/'+g[selected[0].recid].empID+'/rule/'+g[selected[0].recid].rule_id+'/delete',function (res) {
                                        if(res.errors){
                                            return false;
                                        }
                                    },'json');
                                }else{
                                    data.delete('image_name['+selected[0].recid+']');
                                    data.delete('image_file['+selected[0].recid+']');
                                }
                                w2ui.grid3.set(selected[0].recid,{image_name:'',image_value:''} );
                                w2ui.grid2.message({
                                    width: 400,
                                    height: 180,
                                    html: '<div  style="padding: 60px; text-align: center">The Image Has Been Removed.</div>' +
                                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                                });
                                return false;
                            }
                        }
                        return  w2ui.grid2['toolbar'].enable('w2ui-save');
                    }
                    if(event.target === 'back'){
                        $().w2destroy('grid2');
                        $().w2destroy('grid3');
                        return  w2ui['layout'].content('main',w2ui['grid']);
                    }
                }
            },
            columns: [
                { field: 'name', caption: 'Column', size: '5%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'value', caption: 'Value', size: '20%',editable: { type: 'text' }},
                { field: 'code_name', caption: 'Column', size: '5%',style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'code_value', caption: 'Value', size: '20%',editable: { type: 'text' }},
                { field: 'type_name', caption: 'Column', size: '5%',style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'type_value', caption: 'Value', size: '20%',editable: { type: 'text' }},
                { field: 'shipping_name', caption: 'Column', size: '5%',style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'shipping_value', caption: 'Value', size: '20%',editable: { type: 'text' }},
            ],
            records: [
                { recid: 0, name: 'Category:',value: '',code_name:'SKU:', code_value:'',type_name:'Production:',type_value:'',shipping_name:'Dimensions:' ,shipping_value:'', type:'list',items:$.getValues("/settings/inventory/category/load").records},
                { recid: 1, name: 'Brand:',value: '',code_name:'UPC:', code_value:'',type_name:'Stored:',type_value:'',shipping_name:'Length Class:' ,shipping_value:'',type:'list',items:$.getValues("/settings/inventory/brand/load").records},
                { recid: 2, name: 'Name:', value: '',code_name:'EAN:', code_value:'',type_name:'Expenses:',type_value:'',shipping_name:'Weight:' ,shipping_value:'',type:'text'},
                { recid: 3, name: 'Description:', value: '' ,code_name:'JAN:', code_value:'',type_name:'Raw Material:',type_value:'',shipping_name:'Weight Class:' ,shipping_value:'',type:'text'},
                { recid: 4, name: 'Model:', value: '',code_name:'ISBN:', code_value:'' ,type:'text'},
                { recid: 5, name: 'Country Made:', value: '' ,code_name:'MPN:', code_value:'',type:'list',items:country.sort()},
                { recid: 6, name: 'Status:', value: '',code_name:'Barcode:', code_value:'',type:'list',items:[{id:'ACTIVE',value:'ACTIVE'},{id:'UN-ACTIVE',value:'UN-ACTIVE'}]},
            ],
            onEditField: function(event) {

                // disable columns
                this.columns[0].editable = false;
                this.columns[2].editable = false;
                this.columns[4].editable = false;
                this.columns[6].editable = false;
                // defend editable columns [1]
                this.columns[1].editable.type = this.records[event.recid].type;
                if(this.columns[1].editable.type === 'list'){
                    this.columns[1].editable.showAll = true;
                    this.columns[1].editable.items = this.records[event.recid].items;
                }
                if(this.records[event.recid].type_name){
                    this.columns[5].editable.type = 'list';
                    this.columns[5].editable.items = [{id:'YES',value:'YES'},{id:'NO',value:'NO'}];
                    this.columns[5].editable.showAll = true;
                }

                if(this.records[event.recid].shipping_name === 'Length Class:'){
                    this.columns[7].editable.type = 'list';
                    this.columns[7].editable.items = [{id:'inch',value:'Inch'},{id:'millimeter',value:'Millimeter'},{id:'centimeter',value:'Centimeter'}];
                    this.columns[7].editable.showAll = true;
                }
                else if(this.records[event.recid].shipping_name === 'Weight Class:'){
                    this.columns[7].editable.type = 'list';
                    this.columns[7].editable.items = [{id:'kg',value:'KG'},{id:'gram',value:'Gram'},{id:'bound',value:'Bound'},{id:'ounce',value:'Ounce'}];
                    this.columns[7].editable.showAll = true;
                }else{
                    this.columns[7].editable.type = 'text';
                }
            },
            onSave: function(event) {
                event.preventDefault();
                var g = w2ui.grid2.records;
                w2ui.grid2.mergeChangesWithID();
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
                    if (v.code_name){
                        if(v.code_name === 'Barcode:' && v.code_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.code_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                        if(v.code_name === 'SKU:' && v.code_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.code_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                    }
                    if (v.type_name){
                        if(v.type_name === '' && v.type_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.type_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                    }
                    if (v.shipping_name){
                        if(v.shipping_name === '' && v.shipping_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.shipping_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                    }
                    if (v.price_name){
                        if(v.price_name === '' && v.price_value === '' ){
                            w2ui.grid2.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">The '+v.price_name +' field is required .</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.grid2.message();">Close</button></div>'
                            });
                            return false;
                        }
                    }
                    if (v.code_name){
                        data.append(v.code_name.toLowerCase().split(' ').join('_').split(':').join(''),v.code_value);
                    }
                    if (v.type_name){
                        data.append(v.type_name.toLowerCase().split(' ').join('_').split(':').join(''),v.type_value);
                    }
                    if (v.shipping_name){
                        data.append(v.shipping_name.toLowerCase().split(' ').join('_').split(':').join(''),v.shipping_value);
                    }
                    if (v.price_name){
                        data.append(v.price_name.toLowerCase().split(' ').join('_').split(':').join(''),v.price_value);
                    }
                    data.append(v.name.toLowerCase().split(' ').join('_').split(':').join(''),v.value);
                });

                if(this.type === 'new'){
                    this.url = '/control/product/store';
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
                            w2ui.grid2.message('The Product Has Been Registered Successfully . ');
                            w2ui.grid2.lock();
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
                this.toolbar.insert('w2ui-reload', { type: 'button',  id: 'back',  text: 'Back', img: 'fa fa-back' });
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
        if (w2ui['grid1'])  $().w2destroy('grid1');
        w2ui.layout.content('main', $().w2grid(config.grid1));
//        w2ui['layout2'].content('main',$().w2grid(config.grid1));
    });
</script>
