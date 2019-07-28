<div id="main" style="width: 100%; height: 100%;"></div>

<script type="text/javascript">
    // widget configuration
    var config = {
        layout: {
            name: 'layout',
            padding: 0,
            panels: [
                { type: 'left', size: 230, resizable: true},
                { type: 'main',
                    style: 'background-color: white; border: 1px solid silver; border-top: 0px; ',
                    tabs: {
                        active: 'g_company',
                        tabs: [{ id: 'g_company', caption: 'Company',selected:true ,closable: true }],
                        onClick: function (event) {
                            if(event.target === 'g_company'){
                                w2ui['layout'].load('main', '/settings/general/company');
                                this.select(event.target);
                            }
                        },
                        onClose: function (event) {

                        }
                    }
                }
            ]
        },
        sidebar: {
            name: 'sidebar',
            nodes: [
                { id: 'general', text: 'General', group: true, expanded: true, nodes: [
                    { id: 'g_company', text: 'Company', img: 'icon-page',selected:true },
                    { id: 'g_purchase', text: 'Purchase', img: 'icon-page' },
                    { id: 'item3', text: 'Item 3', img: 'icon-page' },
                    { id: 'item4', text: 'Item 4', img: 'icon-page' }
                ]}
            ],
            onClick: function (event) {
                var tabs = w2ui.layout_main_tabs;
                console.log(event);
                if (tabs.get(event.target)) {
                    tabs.select(event.target);
                    if(event.target === 'g_company'){
                        w2ui['layout'].load('main', '/settings/general/company');
                    }
                    if(event.target === 'g_purchase'){
                        w2ui['layout'].load('main', '/settings/general/purchase');
                    }
                } else {
                    tabs.add({ id: event.target, caption: event.node.text, closable: true });
                    if(event.target === 'g_company'){
                        w2ui['layout'].load('main', '/settings/general/company');
                        w2utils.lock($('#layout_main_layout_panel_main'), 'Please Waite....', true);
                        setTimeout(function () {
                            w2utils.unlock($('#layout_main_layout_panel_main'));
                        },1000);
                        tabs.select(event.target);
                    }
                }
            }
        }
    };
    // general code of tabs and toolbar
    $(function () {
        // initialization
        $('#main').w2layout(config.layout);
        w2ui.layout.content('left', $().w2sidebar(config.sidebar));
    });
</script>