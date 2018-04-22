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
        let language = $( elements ).attr( "language" );
        let mode = CodeMirror.findModeByName(language);
        let mime = 'text'
        if ( mode && mode.hasOwnProperty('mime') ) {
            mime = mode.mime;
        }
        // Change editor to CodeMirror

        let editor = CodeMirror.fromTextArea( elements , {
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
