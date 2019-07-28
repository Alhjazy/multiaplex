<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">--}}

    <link rel="stylesheet" type="text/css" href="/public/assets/plugins/gridforms/gridforms.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/plugins/w2ui-1.5.rc1/w2ui-1.5.rc1.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/layouts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    .loader {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        background: #003a70;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -25px 0 0 -25px;
    }
    .mask {
        width: 30px;
        height: 30px;
        top: 10px;
        left: 10px;
        background: #fff;
        position: absolute;
        border-radius: 100%;
    }
    .dot {
        width: 6px;
        height: 6px;
        background: #fff;
        position: absolute;
        border-radius: 100%;
        left: 22px;
        top: 2px;
        -webkit-transform-origin-y:  23px;
        -webkit-animation: dot 2000ms infinite ease-out;
    }
    .two { -webkit-animation-delay: 150ms; }
    .three { -webkit-animation-delay: 600ms; }
    .four { -webkit-animation-delay: 700ms; }
    .five { -webkit-animation-delay: 1200ms; }
    .six { -webkit-animation-delay: 1300ms; }
    @-webkit-keyframes dot {
        0% {
            -webkit-transform: rotateZ(0deg);
        }
        100% {
            -webkit-transform: rotateZ(360deg);
        }
    }
</style>
</head>
<body>
<div id="loader" class="loader">
    <div class="mask"></div>
    <div class="dot one"></div>
    <div class="dot two"></div>
    <div class="dot three"></div>
    <div class="dot four"></div>
    <div class="dot five"></div>
    <div class="dot six"></div>
</div>
<div id="main_layout" style="width: 100%; height: 100%;"></div>
    <script type="text/javascript" src="http://w2ui.com/web/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/public/assets/plugins/gridforms/gridforms.js"></script>
    <script type="text/javascript" src="/public/assets/plugins/w2ui-1.5.rc1/w2ui-1.5.rc1.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    {{--<script type="text/javascript" src="/public/assets/js/code-mirror/code-mirror2.js"></script>--}}
    <script type="text/javascript" src="/public/assets/js/layouts.js"></script>
    {{--<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>--}}
    {{--<script type="text/javascript" src="/public/assets/js/script.js"></script>--}}
    {{--<script type="text/javascript" src="/public/js/crud/employee-dialog.js"></script>--}}
    {{--<script type="text/javascript" src="/public/js/crud/products-dialog.js"></script>--}}
    {{--<script type="text/javascript" src="/public/js/crud/suppliers-dialog.js"></script>--}}
    {{--<script type="text/javascript" src="/public/js/crud/branch-dialog.js"></script>--}}
<script type="text/javascript">
    jQuery.extend({
        getValues: function(url) {
            var result = null;
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {
                    result = data;
                }
            });
            return result;
        }
    });
     var loader = $('div#loader').hide();
     jQuery.ajaxSetup({
         beforeSend: function() {
             loader.show();
         },
         complete: function(){
             loader.hide();
         },
     });
    $(function () {


        // init layout
        $('#main_layout').w2layout({
            name: 'main_layout',
            panels: [
                { type: 'top', size: 45, style: 'padding: 5px; border: 0px; border-bottom: 1px solid silver; background-color: #fff; color: #555;'},
                { type: 'left', size: 240, resizable: true, style: 'border-right: 1px solid silver;' },
                { type: 'main', style: 'background-color: white;' }
            ]
        });
         w2ui['main_layout'].content('top', $().w2toolbar({
             name:'main-header',
             items: [
                 { type: 'button',  id: 'item1',style:"padding: 8px 20px; font-size: 18px;", caption: '{{config('app.name')}}', },
                 { type: 'spacer' },
                 { type: 'menu',   id: 'item2', style:"padding: 8px 20px; font-size: 18px;" ,caption: '{{ Auth::user()->name}}',  items: [
                     { text: 'Item 1', icon: 'icon-page' },
                     { text: 'Item 2', icon: 'icon-page' },
                     { text: 'Item 3', value: 'Item Three', icon: 'icon-page' }
                 ]},
             ],
             onClick: function (event) {

             }
         }));
        // init sidebar
        w2ui['main_layout'].content('left', $().w2sidebar({
            name: 'main-sidebar',
            img: null,
            nodes: [
                { id: 'control', text: 'CONTROL', group: true, expanded: true, nodes: [
                    { id: 'employee', text: 'EMPLOYEE', img: 'icon-page',  },
                    { id: 'suppliers', text: 'SUPPLIERS', img: 'icon-page', },
                    { id: 'purchases', text: 'PURCHASE', img: 'icon-page' },
                    { id: 'product', text: 'PRODUCT', img: 'icon-page', },
                    { id: 'stock', text: 'STOCK', img: 'icon-page' },
                    { id: 'sales', text: 'SALES', img: 'icon-page' },
                    { id: 'finance', text: 'FINANCE', img: 'icon-page' },
                    { id: 'project', text: 'PROJECT', img: 'icon-page' },
                    { id: 'marketing', text: 'MARKETING', img: 'icon-page' },
                ]},
                { id: 'settings', text: 'SETTINGS', group: true, expanded: true, nodes: [
                    { id: 'general', text: 'GENERAL', img: 'icon-page',  },
                ]},
                // { id: 'hrms2', text: 'HRMS', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'employee1', text: 'Employee Control', icon: 'fa-star-empty' },
                //         { id: 'combo-2', text: 'Grid & Edit', icon: 'fa-star-empty' },
                //         { id: 'combo-3', text: 'Spreadsheet Like Grid', icon: 'fa-star-empty' },
                //         { id: 'combo-4', text: 'Buffered Scroll', icon: 'fa-star-empty' },
                //         { id: 'combo-9', text: 'Infinite Scroll', icon: 'fa-star-empty' },
                //         { id: 'combo-5', text: 'Tabs With Content', icon: 'fa-star-empty' },
                //         { id: 'combo-6', text: 'Layout & Dynamic Tabs', icon: 'fa-star-empty' },
                //         { id: 'combo-7', text: 'Popup & Grid', icon: 'fa-star-empty' },
                //         { id: 'combo-8', text: 'Popup & Layout', icon: 'fa-star-empty' },
                //         { id: 'combo-10', text: 'Dependent Fields', icon: 'fa-star-empty' }
                //     ]
                // },
                // { id: 'layout', text: 'Layout', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'layout-1', text: 'Simple Layout', icon: 'fa-columns' },
                //         { id: 'layout-2', text: 'Resizable Panels', icon: 'fa-columns' },
                //         { id: 'layout-3', text: 'Show/Hide Panels', icon: 'fa-columns' },
                //         { id: 'layout-4', text: 'Load Content', icon: 'fa-columns' },
                //         { id: 'layout-5', text: 'Transitions', icon: 'fa-columns' },
                //         { id: 'layout-6', text: 'Event Listeners', icon: 'fa-columns' },
                //         { id: 'layout-7', text: 'Nested Layouts', icon: 'fa-columns' },
                //         { id: 'layout-8', text: 'Panel With Tabs', icon: 'fa-columns' },
                //         { id: 'layout-9', text: 'Panel With Toolbar', icon: 'fa-columns' },
                //         { id: 'layout-10', text: 'Panel With Title', icon: 'fa-columns' },
                //         { id: 'layout-11', text: 'Panel Messages (1.5+)', icon: 'fa-columns' }
                //     ]
                // },
                // { id: 'grid', text: 'Grid', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'grid-1', text: 'Simple Grid', icon: 'fa-table' },
                //         { id: 'grid-3', text: 'Grid Elements', icon: 'fa-table' },
                //         { id: 'grid-2', text: 'Row Formatting', icon: 'fa-table' },
                //         { id: 'grid-23',text: 'Cell Formatting', icon: 'fa-table' },
                //         { id: 'grid-4', text: 'Data Source', icon: 'fa-table' },
                //         { id: 'grid-5', text: 'Load Data Once', icon: 'fa-table' },
                //         { id: 'grid-6', text: 'Single or Multi Select', icon: 'fa-table' },
                //         { id: 'grid-8', text: 'Show/Hide Columns', icon: 'fa-table' },
                //         { id: 'grid-9', text: 'Add/Remove Records', icon: 'fa-table' },
                //         { id: 'grid-10', text: 'Select/Unselect Records', icon: 'fa-table' },
                //         { id: 'grid-11', text: 'Fixed/Resizable', icon: 'fa-table' },
                //         { id: 'grid-12', text: 'Column Sort', icon: 'fa-table' },
                //         { id: 'grid-13', text: 'Column Groups', icon: 'fa-table' },
                //         { id: 'grid-14', text: 'Summary Records', icon: 'fa-table' },
                //         { id: 'grid-15', text: 'Simple Search', icon: 'fa-table' },
                //         { id: 'grid-16', text: 'Advanced Search', icon: 'fa-table' },
                //         { id: 'grid-17', text: 'Grid Toolbar', icon: 'fa-table' },
                //         { id: 'grid-18', text: 'Master -> Detail', icon: 'fa-table' },
                //         { id: 'grid-19', text: 'Two Grids', icon: 'fa-table' },
                //         { id: 'grid-20', text: 'Render to a New Box', icon: 'fa-table' },
                //         { id: 'grid-21', text: 'Inline Editing', icon: 'fa-table' },
                //         { id: 'grid-22', text: 'Resizable Columns', icon: 'fa-table' },
                //         { id: 'grid-24', text: 'Lock/Unlock Grid', icon: 'fa-table' },
                //         { id: 'grid-25', text: 'Re-Order Columns', icon: 'fa-table' },
                //         { id: 'grid-26', text: 'Re-Order Records', icon: 'fa-table' },
                //         { id: 'grid-7',  text: 'Tree-Like Grid (1.5+)', icon: 'fa-table' },
                //         { id: 'grid-27', text: 'Frozen Columns (1.5+)', icon: 'fa-table' },
                //         { id: 'grid-28', text: 'Info Bubble (1.5+)', icon: 'fa-table' }
                //     ]
                // },
                // { id: 'toolbar', text: 'Toolbar', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'toolbar-1', text: 'Simple Toolbar', icon: 'fa-hand-up' },
                //         { id: 'toolbar-2', text: 'More Buttons Type', icon: 'fa-hand-up' },
                //         { id: 'toolbar-3', text: 'Add/Remove Buttons', icon: 'fa-hand-up' },
                //         { id: 'toolbar-4', text: 'Show/Hide Buttons', icon: 'fa-hand-up' },
                //         { id: 'toolbar-5', text: 'Enable/Disable Buttons', icon: 'fa-hand-up' },
                //         { id: 'toolbar-6', text: 'Menu Buttons (1.5+)', icon: 'fa-hand-up' },
                //         { id: 'toolbar-7', text: 'Color Buttons (1.5+)', icon: 'fa-hand-up' },
                //         { id: 'toolbar-8', text: 'Tooltips (1.5+)', icon: 'fa-hand-up' },
                //         { id: 'toolbar-9', text: 'Custom Buttons (1.5+)', icon: 'fa-hand-up' },
                //         { id: 'toolbar-10', text: 'Toolbar Overflow (1.5+)', icon: 'fa-hand-up' }
                //     ]
                // },
                // { id: 'sidebar', text: 'Sidebar', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'sidebar-1', text: 'Simple Sidebar', icon: 'fa-hand-left' },
                //         { id: 'sidebar-2', text: 'Add/Remove', icon: 'fa-hand-left' },
                //         { id: 'sidebar-3', text: 'Show/Hide', icon: 'fa-hand-left' },
                //         { id: 'sidebar-4', text: 'Enable/Disable', icon: 'fa-hand-left' },
                //         { id: 'sidebar-5', text: 'Expand/Collapse', icon: 'fa-hand-left' },
                //         { id: 'sidebar-6', text: 'Select/Unselect', icon: 'fa-hand-left' },
                //         { id: 'sidebar-8', text: 'Top & Bottom HTML', icon: 'fa-hand-left' },
                //         { id: 'sidebar-7', text: 'Events', icon: 'fa-hand-left' },
                //         { id: 'sidebar-9', text: 'Flat Sidebar (1.5+)', icon: 'fa-hand-up' },
                //         { id: 'sidebar-10', text: 'In/Out of Focus (1.5+)', icon: 'fa-hand-up' }
                //     ]
                // },
                // { id: 'tabs', text: 'Tabs', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'tabs-1', text: 'Simple Tabs', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-2', text: 'Set a Tab Active', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-3', text: 'Closeable Tabs', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-4', text: 'Add/Remove Tabs', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-5', text: 'Enable/Disabled Tabs', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-6', text: 'Show/Hide Tabs', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-7', text: 'Tabs Overflow (1.5+)', icon: 'fa-folder-close-alt' },
                //         { id: 'tabs-8', text: 'Tooltips (1.5+)', icon: 'fa-folder-close-alt' }
                //     ]
                // },
                // { id: 'forms', text: 'Forms', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'forms-1', text: 'Simple Form', icon: 'fa-edit' },
                //         { id: 'forms-10',text: 'Auto Templates', icon: 'fa-edit' },
                //         { id: 'forms-2', text: 'Field Types', icon: 'fa-edit' },
                //         { id: 'forms-3', text: 'Large Form', icon: 'fa-edit' },
                //         { id: 'forms-4', text: 'Multi Page Form', icon: 'fa-edit' },
                //         { id: 'forms-5', text: 'Form Tabs', icon: 'fa-edit' },
                //         { id: 'forms-9', text: 'Form Toolbar', icon: 'fa-edit' },
                //         { id: 'forms-8', text: 'Form in a Popup', icon: 'fa-edit' },
                //         { id: 'forms-6', text: 'Events', icon: 'fa-edit' },
                //         { id: 'forms-11', text: 'Form Columns (1.5+)', icon: 'fa-edit' }
                //     ]
                // },
                // { id: 'fields', text: 'Fields', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'fields-1', text: 'Numeric', icon: 'fa-edit',nodes:[{id: 'fields22-2', text: 'Date, Time & Datetime', icon: 'fa-edit'}] },
                //         { id: 'fields-2', text: 'Date, Time & Datetime', icon: 'fa-edit' },
                //         { id: 'fields-3', text: 'Drop Down Lists', icon: 'fa-edit' },
                //         { id: 'fields-4', text: 'Multi Selects', icon: 'fa-edit' },
                //         { id: 'fields-5', text: 'File Upload', icon: 'fa-edit' },
                //         { id: 'fields-6', text: 'Remote Source', icon: 'fa-edit' },
                //         { id: 'fields-7', text: 'Get/Set Value (1.5+)', icon: 'fa-edit' }
                //     ]
                // },
                // { id: 'popup', text: 'Popup', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'popup-1', text: 'Simple Popup', icon: 'fa-list-alt' },
                //         { id: 'popup-2', text: 'More Options', icon: 'fa-list-alt' },
                //         { id: 'popup-3', text: 'Popup Elements', icon: 'fa-list-alt' },
                //         { id: 'popup-4', text: 'Based on Markup', icon: 'fa-list-alt' },
                //         { id: 'popup-5', text: 'Load Content', icon: 'fa-list-alt' },
                //         { id: 'popup-6', text: 'Transitions', icon: 'fa-list-alt' },
                //         { id: 'popup-7', text: 'Slide a Message', icon: 'fa-list-alt' },
                //         { id: 'popup-9', text: 'Lock Content', icon: 'fa-list-alt' },
                //         { id: 'popup-8', text: 'Dialogs (1.5+)', icon: 'fa-list-alt' },
                //         { id: 'popup-10', text: 'Keyboard (1.5+)', icon: 'fa-list-alt' },
                //         { id: 'popup-11', text: 'Messages (1.5+)', icon: 'fa-list-alt' }
                //     ]
                // },
                // { id: 'utils', text: 'Utilities', img: 'icon-folder', group1: true,
                //     nodes: [
                //         { id: 'utils-1', text: 'Validation', icon: 'fa-star-empty' },
                //         { id: 'utils-2', text: 'Encoding', icon: 'fa-star-empty' },
                //         { id: 'utils-3', text: 'Transitions', icon: 'fa-star-empty' },
                //         { id: 'utils-4', text: 'Tags (1.5+)', icon: 'fa-star-empty' },
                //         { id: 'utils-5', text: 'Overlays (1.5+)', icon: 'fa-star-empty' },
                //         { id: 'utils-6', text: 'Formatters (1.5+)', icon: 'fa-star-empty' },
                //     ]
                // }
            ],
            onClick: function (event) {
                var cmd = event.target;
                // if (parseInt(cmd.substr(cmd.length-1)) != cmd.substr(cmd.length-1)) return;
                var tmp = w2ui['main-sidebar'].get(cmd);
                document.title = tmp.parent.text + ': ' + tmp.text + ' | {{config("app.name")}}';
                // delete previously created items
                for (var widget in w2ui) {
                    var nm = w2ui[widget].name;
                    if (['main_layout', 'main-sidebar','main-header'].indexOf(nm) == -1) $().w2destroy(nm);
                }
                // set hash
                if (tmp.parent && tmp.parent.id != '') {
                    var pid = w2ui['main-sidebar'].get(cmd).parent.id;
                    document.location.hash = '!'+ cmd;
                }
                // return current content
                w2ui['main_layout'].load('main', '/'+ cmd, '',function () {
//                    loader.show();
////                    w2utils.lock($('#layout_main_layout_panel_main'), 'Please Waite....', true);
//                    setTimeout(function () {
////                        w2utils.unlock($('#layout_main_layout_panel_main'));
//                        loader.hide();
//                    },1000);
                });
                // load example
            }
        }));

        // check hash
        setTimeout(function () {
            var tmp = String(document.location.hash).split('/');
            switch (tmp[0]) {
                default:
                case '#!hrms':
                    // w2ui['demo-sidebar'].expand('hrms');
                    // w2ui['demo-sidebar'].click(tmp[1] || 'hrms-1');
                    break;

                case '#!combo':
                    w2ui['demo-sidebar'].expand('combo');
                    w2ui['demo-sidebar'].click(tmp[1] || 'combo-1');
                    break;

                case '#!layout':
                    w2ui['demo-sidebar'].expand('layout');
                    w2ui['demo-sidebar'].click(tmp[1] || 'layout-1');
                    break;

                case '#!grid':
                    w2ui['demo-sidebar'].expand('grid');
                    w2ui['demo-sidebar'].click(tmp[1] || 'grid-1');
                    break;

                case '#!toolbar':
                    w2ui['demo-sidebar'].expand('toolbar');
                    w2ui['demo-sidebar'].click(tmp[1] || 'toolbar-1');
                    break;

                case '#!sidebar':
                    w2ui['demo-sidebar'].expand('sidebar');
                    w2ui['demo-sidebar'].click(tmp[1] || 'sidebar-1');
                    break;

                // case '#!listview':
                //     w2ui['demo-sidebar'].expand('listview');
                //     w2ui['demo-sidebar'].click(tmp[1] || 'listview-1');
                //     break;

                case '#!tabs':
                    w2ui['demo-sidebar'].expand('tabs');
                    w2ui['demo-sidebar'].click(tmp[1] || 'tabs-1');
                    break;

                case '#!popup':
                    w2ui['demo-sidebar'].expand('popup');
                    w2ui['demo-sidebar'].click(tmp[1] || 'popup-1');
                    break;

                case '#!forms':
                    w2ui['demo-sidebar'].expand('forms');
                    w2ui['demo-sidebar'].click(tmp[1] || 'forms-1');
                    break;

                case '#!fields':
                    w2ui['demo-sidebar'].expand('fields');
                    w2ui['demo-sidebar'].click(tmp[1] || 'fields-1');
                    break;

                case '#!utils':
                    w2ui['demo-sidebar'].expand('utils');
                    w2ui['demo-sidebar'].click(tmp[1] || 'utils-1');
                    break;
            }
        }, 100);
    });
</script>
</body>
</html>
