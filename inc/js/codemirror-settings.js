/*
 * Settings of CodeMirror editor
 *
 * @package     My Syntax Highlighter
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2016-2018 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Get values for variables
    var theme = spacexchimp_p010_scriptParams["theme"];
    var line_numbers = ( spacexchimp_p010_scriptParams["line_numbers"] == 'true' );
    var first_line_number = parseInt( spacexchimp_p010_scriptParams["first_line_number"] );
    var dollar_sign = spacexchimp_p010_scriptParams["dollar_sign"];
    var tab_size = parseInt( spacexchimp_p010_scriptParams["tab_size"] );

    // Find all textareas on page
    $('textarea.mshighlighter').each(function(index, elements) {

        // Switch language mode
        var language = $( elements ).attr( "language" );
        var mime = 'text';
        switch( language ) {
                                case "php":
                                         mime = "text/x-php";                // PHP
                                         //mime = "application/x-httpd-php"; // HTML/PHP
                                         break;
                                case "javascript":
                                         mime = "text/javascript";
                                         break;
                                case "js":
                                         mime = "text/javascript";
                                         break;
                                case "xml":
                                         mime = "application/xml";
                                         break;
                                case "html":
                                         mime = "text/html";
                                         break;
                                case "css":
                                         mime = "text/css";
                                         break;
                                case "scss":
                                         mime = "text/css";
                                         break;
                                case "less":
                                         mime = "text/css";
                                         break;
                                case "sass":
                                         mime = "text/x-sass";
                                         break;
                                case "markdown":
                                         mime = "text/x-markdown";
                                         break;
                                case "perl":
                                         mime = "text/x-perl";
                                         break;
                                case "sql":
                                         mime = "text/x-sql";
                                         break;
                                case "mysql":
                                         mime = "text/x-mysql";
                                         break;
                                case "shell":
                                         mime = "text/x-php";
                                         break;
                                case "bash":
                                         mime = "text/x-php";
                                         break;
                            }

        // Change editor to CodeMirror
        var editor = CodeMirror.fromTextArea( elements , {
            lineNumbers: line_numbers,
            firstLineNumber: first_line_number,
            matchBrackets: true,
            indentUnit: tab_size,
            readOnly: true,
            theme: theme,
            mode: mime
        });

        // Refresh CodeMirror editor
        editor.refresh();

    });

    // Replace line numbers with dollar sign
    if ( dollar_sign == 'true' ) {
        $(".CodeMirror-linenumber").each(function() {
            var number = $(this).text();
            var dollar = number.replace(/[0-9]+/, "$");
            $(this).text(dollar);
        });
    }

});
