<div id="layout" style=" height: 100%;width: 100%;"></div>

<script type="text/javascript">

    function findRecID(id,arr){
        return $.grep(arr, function(n, i){
            return n.id == id;
        });
    };
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
    var day  = (new Date()).getDate();
    var month  = (new Date()).getMonth()+1;
    var year  = (new Date()).getFullYear();
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
    var purchaseOrderData = $.getValues('/sales/last').records;
    var customerData = $.getValues('/customers/load').records;
    var employeeData = $.getValues('/employee/load').records;
    var locationsData = $.getValues('/locations/load').records;
    var shippingCompanyData = [{id:'LOCAL',text:'LOCAL'},{id:'NAQEL',text:'NAQEL'},{id:'ARAMEX',text:'ARAMEX'},{id:'SMSA',text:'SMSA'},{id:'DHL',text:'DHL'}];
    var statusData = [{id:'PENDING',text:'PENDING'},{id:'PROCESSING',text:'PROCESSING'},{id:'REJECTED',text:'REJECTED'},{id:'COMPLETE',text:'COMPLETE'}];
    var paidData = [{id:'CASH',text:'CASH'},{id:'BANK',text:'BANK'},{id:'CREDIT',text:'CREDIT'}];
    var data  = new FormData();
    function documents_edit() {
        var doc_name = $('input#doc_name');
        var doc_file = $('input#doc_file')[0];
        var g = w2ui.order_attachment.records;
        var selected = w2ui.order_attachment.getSelection();
        if($(doc_name).val() !== '' && $(doc_file).val() !== ''){
            if(selected.length > 0){
                w2ui.order_attachment.set(selected[0],{name:doc_name.val(),file:doc_file.files[0]} );
                $('#tb_bottom2_toolbar_item_edit_document').w2overlay();
                w2ui.order_attachment.editField(selected[0], 2);
                w2ui.order_attachment.selectNone();
            }else{
                w2ui.order_attachment.add({recid:g.length,name:doc_name.val(),file:doc_file.files[0]} );
                $('#tb_bottom2_toolbar_item_edit_document').w2overlay();
                w2ui.order_attachment.editField(g.length, 2);
                w2ui.order_attachment.selectNone();
            }
            w2ui.order_attachment.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Documents Has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_attachment.message();">Close</button></div>'
            });
        }
    }
    function documents_save() {
        var doc_name = $('input#doc_name');
        var doc_file = $('input#doc_file')[0];
        var g = w2ui.order_attachment.records;
        var selected = w2ui.order_attachment.getSelection();
        if($(doc_name).val() !== '' && $(doc_file).val() !== ''){
            if(selected.length > 0){
                data.append('document['+selected[0]+'][name]',doc_name.val());
                data.append('document['+selected[0]+'][file]',doc_file.files[0]);
                data.append('document['+selected[0]+'][id]',g[selected[0]].id);
                w2ui.order_attachment.set(selected[0],{name:doc_name.val(),file:doc_file.files[0].name} );
                $('#tb_bottom2_toolbar_item_add_document').w2overlay();
                w2ui.order_attachment.editField(selected[0], 2);
                w2ui.order_attachment.selectNone();
            }else{
                data.append('document['+g.length+'][name]',doc_name.val());
                data.append('document['+g.length+'][file]',doc_file.files[0]);
                w2ui.order_attachment.add({recid:g.length,name:doc_name.val(),file:doc_file.files[0].name} );
                $('#tb_bottom2_toolbar_item_add_document').w2overlay();
                w2ui.order_attachment.editField(g.length, 2);
                w2ui.order_attachment.selectNone();
            }
            w2ui.order_attachment.message({
                width   : 400,
                height  : 180,
                html    : '<div  style="padding: 60px; text-align: center">The Documents Has Been Add.</div>'+
                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_attachment.message();">Close</button></div>'
            });
        }
    }
    function save() {
        var info = w2ui.order_info.validate(true);
        // edit
        if(w2ui['order_info'].type === 'edit' && info.length === 0){
            //            w2ui['order_info'].record.id
            // information order data
            $.each(w2ui.order_info.record,function (k,v)  {
                if(k === 'location_id'){
                    data.append('location_id',v.id);
                    return true;
                }
                if(k === 'employee_id'){
                    data.append('employee_id',v.id);
                    return true;
                }
                if(k === 'customer_id'){
                    data.append('customer_id',v.id);
                    return true;
                }
                if(k === 'status'){
                    data.append('status',v.id);
                    return true;
                }
                if(k === 'reference'){
                    data.append('reference',v);
                    return true;
                }
                if(k === 'issue_date'){
                    data.append('issue_date',v);
                    return true;
                }
                if(k === 'expiry_date'){
                    data.append('expiry_date',v);
                    return true;
                }
                if(k === 'due_date'){
                    data.append('due_date',v);
                    return true;
                }
                if(k === 'description'){
                    data.append('description',v);
                    return true;
                }
                if(k === 'remark'){
                    data.append('remark',v);
                    return true;
                }
            });
            // Items order data
            if (w2ui.order_items.records.length !== 0){
                w2ui.order_items.mergeChanges();
                $.each(w2ui.order_items.records,function (k,v) {
                    if((v.item_code === '' || v.item_code === null) ||  (v.name === '' || v.name === null) || (v.price === '' || v.price === null) ||
                        (v.quantity === '' || v.quantity === null) || (v.tax_value === '' || v.tax_value === null) ||
                        (v.total === '' || v.total === null)){
                        w2ui.order_items.remove(v.recid);
                        return true;
                    }
                    if(v.id) data.append('items['+k+'][id]',v.id);
                    data.append('items['+k+'][product_id]',v.product_id);
                    data.append('items['+k+'][price]',v.price);
                    data.append('items['+k+'][quantity]',v.quantity);
                    data.append('items['+k+'][stock]',v.stock);
                    data.append('items['+k+'][discount]',v.discount);
                    data.append('items['+k+'][tax_value]',v.tax_value);
                    data.append('items['+k+'][total]',v.total);
                });
            }else{
                w2ui.order_items.message({
                    width   : 400,
                    height  : 180,
                    html    : '<div  style="padding: 60px; text-align: center">Please Add Items For this Order.</div>'+
                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                });
                return false;
            }
            // Payments order data
            if( w2ui.order_payment.length !== 0){
                w2ui.order_payment.mergeChangesWithID();
                $.each( w2ui.order_payment.records,function (k,v) {
                    if(v.id) data.append('payment['+k+'][id]',v.id);
                    data.append('payment['+k+'][reference]',v.reference);
                    data.append('payment['+k+'][payment_method]',v.payment_method);
                    data.append('payment['+k+'][description]',v.description);
                    data.append('payment['+k+'][date]',v.date);
                    data.append('payment['+k+'][outstanding_balance]',v.outstanding_balance);
                    data.append('payment['+k+'][amount]',v.amount);
                    data.append('payment['+k+'][remarks]',v.remarks);
                    data.append('payment['+k+'][status]',v.status);
                });
            }
            // Shipping order data
            if(w2ui.order_shipping.records.length !== 0){
                w2ui.order_shipping.mergeChanges();
                $.each(w2ui.order_shipping.records,function (k,v) {
                    if(v.id) data.append('shipping['+k+'][id]',v.id);
                    data.append('shipping['+k+'][company]',v.company);
                    data.append('shipping['+k+'][cost]',v.cost);
                    data.append('shipping['+k+'][date]',v.date);
                    data.append('shipping['+k+'][from]',v.from);
                    data.append('shipping['+k+'][status]',v.status);
                    data.append('shipping['+k+'][to]',v.to);
                    data.append('shipping['+k+'][remarks]',v.remarks);
                    data.append('shipping['+k+'][tracker]',v.tracker);
                });
            }
            // Attachment order data
            if(w2ui.order_attachment.records.length !== 0){
                w2ui.order_attachment.mergeChanges();
                $.each(w2ui.order_attachment.records,function (k,v) {
                    if(v.id) data.append('document['+k+'][id]',v.id);
                    data.append('document['+k+'][name]',v.name);
                    data.append('document['+k+'][file]',v.file);
                    data.append('document['+k+'][remarks]',v.remarks);
                    data.append('document['+k+'][status]',v.status);

                });
            }

            data.append('total_amount',w2ui.order_items.summary[0].quantity);
            data.append('total_discount_amount',w2ui.order_items.summary[1].quantity);
            data.append('total_tax_amount',w2ui.order_items.summary[2].quantity);
            data.append('total_items',w2ui.order_items.summary[3].quantity);
            data.append('total_qty',w2ui.order_items.summary[4].quantity);
            data.append('total_balance',w2ui.order_items.summary[5].quantity);

            data.append('_token','{{ csrf_token() }}');
            if(w2ui['order_info'].record.id) data.append('id',w2ui['order_info'].record.id);
            $.ajax({
                header:{ 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                url: '/sales/update',
                type: 'post',
                data:data,
                contentType: false,
                processData: false,
                dataType: 'json',
                async: false,
                beforeSend: function() {
                    w2ui['layout'].lock('main', 'Loading...', true);
                },
                success:function (data) {
                    if(data.status === 'success'){
                        $().w2destroy('order_info');
                        $().w2destroy('order_items');
                        $().w2destroy('order_payment');
                        $().w2destroy('order_shipping');
                        $().w2destroy('order_attachment');
                        w2ui['layout'].unlock('main', true);
                        return w2ui.layout.content('main', w2ui['grid1']);
                    }
                },
                error:function (xhr) {
                    if (xhr.status === 302){
                        w2ui.order_information.unlock();
                        w2ui.order_items.unlock();
                        w2ui.order_payment.unlock();
                        w2ui.order_shipping.unlock();
                        w2ui.order_attachment.unlock();
                        var err = $.parseJSON(xhr.responseText);
                        w2ui.order_items.message({
                            width   : 400,
                            height  : 180,
                            html    : '<div  style="padding: 60px; text-align: center">'+err.errors+'</div>'+
                            '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                        });
                        return false;
                    }
                    if (xhr.status === 422){
                        w2ui.order_information.unlock();
                        w2ui.order_items.unlock();
                        w2ui.order_payment.unlock();
                        w2ui.order_shipping.unlock();
                        w2ui.order_attachment.unlock();
                        var err = $.parseJSON(xhr.responseText);
                        $.each(err.errors,function (k,v) {
                            w2ui.order_items.message({
                                width   : 400,
                                height  : 180,
                                html    : '<div  style="padding: 60px; text-align: center">'+v[0]+'</div>'+
                                '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                            });
                            return false;
                        });
                    }
                }
            });
            return false;
        }
        // add new
         if(info.length === 0){

             // information order data
             $.each(w2ui.order_info.record,function (k,v)  {
                 if(k === 'location_id'){
                     data.append('location_id',v.id);
                     return true;
                 }
                 if(k === 'employee_id'){
                     data.append('employee_id',v.id);
                     return true;
                 }
                 if(k === 'customer_id'){
                     data.append('customer_id',v.id);
                     return true;
                 }
                 if(k === 'paid_type'){
                     data.append('paid_type',v.id);
                     return true;
                 }
                 if(k === 'status'){
                     data.append('status',v.id);
                     return true;
                 }
                 data.append(k,v);
             });
             // Items order data
             if (w2ui.order_items.records.length !== 0){
                 w2ui.order_items.mergeChanges();
                 $.each(w2ui.order_items.records,function (k,v) {
                     if((v.item_code === '' || v.item_code === null) ||  (v.name === '' || v.name === null) || (v.price === '' || v.price === null) ||
                         (v.quantity === '' || v.quantity === null) || (v.discount === '' || v.discount === null) || (v.tax === '' || v.tax === null) ||
                         (v.total === '' || v.total === null)){
                         w2ui.order_items.remove(v.recid);
                         return true;
                     }
                     console.log(v);
                     data.append('items['+k+'][product_id]',v.product_id);
                     data.append('items['+k+'][product_sku]',v.product_sku);
                     data.append('items['+k+'][product_name]',v.name);
                     data.append('items['+k+'][price]',v.price);
                     data.append('items['+k+'][quantity]',v.quantity);
                     data.append('items['+k+'][stock]',v.stock);
                     data.append('items['+k+'][discount]',v.discount);
                     data.append('items['+k+'][tax_value]',v.tax_value);
                     data.append('items['+k+'][total]',v.total);
                 });
             }else{
                 w2ui.order_items.message({
                     width   : 400,
                     height  : 180,
                     html    : '<div  style="padding: 60px; text-align: center">Please Add Items For this Order.</div>'+
                     '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                 });
                 return false;
             }
             // Payments order data
             if( w2ui.order_payment.length !== 0){
                 w2ui.order_payment.mergeChangesWithID();
                 $.each( w2ui.order_payment.records,function (k,v) {
                     data.append('payment['+k+'][reference]',v.reference);
                     data.append('payment['+k+'][payment_method]',v.payment_method);
                     data.append('payment['+k+'][description]',v.description);
                     data.append('payment['+k+'][date]',v.date);
                     data.append('payment['+k+'][outstanding_balance]',v.outstanding_balance);
                     data.append('payment['+k+'][amount]',v.amount);
                     data.append('payment['+k+'][remarks]',v.remarks);
                     data.append('payment['+k+'][status]',v.status);
                 });
             }
             // Shipping order data
             if(w2ui.order_shipping.records.length !== 0){
                 w2ui.order_shipping.mergeChanges();
                 $.each(w2ui.order_shipping.records,function (k,v) {
                     data.append('shipping['+k+'][company]',v.company);
                     data.append('shipping['+k+'][cost]',v.cost);
                     data.append('shipping['+k+'][date]',v.date);
                     data.append('shipping['+k+'][from]',v.from);
                     data.append('shipping['+k+'][status]',v.status);
                     data.append('shipping['+k+'][to]',v.to);
                     data.append('shipping['+k+'][tracker]',v.tracker);
                 });
             }
             // Attachment order data
             if(w2ui.order_attachment.records.length !== 0){
                 w2ui.order_attachment.mergeChanges();
                 $.each(w2ui.order_attachment.records,function (k,v) {
                     if(v.name === 'remark'){
                         data.append('document['+v.recid+'][remark]',v.value);
                         return true;
                     }
                     if(v.name === 'status'){
                         data.append('document['+v.recid+'][status]',v.status);
                         return true;
                     }
                 });
             }

             data.append('total_amount',w2ui.order_items.summary[0].quantity);
             data.append('total_discount_amount',w2ui.order_items.summary[1].quantity);
             data.append('total_tax_amount',w2ui.order_items.summary[2].quantity);
             data.append('total_items',w2ui.order_items.summary[3].quantity);
             data.append('total_qty',w2ui.order_items.summary[4].quantity);
             data.append('total_balance',w2ui.order_items.summary[5].quantity);

             data.append('_token','{{ csrf_token() }}');
             $.ajax({
                 header:{ 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                 url: '/sales/store',
                 type: 'post',
                 data:data,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 async: false,
                 beforeSend: function() {
                     w2ui['layout'].lock('main', 'Loading...', true);
                 },
                 success:function (data) {
                     if(data.status === 'success'){
                         $().w2destroy('order_info');
                         $().w2destroy('order_items');
                         $().w2destroy('order_payment');
                         $().w2destroy('order_shipping');
                         $().w2destroy('order_attachment');
                         w2ui['layout'].unlock('main', true);
                         return w2ui.layout.content('main', w2ui['grid1']);
                     }
                 },
                 error:function (xhr) {
                     if (xhr.status === 302){
                         w2ui.order_information.unlock();
                         w2ui.order_items.unlock();
                         w2ui.order_payment.unlock();
                         w2ui.order_shipping.unlock();
                         w2ui.order_attachment.unlock();
                         var err = $.parseJSON(xhr.responseText);
                         w2ui.order_items.message({
                             width   : 400,
                             height  : 180,
                             html    : '<div  style="padding: 60px; text-align: center">'+err.errors+'</div>'+
                             '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                         });
                         return false;
                     }
                     if (xhr.status === 422){
                         w2ui.order_information.unlock();
                         w2ui.order_items.unlock();
                         w2ui.order_payment.unlock();
                         w2ui.order_shipping.unlock();
                         w2ui.order_attachment.unlock();
                         var err = $.parseJSON(xhr.responseText);
                         $.each(err.errors,function (k,v) {
                             w2ui.order_items.message({
                                 width   : 400,
                                 height  : 180,
                                 html    : '<div  style="padding: 60px; text-align: center">'+v[0]+'</div>'+
                                 '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_items.message();">Close</button></div>'
                             });
                             return false;
                         });
                     }
                 }
             });
         }
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
                { id: 'sales_control', text: 'Sales Control', group: true, expanded: true, nodes: [
                    { id: 'sales', text: 'Sales', img: 'icon-page', selected: true },
                    { id: 'sales_return', text: 'Sales Return', img: 'icon-page' },
                ]}
            ],
            onClick: function (event) {
                switch (event.target) {
                    case 'sales':
                        w2ui.layout.content('main', w2ui['grid1'] ?  w2ui['grid1'] : $().w2grid(config.grid1));
                        break;
                    case 'sales_return':
                        w2ui.layout.content('main',  w2ui['grid2'] ?  w2ui['grid2'] : $().w2grid(config.grid2));
                        break;
                }
            }
        },
        grid1: {
            header: 'Sales Control',
            fixedBody: true,
            name: 'grid1',
            url  : {
                get    : '/sales/load',
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
                lineNumbers:true
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
                        var order = $.getValues('/sales/'+selected[0]+'/find').records;
                        w2ui['layout'].content('main',w2ui['layout2']);
                        config.order_info.type = 'show';
                        config.order_items.type = 'show';
                        config.order_payment.type = 'show';
                        config.order_shipping.type = 'show';
                        config.order_attachment.type = 'show';
                        config.order_info.record = order;
                        config.order_items.records = order.order_items;
                        config.order_items.summary[0].quantity = order.total_amount;
                        config.order_items.summary[1].quantity = order.total_discount_amount;
                        config.order_items.summary[2].quantity = order.total_tax_amount;
                        config.order_items.summary[3].quantity = order.total_items;
                        config.order_items.summary[4].quantity = order.total_qty;
                        config.order_items.summary[5].quantity = order.total_balance;
                        config.order_payment.records = order.order_payment;
                        config.order_shipping.records = order.order_shipping;
                        config.order_attachment.records = order.order_document;
                        w2ui['layout2'].content('top',w2ui['order_info'] ? w2ui['order_info'] : $().w2form(config.order_info));
                        w2ui['layout2'].content('main',w2ui['order_items'] ? w2ui['order_items'] :$().w2grid(config.order_items));
                        $().w2grid(config.order_attachment);
                        $().w2grid(config.order_payment);
                        $().w2grid(config.order_shipping);
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
                { field: 'reference', caption: 'REFERENCE', size: '5%' },
                { field: 'customer.name', caption: 'CUSTOMER', size: '10%' },
                { field: 'employee.full_name', caption: 'EMPLOYEE', size: '10%' },
                { field: 'location.name', caption: 'LOCATION', size: '10%' },
                { field: 'issue_date', caption: 'ISSUE DATE', size: '10%' },
                { field: 'expiry_date', caption: 'EXPIRY DATE', size: '10%' },
                { field: 'due_date', caption: 'DUE DATE', size: '10%' },
                { field: 'total_balance', caption: 'TOTAL BALANCE', size: '10%' },
                { field: 'total_due', caption: 'TOTAL DUE', size: '10%' },
                { field: 'outstanding_balance', caption: 'OUTSTANDING BALANCE', size: '10%' },
                { field: 'status', caption: 'STATUS', size: '10%' },
            ],
            onAdd: function (event) {
                if(w2ui['order_info'] || w2ui['order_items'] || w2ui['order_attachment'] || w2ui['order_shipping'] || w2ui['order_payment']){
                    $().w2destroy('order_info');
                    $().w2destroy('order_items');
                    $().w2destroy('order_attachment');
                    $().w2destroy('order_shipping');
                    $().w2destroy('order_payment');
                }
                w2ui['layout'].content('main',w2ui['layout2']);
                w2ui['layout2'].content('top',w2ui['order_info'] ? w2ui['order_info'] : $().w2form(config.order_info));
                w2ui['layout2'].content('main',w2ui['order_items'] ? w2ui['order_items'] : $().w2grid(config.order_items));
                $().w2grid('order_attachment');
                $().w2grid('order_shipping');
                $().w2grid('order_payment');
                w2ui['order_info'].type = 'new';
                w2ui['order_items'].type = 'new';
                w2ui['order_attachment'].type = 'new';
                w2ui['order_shipping'].type = 'new';
                w2ui['order_payment'].type = 'new';
            },
            onEdit: function (event) {
                var order = $.getValues('/sales/'+event.recid+'/find').records;
                w2ui['layout'].content('main',w2ui['layout2']);
                w2ui['layout2'].content('top',w2ui['order_info'] ? w2ui['order_info'] : $().w2form(config.order_info));
                w2ui['layout2'].content('main',w2ui['order_items'] ? w2ui['order_items'] :$().w2grid(config.order_items));
                $().w2grid(config.order_attachment);
                $().w2grid(config.order_payment);
                $().w2grid(config.order_shipping);
                w2ui['order_info'].type = 'edit';
                w2ui['order_items'].type = 'edit';
                w2ui['order_attachment'].type = 'edit';
                w2ui['order_shipping'].type = 'edit';
                w2ui['order_payment'].type = 'edit';
                w2ui['order_info'].record = order;
                var items = [];
                var payment = [];
                var shipping = [];
                var attachement = [];
                $.each(order.order_items,function (k,v) {
                    items[k] = v;
                    items[k].recid = k;
                });
                $.each(order.order_payment,function (k,v) {
                    payment[k] = v;
                    payment[k].recid = k;
                });
                $.each(order.order_shipping,function (k,v) {
                    shipping[k] = v;
                    shipping[k].recid = k;
                });
                $.each(order.order_document,function (k,v) {
                    attachement[k] = v;
                    attachement[k].recid = k;
                });
                w2ui['order_items'].records = items;
                w2ui['order_items'].summary[0].quantity = order.total_amount;
                w2ui['order_items'].summary[1].quantity = order.total_discount_amount;
                w2ui['order_items'].summary[2].quantity = order.total_tax_amount;
                w2ui['order_items'].summary[3].quantity = order.total_items;
                w2ui['order_items'].summary[4].quantity = order.total_qty;
                w2ui['order_items'].summary[5].quantity = order.total_balance;
                w2ui['order_attachment'].records = attachement;
                w2ui['order_shipping'].records = shipping;
                w2ui['order_payment'].records = payment;
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
            onDblClick: function (event) {
                var order = $.getValues('/sales/'+event.recid+'/find').records;
                w2ui['layout'].content('main',w2ui['layout2']);
                w2ui['layout2'].content('top',w2ui['order_info'] ? w2ui['order_info'] : $().w2form(config.order_info));
                w2ui['layout2'].content('main',w2ui['order_items'] ? w2ui['order_items'] :$().w2grid(config.order_items));
                $().w2grid(config.order_attachment);
                $().w2grid(config.order_payment);
                $().w2grid(config.order_shipping);
                w2ui['order_info'].type = 'show';
                w2ui['order_items'].type = 'show';
                w2ui['order_attachment'].type = 'show';
                w2ui['order_shipping'].type = 'show';
                w2ui['order_payment'].type = 'show';
                //disable the grid & top form
                w2ui['order_info'].lock();
                w2ui['order_items'].show.toolbar = false;
                w2ui['order_items'].columns[0].editable = false;
                w2ui['order_items'].columns[1].editable = false;
                w2ui['order_items'].columns[3].editable = false;
                w2ui['order_attachment'].show.toolbar = false;
                w2ui['order_attachment'].columns[2].editable = false;
                w2ui['order_attachment'].columns[3].editable = false;
                w2ui['order_shipping'].show.toolbar = false;
                w2ui['order_shipping'].columns[0].editable = false;
                w2ui['order_shipping'].columns[1].editable = false;
                w2ui['order_shipping'].columns[2].editable = false;
                w2ui['order_shipping'].columns[3].editable = false;
                w2ui['order_shipping'].columns[4].editable = false;
                w2ui['order_shipping'].columns[5].editable = false;
                w2ui['order_shipping'].columns[5].editable = false;
                w2ui['order_shipping'].columns[6].editable = false;
                w2ui['order_shipping'].columns[7].editable = false;
                w2ui['order_payment'].show.toolbar = false;
                w2ui['order_payment'].columns[0].editable = false;
                w2ui['order_payment'].columns[1].editable = false;
                w2ui['order_payment'].columns[2].editable = false;
                w2ui['order_payment'].columns[3].editable = false;
                w2ui['order_payment'].columns[4].editable = false;
                w2ui['order_payment'].columns[6].editable = false;
                w2ui['order_payment'].columns[7].editable = false;

                w2ui['order_info'].record = order;
                w2ui['order_items'].records = order.order_items;
                w2ui['order_items'].summary[0].quantity = order.total_amount;
                w2ui['order_items'].summary[1].quantity = order.total_discount_amount;
                w2ui['order_items'].summary[2].quantity = order.total_tax_amount;
                w2ui['order_items'].summary[3].quantity = order.total_items;
                w2ui['order_items'].summary[4].quantity = order.total_qty;
                w2ui['order_items'].summary[5].quantity = order.total_balance;
                w2ui['order_attachment'].records = order.order_document;
                w2ui['order_shipping'].records = order.order_shipping;
                w2ui['order_payment'].records = order.order_payment;

            }
        },
        grid2: {
            header: 'Sales-Return Control',
            fixedBody: true,
            name: 'grid2',
            url  : {
                get    : '/sales/load',
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
                { field: 'reference', caption: 'REFERENCE', size: '5%' },
                { field: 'customer.name', caption: 'CUSTOMER', size: '10%' },
                { field: 'employee.full_name', caption: 'EMPLOYEE', size: '10%' },
                { field: 'location.name', caption: 'LOCATION', size: '10%' },
                { field: 'issue_date', caption: 'ISSUE DATE', size: '10%' },
                { field: 'expiry_date', caption: 'EXPIRY DATE', size: '10%' },
                { field: 'due_date', caption: 'DUE DATE', size: '10%' },
                { field: 'total_balance', caption: 'TOTAL BALANCE', size: '10%' },
                { field: 'total_due', caption: 'TOTAL DUE', size: '10%' },
                { field: 'outstanding_balance', caption: 'OUTSTANDING BALANCE', size: '10%' },
                { field: 'status', caption: 'STATUS', size: '10%' },
            ],
            onAdd: function (event) {
                w2ui['layout'].content('main',w2ui['layout2']);
                w2ui['layout2'].content('top',w2ui['order_info'] ? w2ui['order_info'] : $().w2form(config.order_info));
                w2ui['layout2'].content('main',w2ui['order_items'] ? w2ui['order_items'] :$().w2grid(config.order_items));
//                config.grid2.type = 'new';
//                w2ui['layout2'].content('top',$().w2grid(config.main));
//                w2ui['layout2'].content('left',$().w2grid(config.order_information));
//                w2ui['layout2'].content('bottom',$().w2grid(config.order_payment));
//                w2ui['layout2'].content('preview',$().w2grid(config.bottom));
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
        order_information:  {
            header: 'Order Information',
            name: 'order_information',
            show: { header: true, columnHeaders: false },
            columns: [
                { field: 'name', caption: 'Name', size: '50%',style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;'},
                { field: 'value', caption: 'Value', size: '50%' ,editable: {}}
            ],
            records:[
                {recid:0,name:'Reference:',value:purchaseOrderData.reference+1,type:'text' },
                {recid:1,name:'Customer:',value:'', type: 'list',items: customerData},
                {recid:2,name:'Location:',value:'', type: 'list',items: locationsData },
                {recid:3,name:'Issue Date:',value:'', type: 'date' ,format: 'yyyy-m-d'},
                {recid:4,name:'Expiry Date:',value:'', type: 'date' ,format: 'yyyy-m-d'},
                {recid:5,name:'DUE Date:',value:'', type: 'date' ,format: 'yyyy-m-d'},
                {recid:6,name:'Paid Type:',value:'', type: 'list',items:paidData },
                {recid:7,name:'Description:',value:'', type: 'text' },
                {recid:8,name:'Remark:',value:'', type: 'text' },
                {recid:9,name:'State:',value:'', type: 'list',items:statusData },
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
        order_info:{
            name   : 'order_info',
            type:'show',
            formHTML:'<div id="form" style="width: 750px;">' +
            '    <div class="w2ui-page page-0">\n' +
            '        <div style="width: 49%; float: left; margin-right: 0px;">\n' +
            '            <div style="padding: 3px; font-weight: bold; color: #777;">Order Information</div>\n' +
            '            <div class="w2ui-group" style="height: 210px;">\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Reference:</label>\n' +
            '                    <div>\n' +
            '                        <input name="reference" readonly type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Issue Date:</label>\n' +
            '                    <div>\n' +
            '                        <input name="issue_date" type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Expiry Date:</label>\n' +
            '                    <div>\n' +
            '                        <input name="expiry_date" type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>DUE Date:</label>\n' +
            '                    <div>\n' +
            '                        <input name="due_date" type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Status:</label>\n' +
            '                    <div>\n' +
            '                        <input name="status" type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div style="width: 50%; float: left; margin-top: 17px;">\n' +
            '            <div class="w2ui-group" style="height: 210px;">\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Customer #:</label>\n' +
            '                    <div>\n' +
            '                        <input name="customer_id"  type="text" maxlength="100" style="width: 100%"/>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Location:</label>\n' +
            '                    <div>\n' +
            '                        <input name="location_id"  type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Employee #:</label>\n' +
            '                    <div>\n' +
            '                        <input name="employee_id"  value="{{Auth::user()->id}}" type="text" maxlength="100" style="width: 100%">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Description:</label>\n' +
            '                    <div>\n' +
            '                        <textarea name="description" type="text" style="width: 100%; height: 40px; resize: none"></textarea>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="w2ui-field w2ui-span4">\n' +
            '                    <label>Remark:</label>\n' +
            '                    <div>\n' +
            '                        <textarea name="remark" type="text" style="width: 100%; height: 40px; resize: none"></textarea>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>',
            fields : [
                { field: 'reference', },
                { field: 'issue_date',  type: 'date', required: true,options:{format:'yyyy/mm/dd'}},
                { field: 'expiry_date',   type: 'date', required: true,options:{format:'yyyy/mm/dd'}},
                { field: 'due_date',   type: 'date', required: true,options:{format:'yyyy/mm/dd'}},
                { field: 'status', type: 'list', required: true ,options:{items:statusData, openOnFocus: true,} },
                { field: 'location_id', type: 'list', required: true,options:{items:locationsData, openOnFocus: true,} },
                { field: 'employee_id', type: 'list', required: true,options:{items:employeeData, openOnFocus: true,} },
                { field: 'description', type: 'text'},
                { field: 'remark', type: 'text' },
                { field: 'customer_id', type: 'list', required: true ,options:{items:customerData, openOnFocus: true,}},
            ],
            record: {
//                reference    : purchaseOrderData+1,
            },
            onChange: function (event) {
                if(event.target === 'customer_id'){
                    this.record.customer_id = event.value_new.id;
                    this.record.customer_name = event.value_new.name;
                    this.record.customer_phone = event.value_new.phone;
                    this.record.customer_type = event.value_new.type;
                    this.record.customer_address = event.value_new.address;
                    this.refresh();
                }
            }
        },
        order_items: {
            url:'',
            header: 'Order Items',
            name: 'order_items',
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
                toolbarEdit: false,
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
                { field: 'item_code', caption: 'ITEM CODE', size: '10%' , editable: this.type === 'show' ? false : { type: 'text' }, render: function (record) {
                   if(record.product && ( this.type === 'show' || this.type === 'edit')) return record.product.sku;
                    return record.item_code;
                }},
                { field: 'name', caption: 'DESCRIPTION', size: '20%', render: function (record) {
                    if(record.product) return record.product.name;
                    return record.name;
                }},
                { field: 'price', caption: 'PRICE', size: '10%'},
                { field: 'quantity', caption: 'QTY', size: '10%', editable: { type: 'text' } },
                { field: 'stock', caption: 'STOCK', size: '10%' },
                { field: 'discount', caption: 'DISCOUNT', size: '10%' },
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
                if(event.originalEvent.keyCode === 13){
                    this.toolbar.click('w2ui-add');
                }
            },
            onChange:function (event) {

              if(event.column === 0){
                  var location  = w2ui.order_info.record.location_id;
                  if(!location){
                      return this.message('Please Select Location In Order Information');
                  }
                  var product = $.getValues('/sales/product/'+event.value_new+'/'+location.id+'/find').records[0];
                  if(!product || product.sales_price.length === 0){
                      return this.message('Error: Product Not Found , Please Try Another Code ');
                  }
                  if(product.stock.length === 0){
                      return this.message('Error: This Product Has No Stock Found in This Location , Please Try with Another Location Or Product ');
                  }
                  this.set(event.recid,{item_code:product.sku,product_id:product.id,name:product.name,price:product.sales_price[0].price,stock:product.stock[0].quantity});
                  this.editField(event.recid,3);
              }
              if (event.column === 3){
                  if(event.value_new === 0 || event.value_new > this.records[event.recid].stock){
                     return  this.message('Error: Stock Not Available ');
//                      this.trigger($.extend(event, { isStopped:true}));
                  }
                  this.set(event.recid,{quantity:event.value_new ,discount:0});
                  // set discount value
//                  this.set(event.recid,{discount:event.value_new});
                  // get total price of item  - discount value
//                  var totalPrice =  ( this.records[event.recid].price *  this.records[event.recid].quantity ) - event.value_new;
                  // get tax amount of item
                  var tax = ( ( this.records[event.recid].price *  this.records[event.recid].quantity ) * 5 / 100);
                  // get total price with tax of item
                  var totalWithTax = (( this.records[event.recid].price *  this.records[event.recid].quantity ) + tax);
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
                      totalPriceBeforeVat += parseFloat(v.price * v.quantity);
                      totalDiscount += parseFloat(v.discount);
                      totalVat += parseFloat(v.tax_value);
                      totalQuantity += parseFloat(v.quantity);
                      total += parseFloat(v.total);
                  });
                  this.summary[0].quantity = totalPriceBeforeVat;
                  this.summary[1].quantity = totalDiscount;
                  this.summary[2].quantity = totalVat;
                  this.summary[3].quantity = totalItems;
                  this.summary[4].quantity = totalQuantity;
                  this.summary[5].quantity = total;
                  this.mergeChanges();
                }

            },
            onLoad:function (event) {
            },
            onAdd: function (event) {
                if (this.records.length !== 0){
                    $.each(this.records,function (k,v) {
                        if((v.item_code === '' || v.item_code === null) ||  (v.name === '' || v.name === null) || (v.price === '' || v.price === null) ||
                            (v.quantity === '' || v.quantity === null) ||  (v.tax_value === '' || v.tax_value === null) ||
                            (v.total === '' || v.total === null)){
                            w2ui.order_items.remove(v.recid);
                            return true;
                        }
                    });
                }
                var id = this.records.length;
                this.add({recid:id,item_code:'',name:'',quantity:'',stock:'',discount:'',price:'',tax_value:'',total:''});
                this.editField(id,0);
            },
            onDelete: function (event) {
                console.log('delete has default behavior');
            },
        },
        order_payment: {
            header: 'Order Payments',
            name: 'order_payment',
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
                { field: 'payment_method', caption: 'Payment Method', size: '10%' ,editable: { type: 'list',items:[{id:'CASH',text:'CASH'},{id:'BANK_CHEQUE',text:'BANK CHEQUE'},{id:'BANK_TRANSFER',text:'BANK TRANSFER'}],showAll:true}},
                { field: 'description', caption: 'Description', size: '10%',editable: { type: 'text' } },
                { field: 'date', caption: 'Date', size: '10%' ,editable: { type: 'date' ,format: 'yyyy.m.d'}},
                { field: 'amount', caption: 'Amount', size: '10%',editable: { type: 'money' } },
                { field: 'outstanding_balance', caption: 'Outstanding Balance', size: '10%' },
                { field: 'remarks', caption: 'Remarks', size: '10%',editable: { type: 'text' } },
                { field: 'status', caption: 'Status', size: '10%',editable: { type: 'list',items:[{id:'PENDING',text:'PENDING'},{id:'COMPLETE',text:'COMPLETE'}],showAll:true}},
            ],
            onEditField: function(event) {

            },
            onChange:function (event) {
                if(event.column === 1){
                    if(event.recid === 0){
                        this.set(event.recid,{payment_method:event.value_new,outstanding_balance:w2ui.order_items.summary[5].quantity});
                    }else{
                        console.log(this.records);
                        this.set(event.recid,{payment_method:event.value_new,outstanding_balance:this.records[event.recid-1].outstanding_balance});
                    }
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
                    var total = 0;
                    if(event.recid === 0){
                         total = w2ui.order_items.summary[5].quantity - event.value_new;
                        this.set(event.recid,{amount:event.value_new,outstanding_balance:total});
                    }else{
                         total = this.records[event.recid-1].outstanding_balance - event.value_new;
                        this.set(event.recid,{amount:event.value_new,outstanding_balance:total});
                    }
                    this.editField(event.recid, 6);
                }
                if(event.column === 6){
                    this.set(event.recid,{remarks:event.value_new});
                    this.editField(event.recid, 7);
                }
                if(event.column === 7){
                    this.set(event.recid,{status:event.value_new});
                    this.mergeChanges();
                }
            },
            onAdd:function (event) {
                if(w2ui.order_items.records.length === 0) return;
                var recid = w2ui.order_payment.records.length;
                this.add({recid:recid,reference:'PYT-'+eval($.getValues('/sales/pay/last').records+eval((recid+1)))});
                this.editField(recid, 1);
            },
        },
        order_shipping: {
            header: 'Order Shipping',
            name: 'order_shipping',
            selectType : 'row',
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
            columns: [
                { field: 'company', caption: 'Shipping Company', size: '20%',editable: { type: 'list' ,items:shippingCompanyData}},
                { field: 'tracker', caption: 'Shipping Tracker', size: '20%',editable: { type: 'text' }},
                { field: 'from', caption: 'Shipping From', size: '20%',editable: { type: 'list',items:cityData }},
                { field: 'to', caption: 'Shipping To', size: '20%',editable: { type: 'list',items:cityData}},
                { field: 'date', caption: 'Shipping Date', size: '20%' ,editable: { type: 'date',format: 'yyyy/mm/dd' }},
                { field: 'cost', caption: 'Shipping Cost', size: '20%' ,editable: { type: 'money' }},
                { field: 'remarks', caption: 'Shipping Remarks', size: '20%' ,editable: { type: 'text' }},
                { field: 'status', caption: 'Shipping Status', size: '20%' ,editable: { type: 'list',items:statusData }},
            ],

            onChange:function (event) {
                if(event.column === 0){
                    this.set(event.recid,{company:event.value_new});
                    this.editField(event.recid, 1);
                }
                if(event.column === 1){
                    this.set(event.recid,{tracker:event.value_new});
                    this.editField(event.recid, 2);
                }
                if(event.column === 2){
                    this.set(event.recid,{from:event.value_new});
                    this.editField(event.recid, 3);
                }
                if(event.column === 3){
                    this.set(event.recid,{to:event.value_new});
                    this.editField(event.recid, 4);
                }
                if(event.column === 4){
                    this.set(event.recid,{date:event.value_new});
                    this.editField(event.recid, 5);
                }
                if(event.column === 5){
                    this.set(event.recid,{cost:event.value_new});
                    this.editField(event.recid, 6);
                }
                if(event.column === 6){
                    this.set(event.recid,{remarks:event.value_new});
                    this.editField(event.recid, 7);
                }
                if(event.column === 7){
                    this.set(event.recid,{status:event.value_new});
                    this.mergeChanges();
                }
            },
            onAdd:function (event) {
                var recid = w2ui.order_shipping.records.length;
                this.add({recid:recid});
                this.editField(recid, 0);
            }
        },
        order_attachment:   {
            header: 'Order Documents',
            name: 'order_attachment',
            selectType : 'row',
            show: {
                header: true,
                columnHeaders: true,
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
            },
            toolbar: {
                onClick: function (event) {
                    if (event.target === 'w2ui-add') {
                        $('#tb_order_attachment_toolbar_item_w2ui-add').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="doc_name" >Document Name: </label><input  id="doc_name"  name="document_name" /> | <input id="doc_file" type="file" name="document_file"><button class="w2ui-btn" onclick="documents_save();">Add</button>'+
                            '</div>',
                        });
//                        return w2ui.order_attachment['toolbar'].enable('w2ui-save');
                    }
                    if (event.target === 'w2ui-edit') {
                        $('#tb_order_attachment_toolbar_item_w2ui-edit').w2overlay({
                            openAbove:false,
                            align: 'none',
                            html: '<div style="padding: 10px; line-height: 150%">'+
                            '<label for="doc_name" >Document Name: </label><input  id="doc_name"  name="document_name" /> | <input id="doc_file" type="file" name="document_file"><button class="w2ui-btn" onclick="documents_edit();">Edit</button>'+
                            '</div>',
                        });
//                        return w2ui.order_attachment['toolbar'].enable('w2ui-save');
                    }

                    if (event.target === 'show') {
                        var selected = w2ui['grid1'].getSelection();
                        w2ui.grid2.url = '/hrms/employee/'+selected[0]+'/find';
                        w2ui.grid2.method = 'get';
                        w2ui.grid2.type = 'show';
                        return w2ui.layout.content('main', w2ui.grid2);
                    }
                }
            },
            columns: [
                { field: 'name', caption: 'Document Name', size: '20%'},
                { field: 'file', caption: 'Document File', size: '20%',render:function (record) {
                    if(record.file.name) return record.file.name;
                    return record.file;
                }},
                { field: 'remarks', caption: 'Remarks', size: '20%',editable: { type: 'text'}},
                { field: 'status', caption: 'Status', size: '20%' ,editable: { type: 'list',items:statusData }},
            ],
            onAdd:function (event) {

            },
            onDelete:function (event) {
                event.preventDefault();
                var selected = w2ui['order_attachment'].getSelection();
                data.delete('document_name['+selected+']');
                data.delete('document_file['+selected+']');
                this.remove(selected);
                w2ui.order_attachment.message({
                    width: 400,
                    height: 180,
                    html: '<div  style="padding: 60px; text-align: center">The Document Has Been Removed.</div>' +
                    '<div style="text-align: center"><button class="w2ui-btn" onclick="w2ui.order_attachment.message();">Close</button></div>'
                });
            }
        },
    };
    $().w2layout({
        name: 'layout2',padding: 0,
        panels: [
            { type: 'top', size: '34%',  toolbar: {
                items: [
                    { type: 'button',  id: 'back', caption: 'BACK', icon: 'fa fa-arrow-left'},
                    { type: 'break',  id: 'break22' },
                    { type: 'button',  id: 'save', caption: 'SAVE', icon: 'fa fa-save'},
                    { type: 'break', id: 'break1' },
                    { type: 'button',  id: 'print',  group: '1', caption: 'Print', icon: 'fa fa-print', hint: 'Print' },
                    { type: 'menu',   id: 'item2', caption: 'Export', icon: 'fa fa-export', items: [
                        { text: 'Item 1', icon: 'icon-page' },
                        { text: 'Item 2', icon: 'icon-page' },
                        { text: 'Item 3', value: 'Item Three', icon: 'icon-page' }
                    ]},
//                    { type: 'spacer' },
//                    { type: 'button',  id: 'item5',  caption: 'Item 5', icon: 'w2ui-icon-check', hint: 'Hint for item 5' }
                ],
                onClick: function (event) {
                    if(event.target === 'print'){
                        var gridContent = w2ui['order_items'].getRecordsHTML();
                        var newWindow = window.open('', '', 'width=800, height=500'),
                            document = newWindow.document.open(),
                            pageContent =
                                '<!DOCTYPE html>\n' +
                                '<html>\n' +
                                '<head>\n' +
                                '<meta charset="utf-8" />\n' +
                                '<title>'+w2ui.order_items.name+'</title>\n' +
                                '</head>\n' +
                                '<body>\n' + gridContent + '\n</body>\n</html>';
                        document.write(pageContent);
                        document.close();
                        newWindow.print();
                    }

                    if(event.target === 'save'){
                        return save();
                    }

                    if(event.target === 'back'){
                        $().w2destroy('order_info');
                        $().w2destroy('order_items');
                        $().w2destroy('order_payment');
                        $().w2destroy('order_shipping');
                        $().w2destroy('order_attachment');
                        return w2ui.layout.content('main', w2ui['grid1']);
                    }
//                    this.owner.content('main', event);
                } }},
            { type: 'main', size: '40%',  resizable: true,
                tabs: {
                active: 'items',
                tabs: [
                        { id: 'items', caption: 'Order Product' },
                        { id: 'payment', caption: 'Payment Bill' },
                        { id: 'shipping', caption: 'Shipping' },
                        { id: 'attachment', caption: 'Attachment' },
                    ],
                onClick: function (event) {
                    if(event.target === 'items'){
                        w2ui['order_items'] ?  this.owner.content('main',w2ui['order_items']) : this.owner.content('main',$().w2grid(config.order_items));
                    }
                    if(event.target === 'payment'){
                       w2ui['order_payment'] ?  this.owner.content('main',w2ui['order_payment']) : this.owner.content('main',$().w2grid(config.order_payment));
                    }
                    if(event.target === 'shipping'){
                        w2ui['order_shipping'] ?  this.owner.content('main',w2ui['order_shipping']) : this.owner.content('main',$().w2grid(config.order_shipping));
                    }
                    if(event.target === 'attachment'){
                        w2ui['order_attachment'] ?  this.owner.content('main',w2ui['order_attachment']) : this.owner.content('main',$().w2grid(config.order_attachment));
                    }
                }
              }
            },
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
