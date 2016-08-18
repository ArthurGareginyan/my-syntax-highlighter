/*
 * My Syntax Highlighter
 * CodeMirror editor settings
 * @since 1.0
 * @agareginyan
 */


(function(){
    "use strict";

    jQuery(document).ready(function($) {

        // Get values for variables
        var theme = scriptParams["theme"];
        var line_numbers = ( scriptParams["line_numbers"] == 'true' );
        var first_line_number = parseInt( scriptParams["first_line_number"] );
        var tab_size = parseInt( scriptParams["tab_size"] );

        // Find all textareas on page
        $('textarea.mshighlighter').each(function(index, elements) {

            // Switch language mode
            var language = $( elements ).attr( "language" );
            var mode = "";
            switch( language ) {
                                case "php":
                                         mode = "text/x-php";                // PHP
                                         //mode = "application/x-httpd-php"; // HTML/PHP
                                         break;
                                case "javascript":
                                         mode = "text/javascript";
                                         break;
                                case "js":
                                         mode = "text/javascript";
                                         break;
                                case "xml":
                                         mode = "application/xml";
                                         break;
                                case "html":
                                         mode = "text/html";
                                         break;
                                case "css":
                                         mode = "text/css";
                                         break;
                                case "scss":
                                         mode = "text/css";
                                         break;
                                case "less":
                                         mode = "text/css";
                                         break;
                                case "sass":
                                         mode = "text/x-sass";
                                         break;
                                case "markdown":
                                         mode = "text/x-markdown";
                                         break;
                                case "perl":
                                         mode = "text/x-perl";
                                         break;
                                case "sql":
                                         mode = "text/x-sql";
                                         break;
                                case "mysql":
                                         mode = "text/x-mysql";
                                         break;
                                case "shell":
                                         mode = "text/x-php";
                                         break;
                                case "bash":
                                         mode = "text/x-php";
                                         break;
                             }
                                         

            // Chanhe editor to CodeMirror
            var editor = CodeMirror.fromTextArea( elements , {
                                lineNumbers: line_numbers,
                                firstLineNumber: first_line_number,
                                matchBrackets: true,
                                indentUnit: tab_size,
                                readOnly: true,
                                theme: theme,
                                mode: mode
            });

            // Refresh CodeMirror editor
            editor.refresh();

        });

    });

}());