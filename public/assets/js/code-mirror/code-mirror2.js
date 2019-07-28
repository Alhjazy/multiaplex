// ------
// Init Code Mirror mixed HTML in one command

$(function () {
    $('head').append(
        '<!-- CODE MIRROR -->\n'+
        '<link rel="stylesheet" href="/public/assets/css/code-mirror.css">\n'+
        '<script src="/public/assets/js/code-mirror/codemirror.js"></script>\n'+
        '<script src="/public/assets/js/code-mirror/javascript.js"></script>\n'+
        '<script src="/public/assets/js/code-mirror/htmlmixed.js"></script>\n'+
        '<script src="/public/assets/js/code-mirror/css.js"></script>\n'+
        '<script src="/public/assets/js/code-mirror/xml.js"></script>\n'
    );
});