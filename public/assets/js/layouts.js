
//
//
// var app = {name:'Laravel'};
//
//
// function initCode() {
//     // CodeMirror
//     var text = $('#example_code .preview');
//     if (text.length > 0) {
//         var cm = CodeMirror(
//             function(elt) { text[0].parentNode.replaceChild(elt, text[0]); },
//             {
//                 value        : $.trim(text.val()),
//                 mode        : "text/html",
//                 readOnly    : true,
//                 gutter        : true,
//                 lineNumbers    : true
//             }
//         );
//         cm.setSize(null, cm.doc.height + 15);
//     }
//     var text = $('#example_code .json');
//     if (text.length > 0) {
//         var cm = CodeMirror(
//             function(elt) { text[0].parentNode.replaceChild(elt, text[0]); },
//             {
//                 value        : $.trim(text.val()),
//                 mode        : "javascript",
//                 readOnly    : true,
//                 gutter        : true,
//                 lineNumbers    : true
//             }
//         );
//         cm.setSize(null, cm.doc.height + 15);
//     }
//     $('#example_code .jsfiddle').on('click', function () {
//         // $('#fiddleForm textarea[name=html]').val(html || '');
//         // $('#fiddleForm textarea[name=js]').val(js || '');
//         // $('#fiddleForm textarea[name=css]').val(css || '');
//         $('#fiddleForm').submit();
//     });
// }