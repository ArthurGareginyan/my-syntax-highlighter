/*
 * My Syntax Highlighter
 * CodeMirror editor
 * @since 0.1
 * @agareginyan
 */


// Chanhe editor to CodeMirror
/*var editor = CodeMirror.fromTextArea(document.getElementById('mshighlighter'), {
    lineNumbers: true,
    matchBrackets: true,
    readOnly: true,
    mode: 'application/x-httpd-php',
    indentUnit: 4
});*/

var list = document.getElementsByTagName('textarea');
for (i in list) {
    //list[i].innerHTML = "TEST TEST TEST";
    var editor = CodeMirror.fromTextArea( list[i] , {
                                         lineNumbers: true,
                                         matchBrackets: true,
                                         mode: 'application/x-httpd-php',
                                         indentUnit: 4
                                         });
    editor.refresh();
}