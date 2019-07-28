
<div id="layout" style=" height: 100%;width: 100%;"></div>
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
    var cityData = [
        {id:'National',text:'National'},
        {id:'Riyadh',text:'Riyadh'},
        {id:'Jeddah',text:'Jeddah'},
        {id:'Abha',text:'Abha'},
        {id:'Al Madinah Al Munawwarah',text:'Al Madinah Al Munawwarah'},
        {id:'Al Hufuf',text:'Al Hufuf'},
        {id:'Ad Dammam',text:'Ad Dammam'},
        {id:'Jazan',text:'Jazan'},
        {id:'Al Khubar',text:'Al Khubar'},
        {id:'Haql',text:'Haql'},
        {id:'Hafar Al Batin',text:'Hafar Al Batin'},
        {id:'Tabuk',text:'Tabuk'},
        {id:'At Taif',text:'At Taif'},
        {id:'Makkah Al Mukarramah',text:'Makkah Al Mukarramah'},
        {id:'Hail',text:'Hail'},
        {id:'Al Qatif',text:'Al Qatif'},
        {id:'Yanbu',text:'Yanbu'},
    ];
    var purchaseOrderData = $.getValues('/control/purchases/last').records;
    var suppliersData = $.getValues('/control/suppliers/load').records;
    var locationsData = $.getValues('/control/locations/load').records;
    var shippingCompanyData = [{id:'CHARGED_BY_SUPPLIER',text:'CHARGED BY SUPPLIER'},{id:'LOCAL',text:'LOCAL'},{id:'NAQEL',text:'NAQEL'},{id:'ARAMEX',text:'ARAMEX'},{id:'SMSA',text:'SMSA'},{id:'DHL',text:'DHL'}];
    var statusData = [{id:'PENDING',text:'PENDING'},{id:'PROCESSING',text:'PROCESSING'},{id:'REJECTED',text:'REJECTED'},{id:'COMPLETE',text:'COMPLETE'}];
    var data  = new FormData();
    function documents_save() {
        var doc_name = $('select#doc_name');
        var doc_file = $('input#doc_file')[0];
        var g = w2ui.bottom2.records;
        if($(doc_name).val() !== '' && $(doc_file).val() !== ''){
            data.append('document[][name]',doc_name.val());
            data.append('document[][file]',doc_file.files[0]);
            $('#tb_bottom2_toolbar_item_add_document').w2overlay();
            $.each(g,function (k,v) {
                if(v.doc_name === '' && v.doc_file === ''){
                    w2ui.bottom2.set(v.recid,{doc_name:doc_name.val(),doc_file:doc_file.files[0].name} );
                    return false;
                }
            });
            w2ui.bottom2.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Documents Has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.bottom2.message();">Close</button></div>'
            });
        }
    }
    function save() {
        w2ui.top2.mergeChangesWithID();
        w2ui.main.mergeChanges();
        w2ui.bottom.mergeChanges();
        w2ui.bottom2.mergeChanges();
        var orderInformation = w2ui.top2.records;
        var orderItems = w2ui.main.records;
        var orderPayment = w2ui.bottom.records;
        var orderShip = w2ui.bottom2.records;
        $.each(orderInformation,function (k,v)  {
            if(v.value === '' || v.value === null){
                if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'description'){
                    return true;
                }
                if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'remark'){
                    return true;
                }
                w2ui.top2.message({
                    width   : 400,
                    height  : 180,
                    html    : '<div  style="padding: 60px; text-align: center">The Field '+v.name.toLowerCase().split(' ').join('_').split(':').join('')+' is Required.</div>'+
                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.top2.message();">Close</button></div>'
                });
                return false;
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'supplier'){
                data.append('supplier_id',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'location'){
                data.append('location_id',v.value);
            }
            data.append(v.name.toLowerCase().split(' ').join('_').split(':').join(''),v.value);
        });
        $.each(orderShip,function (k,v) {
            if(v.value === '' || v.value === null){
                w2ui.bottom2.message({
                    width   : 400,
                    height  : 180,
                    html    : '<div  style="padding: 60px; text-align: center">The Field '+v.name.toLowerCase().split(' ').join('_').split(':').join('')+' is Required.</div>'+
                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.bottom2.message();">Close</button></div>'
                });
                return false;
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_company'){
                data.append('shipping[0][company_name]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_tracker'){
                data.append('shipping[0][tracker]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_from'){
                data.append('shipping[0][from]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_to'){
                data.append('shipping[0][to]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_cost'){
                data.append('shipping[0][cost]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_remark'){
                data.append('shipping[0][remark]',v.value);
            }
            if(v.name.toLowerCase().split(' ').join('_').split(':').join('') === 'shipping_state'){
                data.append('shipping[0][state]',v.value);
            }
        });
        if (orderItems.length !== 0){
            $.each(orderItems,function (k,v) {
                if((v.item_code === '' || v.item_code === null) ||  (v.name === '' || v.name === null) || (v.price === '' || v.price === null) ||
                    (v.quantity === '' || v.quantity === null) || (v.discount === '' || v.discount === null) || (v.tax === '' || v.tax === null) ||
                    (v.total === '' || v.total === null)){
                    w2ui.main.remove(v.recid);
                    return true;
                }
                data.append('items['+k+'][product_id]',v.product_id);
                data.append('items['+k+'][price]',v.price);
                data.append('items['+k+'][quantity]',v.quantity);
                data.append('items['+k+'][discount_value]',v.discount_value);
                data.append('items['+k+'][tax_value]',v.tax_value);
                data.append('items['+k+'][total]',v.total);
            });
        }else{
            w2ui.main.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">Please Add Items For this Order.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.main.message();">Close</button></div>'
            });
            return false;
        }
        if(orderPayment.length !== 0){
            $.each(orderPayment,function (k,v) {
                if(v.value === '' || v.value === null){
                    w2ui.bottom.message({
                        width   : 400,
                        height  : 180,
                        html    : '<div  style="padding: 60px; text-align: center">The Field '+v.name.toLowerCase().split(' ').join('_').split(':').join('')+' is Required.</div>'+
                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.bottom.message();">Close</button></div>'
                    });
                    return false;
                }
                data.append('payment['+k+'][reference]',v.reference);
                data.append('payment['+k+'][payment_account]',v.payment_account);
                data.append('payment['+k+'][description]',v.description);
                data.append('payment['+k+'][date]',v.date);
                data.append('payment['+k+'][outstanding_balance]',v.outstanding_balance);
                data.append('payment['+k+'][amount]',v.amount);
                data.append('payment['+k+'][remarks]',v.remarks);
                data.append('payment['+k+'][state]',v.state);
            });
        }else{
            w2ui.bottom.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">Please Add A Payment For this Order.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.bottom.message();">Close</button></div>'
            });
            return false;
        }

        data.append('total_amount',w2ui.main.summary[0].quantity);
        data.append('total_discount_amount',w2ui.main.summary[1].quantity);
        data.append('total_tax_amount',w2ui.main.summary[2].quantity);
        data.append('total_items',w2ui.main.summary[3].quantity);
        data.append('total_qty',w2ui.main.summary[4].quantity);
        data.append('total_balance',w2ui.main.summary[5].quantity);

        data.append('_token','{{ csrf_token() }}');

        $.ajax({
            header:{ 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            url: '/control/purchases/store',
            type: 'post',
            data:data,
            contentType: false,
            processData: false,
            dataType: 'json',
            async: false,
            beforeSend: function() {
                // setting a timeout
                w2ui.main.lock('Please Waite.....', true);
                w2ui.top2.lock();
                w2ui.bottom2.lock();
                w2ui.bottom.lock();
            },
            success:function (data) {
                if(data.status === 'success'){
                    setTimeout(function(){
                        w2ui.main.message('The Purchase Order Has Been Registered Successfully . ');
                        w2ui.main.lock();
                    },400);
                    $().w2destroy('main');
                    $().w2destroy('bottom');
                    $().w2destroy('bottom2');
                    $().w2destroy('top2');
                    return w2ui.layout.content('main', w2ui['grid1']);
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
                        w2ui.main.message({
                            width   : 400,
                            height  : 180,
                            html    : '<div  style="padding: 60px; text-align: center">'+v[0]+'</div>'+
                            '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.main.message();">Close</button></div>'
                        });
                        return false;
                    });
                }
            }
        });
    }
    // widget configuration
    var config = {
        layout: {
            name: 'layout',resizer : 2,
            padding: 0,
            panels: [
                { type: 'left', size:'12%', resizable: true,  },
                { type: 'main',overflow: 'hidden'},
            ]
        },
        sidebar: {
            name: 'sidebar',
            nodes: [
                { id: 'purchase_control', text: 'Purchase Control', group: true, expanded: true, nodes: [
                    { id: 'purchase', text: 'Purchase', img: 'icon-page', selected: true },
                    { id: 'purchase_return', text: 'Purchase Return', img: 'icon-page' },
                ]}
            ],
            onClick: function (event) {
                switch (event.target) {
                    case 'purchase':
                        w2ui.layout.content('main', config.grid1);
                        break;
                    case 'purchase_return':
                        w2ui.layout.content('main', config.grid2);
                        break;
                }
            }
        },
        grid1: {
            header: 'Purchase Control',
            fixedBody: true,
            name: 'grid1',
            url  : {
                get    : '/control/purchases/load',
                remove : '',
                save   : ''
            },
            method  : 'GET',
            reorderColumns: true,
            reorderRows: true,
            multiSelect: false,
            selectType : 'row',
            multiSearch: true,
            recid:'id',
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
                { field: 'reference', caption: 'REFERENCE', size: '10%' },
                { field: 'supplier.name', caption: 'SUPPLIER', size: '10%' },
                { field: 'location.name', caption: 'LOCATION', size: '10%' },
                { field: 'issue_date', caption: 'ISSUE DATE', size: '10%' },
                { field: 'expiry_date', caption: 'EXPIRY DATE', size: '10%' },
                { field: 'total_balance', caption: 'TOTAL BALANCE', size: '10%' },
                { field: 'total_due', caption: 'TOTAL DUE', size: '10%' },
                { field: 'outstanding_balance', caption: 'OUTSTANDING BALANCE', size: '10%' },
                { field: 'state', caption: 'STATE', size: '10%' },
            ],
            onAdd: function (event) {
                w2ui['layout'].content('main',w2ui['layout2']);
//                config.grid2.type = 'new';
//                w2ui['layout2'].content('top',$().w2grid(config.main));
                w2ui['layout2'].content('main',$().w2grid(config.main));
                w2ui['layout2'].content('left',$().w2grid(config.top2));
                w2ui['layout2'].content('right',$().w2grid(config.bottom2));
//                w2ui['layout2'].content('preview',$().w2grid(config.bottom));
                w2ui['layout2'].content('bottom',$().w2grid(config.bottom));
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
            header: 'Purchase-Return Control',
            fixedBody: true,
            name: 'grid2',
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
        main: {
            url:'',
            header: 'Order Items',
            name: 'main',
            reorderColumns: true,
            reorderRows: true,
            multiSelect: false,
            selectType : 'row',
            multiSearch: true,
            show: {
                header: true,
                selectColumn: false,
                toolbar: true,
                footer: true,
                toolbarAdd: true,
                toolbarDelete: true,
                toolbarSave: false,
                toolbarEdit: true,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
                lineNumbers: true,
            },
            toolbar: {
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
            columns: [
                { field: 'item_code', caption: 'ITEM CODE', size: '10%' , editable: { type: 'text' }},
                { field: 'name', caption: 'DESCRIPTION', size: '20%' },
                { field: 'price', caption: 'PRICE', size: '10%' , editable: { type: 'money' }},
                { field: 'quantity', caption: 'QTY', size: '10%', editable: { type: 'text' } },
                { field: 'discount_value', caption: 'DISCOUNT', size: '10%', editable: { type: 'money' } },
                { field: 'tax_value', caption: 'TAX', size: '10%'},
                { field: 'total', caption: 'TOTAL', size: '10%' },
            ],
            summary: [
                { recid: 's-1', price: 'Total Before VAT Tax:', quantity: 0},
                { recid: 's-2', price: 'Total Discount:', quantity: 0},
                { recid: 's-3', price: 'Total VAT Tax:', quantity: 0},
                { recid: 's-4', price: 'Total Items:', quantity: 0},
                { recid: 's-5', price: 'Total Quantity:', quantity: 0},
                { recid: 's-6', price: 'Total:', quantity: 0},
            ],
            onKeydown: function(event) {
//                console.log('keyCode', event.originalEvent.keyCode);
            },
            onEditField:function (event) {
            },
            onChange:function (event) {
              if(event.column === 0){
                  var product = $.getValues('/control/product/'+event.value_new+'/find').records[0];
                  this.set(event.recid,{item_code:product.sku,product_id:product.id,name:product.name,price:''});
                  this.editField(event.recid, 2);
              }
              if (event.column === 2){
                  if(event.value_new == 0){
                      event.preventDefault();
                      return this.trigger($.extend(event, { isStopped:true}));
                  }
                  this.set(event.recid,{price:event.value_new,quantity:''});
                  this.editField(event.recid, 3);
              }
              if (event.column === 3){
                  if(event.value_new == 0){
                      event.preventDefault();
                      return this.trigger($.extend(event, { isStopped:true}));
                  }
                  this.set(event.recid,{quantity:event.value_new,discount_value:''});
                  this.editField(event.recid, 4);
                }
                if (event.column === 4){
                    // set discount value
                    this.set(event.recid,{discount_value:event.value_new});
                    // get total price of item  - discount value
                    var totalPrice =  ( this.records[event.recid].price *  this.records[event.recid].quantity ) - event.value_new;
                    // get tax amount of item
                    var tax = ( totalPrice * 5 / 100);
                    // get total price with tax of item
                    var totalWithTax = (totalPrice + tax);
                    // set total price with tax of item
                    this.set(event.recid,{tax_value:tax,total: totalWithTax});
                    // set summary info
                    var totalPriceBeforeVat = 0;
                    var totalDiscount = 0;
                    var totalVat = 0;
                    var totalItems = this.records.length;
                    var totalQuantity = 0;
                    var total = 0;
                    $.each(this.records,function (k,v) {
                        totalPriceBeforeVat += (v.price * v.quantity);
                        totalDiscount += eval(v.discount_value);
                        totalVat += v.tax_value;
                        totalQuantity += eval(v.quantity);
                        total += v.total;
                    });
                    this.summary[0].quantity = totalPriceBeforeVat;
                    this.summary[1].quantity = totalDiscount;
                    this.summary[2].quantity = totalVat;
                    this.summary[3].quantity = totalItems;
                    this.summary[4].quantity = totalQuantity;
                    this.summary[5].quantity = total;
                    this.mergeChanges();
                    this.toolbar.click('w2ui-add');
                }
            },
//            onClick: function (event) {
//                w2ui.grid2.columns[1].editable  = false;
//                w2ui['grid2'].clear();
//                w2ui['grid2'].type = 'show';
//                var record = this.get(event.recid);
//                w2ui['grid2'].add([
//                    { recid: 0, name: 'Name:', value: record.name },
//                    { recid: 1, name: 'Email:', value: record.email },
//                    { recid: 2, name: 'Phone:', value: record.phone },
//                    { recid: 3, name: 'Telephone:', value: record.telephone },
//                    { recid: 4, name: 'City:', value: record.city },
//                    { recid: 5, name: 'Street:', value: record.street },
//                    { recid: 6, name: 'Address line1:', value: record.address_line1},
//                    { recid: 7, name: 'Address line2:', value: record.address_line2 },
//                    { recid: 8, name: 'Zip code:', value: record.zip_code },
//                    { recid: 9, name: 'Status:', value:record.status}
//                ]);
//            },
            onLoad:function (event) {
            },
            onAdd: function (event) {
                var recid = this.records.length;
                this.add({recid:recid,item_code:'',name:'',quantity:'',discount_value:'',price:'',tax_value:'',total:''});
                this.editField(recid, 0);
            },
//            onEdit: function (event) {
//                var record = this.get(event.recid);
//                w2ui['grid2'].clear();
//                w2ui['grid2'].add([
//                    { recid: 0, name: 'Name:', value: record.name,type:'text' ,supplier_id:record.id},
//                    { recid: 1, name: 'Email:', value: record.email,type:'text',supplier_id:record.id },
//                    { recid: 2, name: 'Phone:', value: record.phone ,type:'text',supplier_id:record.id},
//                    { recid: 3, name: 'Telephone:', value: record.telephone,type:'text',supplier_id:record.id },
//                    { recid: 4, name: 'City:', value: record.city,type:'text' ,supplier_id:record.id},
//                    { recid: 5, name: 'Street:', value: record.street ,type:'text',supplier_id:record.id},
//                    { recid: 6, name: 'Address line1:', value: record.address_line1,type:'text',supplier_id:record.id},
//                    { recid: 7, name: 'Address line2:', value: record.address_line2,type:'text',supplier_id:record.id },
//                    { recid: 8, name: 'Zip code:', value: record.zip_code,type:'text' ,supplier_id:record.id},
//                    { recid: 9, name: 'Status:', value:record.status,type:'text',supplier_id:record.id}
//                ]);
//                w2ui.grid2.columns[1].editable = {type:'text'};
//                w2ui.grid2.type = 'edit';
//                w2ui.grid1['toolbar'].enable('w2ui-save');
//                return w2ui.layout.content('main', w2ui.grid2);
//            },
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
//            onDblClick: function (event) {
//                w2ui.grid2.url = '/hrms/employee/'+event.recid+'/find';
//                w2ui.grid2.method = 'get';
//                w2ui.grid2.type = 'show';
//                return w2ui.layout.content('main', w2ui.grid2);
//            }
        },
        bottom: {
            header: 'Order Payments',
            name: 'bottom',
            show: {
                header: true,
                columnHeaders: true,
                toolbar: true,
                footer: true,
                toolbarAdd: true,
                toolbarDelete: true,
                toolbarSave: false,
                toolbarEdit: false,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
            toolbar: {

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
            columns: [
                { field: 'reference', caption: 'Reference No', size: '10%' ,editable: { type: 'text' }},
                { field: 'payment_account', caption: 'Payment Account', size: '10%' ,editable: { type: 'list',items:[{id:'cash',text:'Cash'},{id:'Bank-cheque',text:'Bank Cheque'},{id:'Bank-transfer',text:'Bank Transfer'}],showAll:true}},
                { field: 'description', caption: 'Description', size: '10%',editable: { type: 'text' } },
                { field: 'date', caption: 'Date', size: '10%' ,editable: { type: 'date' ,format: 'yyyy.m.d'}},
                { field: 'amount', caption: 'Amount', size: '10%',editable: { type: 'money' } },
                { field: 'outstanding_balance', caption: 'Outstanding Balance', size: '10%' },
                { field: 'remarks', caption: 'Remarks', size: '10%',editable: { type: 'text' } },
                { field: 'state', caption: 'State', size: '10%',editable: { type: 'list',items:statusData,showAll:true}},
            ],
            onEditField: function(event) {

            },
            onChange:function (event) {
                if(event.column === 1){
                    this.set(event.recid,{payment_account:event.value_new});
                    this.set(event.recid,{outstanding_balance:w2ui.main.summary[5].quantity});
                    this.editField(event.recid, 2);
                }
                if(event.column === 2){
                    this.set(event.recid,{description:event.value_new});
                    this.editField(event.recid, 3);
                }
                if(event.column === 3){
                    this.set(event.recid,{date:event.value_new});
                    this.editField(event.recid, 4);
                }
                if(event.column === 4){
                    var total = w2ui.main.summary[5].quantity - event.value_new;
                    this.set(event.recid,{amount:event.value_new,outstanding_balance:total});
                    this.editField(event.recid, 6);
                }
                if(event.column === 6){
                    this.set(event.recid,{remarks:event.value_new});
                    this.editField(event.recid, 7);
                }
                if(event.column === 7){
                    this.set(event.recid,{state:event.value_new});
                    this.mergeChanges();
                }
            },
            onAdd:function (event) {
                if(w2ui.main.records.length === 0) return;
                var recid = w2ui.bottom.records.length;
                this.add({recid:recid,reference:'PYT-'+recid});
                this.editField(recid, 1);
            }
        },
        top2:  {
            header: 'Order Information',
            name: 'top2',
            show: { header: true, columnHeaders: false },
            columns: [
                { field: 'name', caption: 'Name', size: '50%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'value', caption: 'Value', size: '50%' ,editable: {}}
            ],
            records:[
                {recid:0,name:'Reference:',value:purchaseOrderData.reference+1,type:'text' },
                {recid:1,name:'Supplier:',value:'', type: 'list',items: suppliersData},
                {recid:2,name:'Location:',value:'', type: 'list',items: locationsData },
                {recid:3,name:'Issue Date:',value:'', type: 'date' ,format: 'yyyy-m-d'},
                {recid:4,name:'Expiry Date:',value:'', type: 'date' ,format: 'yyyy-m-d'},
                {recid:5,name:'Description:',value:'', type: 'text' },
                {recid:6,name:'Remark:',value:'', type: 'text' },
                {recid:7,name:'State:',value:'', type: 'list',items:statusData },
            ],
            onEditField: function(event) {
               this.columns[1].editable.type = this.records[event.recid].type;
               if(this.records[event.recid].type === 'list'){
                   this.columns[1].editable.items = this.records[event.recid].items;
                   this.columns[1].editable.showAll = true;
               }
               if(this.records[event.recid].type === 'date'){
                   this.columns[1].editable.format = this.records[event.recid].format;
               }

            },
        },
        bottom2: {
            header: 'Order Shipping & Documents',
            name: 'bottom2',
            selectType : 'cell',
            show: {
                header: true,
                columnHeaders: true,
                toolbar: true,
                footer: true,
                toolbarAdd: false,
                toolbarDelete: false,
                toolbarSave: false,
                toolbarEdit: false,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
            toolbar: {
                items:[
                    { type: 'button',  id: 'add_document',  caption: 'Documents', icon: 'w2ui-icon-plus' },
                    { type: 'button',  id: 'delete_document',  caption: 'Documents', icon: 'w2ui-icon-cross' }
                ],
                onClick: function (event) {
                    if (event.target === 'add_document') {
                        $('#tb_bottom2_toolbar_item_add_document').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="doc_name" >Document Name: </label><select  id="doc_name"  name="document_name"><option value="PURCHASE-INVOICE">PURCHASE INVOICE</option><option value="PURCHASE-PAYMENT">PURCHASE PAYMENT</option><option value="PURCHASE-SHIPPING">PURCHASE SHIPPING</option><option value="OTHERS">OTHERS</option></select> | <input id="doc_file" type="file" name="document_file"><button class="w2ui-btn" onclick="documents_save();">Save</button>'+
                            '</div>',
                        });
                    }
                    if (event.target === 'delete_document') {
                        var g = w2ui.bottom2.records;
                        var selected = w2ui['bottom2'].getSelection();
                        $.each(g,function (k,v) {
                            if (selected[0].column === 2 || selected[0].column === 3 ){
                                if(v.doc_name !== '' && v.doc_file !== '' ){
                                    data.delete('document_name['+selected[0].recid+']');
                                    data.delete('document_file['+selected[0].recid+']');
                                    w2ui.bottom2.set(selected[0].recid,{doc_name:'',doc_file:''} );
                                    w2ui.bottom2.message({
                                        width: 400,
                                        height: 180,
                                        html: '<div  style="padding: 60px; text-align: center">The Document Has Been Removed.</div>' +
                                        '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.bottom2.message();">Close</button></div>'
                                    });
                                    return false;
                                }
                            }
                        });
                    }

                }
            },
            columns: [
                { field: 'name', caption: 'Column', size: '27%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'value', caption: 'Value', size: '20%' ,editable: { type: 'text' }},
                { field: 'doc_name', caption: 'Document Name', size: '20%', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'doc_file', caption: 'Document file', size: '20%' },
            ],
            records:[
                {recid:0,name:'Shipping Company:',value:'',doc_name:'',doc_file:'',type:'list',items:shippingCompanyData},
                {recid:1,name:'Shipping Tracker:',value:'',doc_name:'',doc_file:'',type:'text'},
                {recid:2,name:'Shipping From:',value:'',doc_name:'',doc_file:'',type:'list',items:cityData},
                {recid:3,name:'Shipping To:',value:'',doc_name:'',doc_file:'',type:'list',items:cityData},
                {recid:4,name:'Shipping Date:',value:'',doc_name:'',doc_file:'',type:'date',format: 'yyyy-m-d'},
                {recid:5,name:'Shipping Cost:',value:'',doc_name:'',doc_file:'',type:'money'},
                {recid:6,name:'Shipping STATE:',value:'',doc_name:'',doc_file:'',type:'list',items:statusData},
            ],
            onEditField: function(event) {
               this.columns[1].editable.type = this.records[event.recid].type;
                if(this.records[event.recid].type === 'list'){
                    this.columns[1].editable.items = this.records[event.recid].items;
                    this.columns[1].editable.showAll = true;
                }
                if(this.records[event.recid].type === 'date'){
                    this.columns[1].editable.format = this.records[event.recid].format;
                }
            },
        }
    };
    $().w2layout({
        name: 'layout2',padding: 0,
        panels: [
            { type: 'top', size: '5%',  toolbar: {
                items: [
                    { type: 'button',  id: 'back', caption: 'BACK', icon: 'fa fa-arrow-left'},
                    { type: 'break',  id: 'break22' },
                    { type: 'button',  id: 'save', caption: 'SAVE', icon: 'fa fa-save'},
                    { type: 'break',  id: 'break0' },
                    { type: 'menu',   id: 'item2', caption: 'Drop Down', img: 'icon-folder', items: [
                        { text: 'Item 1', icon: 'icon-page' },
                        { text: 'Item 2', icon: 'icon-page' },
                        { text: 'Item 3', value: 'Item Three', icon: 'icon-page' }
                    ]},
                    { type: 'break', id: 'break1' },
                    { type: 'radio',  id: 'item3',  group: '1', caption: 'Radio 1', img: 'icon-page', hint: 'Hint for item 3', checked: true },
                    { type: 'radio',  id: 'item4',  group: '1', caption: 'Radio 2', img: 'icon-page', hint: 'Hint for item 4' },
                    { type: 'spacer' },
                    { type: 'button',  id: 'item5',  caption: 'Item 5', icon: 'w2ui-icon-check', hint: 'Hint for item 5' }
                ],
                onClick: function (event) {
                    if(event.target === 'save'){
                        return save();
                    }
                    if(event.target === 'back'){
                        $().w2destroy('main');
                        $().w2destroy('bottom');
                        $().w2destroy('bottom2');
                        $().w2destroy('top2');
                        return w2ui.layout.content('main', w2ui['grid1']);
                    }
//                    this.owner.content('main', event);
                } }},
            { type: 'left', size: '15%',  resizable: true,  },
            { type: 'main', size: '40%',  resizable: true,  },
            { type: 'right', size: '25%',  resizable: true,    },
            { type: 'bottom', size: '25%',  resizable: true,    },
        ],
    });
    $(function () {
        // initialization
        $('#layout').w2layout(config.layout);
        w2ui.layout.content('left', $().w2sidebar(config.sidebar));
        w2ui.layout.content('main', $().w2grid(config.grid1));
//        w2ui.layout.content('bottom', $().w2grid(config.bottom));
//        w2ui.layout.content('right', w2ui['layout2']);
//        w2ui['layout2'].content('top',$().w2grid(config.top2));
//        w2ui['layout2'].content('bottom',$().w2grid(config.bottom2));
    });
</script>
