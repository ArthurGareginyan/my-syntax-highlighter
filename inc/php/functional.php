<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 */
function spacexchimp_p010_shortcode_processor( $content ) {

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Define the different languages for shortcodes
    $language = spacexchimp_p010_get_cm_modes();
    array_unshift( $language, "code" );

    // Create different shortcodes
    foreach( $language as $lang ){
        add_shortcode( $lang, 'spacexchimp_p010_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    return $content;
}
add_filter( 'the_content', 'spacexchimp_p010_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 */
function spacexchimp_p010_shortcode( $atts, $content = null, $lang ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P010_SETTINGS . '_settings' );

    // Default language for the [code] shortcode
    $defaultLanguage = !empty( $options['defaultLanguage'] ) ? $options['defaultLanguage'] : '';
    $languages = spacexchimp_p010_get_cm_language_mode_pairs();
    if ( $lang == "code" ) {
        $lang = $languages[ $defaultLanguage ];
    }

    // Cleaning
    $content = rtrim( $content );

    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {
        return '<div class="my-syntax-highlighter"><pre><textarea id="mshighlighter" class="mshighlighter" language="' . $lang . '" name="mshighlighter" >' . $content . '</textarea></pre></div>';
    } else {
        return $content;
    }
}

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Get a list of all modes in codemirror
 * @return Array array of all mode names in the codemirror repo
 */
function spacexchimp_p010_get_cm_modes() {
    $cm_dir =  SPACEXCHIMP_P010_PATH . 'inc/lib/codemirror/mode/';
    $modes = $dirs = array_filter( glob( $cm_dir . '*' ), 'is_dir' );
    return array_map( 'basename', $modes );
}

/**
 * Get a list of "Language Name" => "mode" pairs
 * @return Array array of all language mode pairs supported by codemirror
 */
function spacexchimp_p010_get_cm_language_mode_pairs() {
    return array(
        "APL" => "apl",
        "PGP" => "asciiarmor",
        "ASN.1" => "asn",
        "Asterisk" => "asterisk",
        "Brainfuck" => "brainfuck",
        "C" => "clike",
        "C++" => "clike",
        "Cobol" => "cobol",
        "C#" => "clike",
        "Clojure" => "clojure",
        "ClojureScript" => "clojure",
        "Closure" => "css",
        "CMake" => "cmake",
        "CoffeeScript" => "coffeescript",
        "Common" => "commonlisp",
        "Cypher" => "cypher",
        "Cython" => "python",
        "Crystal" => "crystal",
        "CSS" => "css",
        "CQL" => "sql",
        "D" => "d",
        "Dart" => "dart",
        "diff" => "diff",
        "Django" => "django",
        "Dockerfile" => "dockerfile",
        "DTD" => "dtd",
        "Dylan" => "dylan",
        "EBNF" => "ebnf",
        "ECL" => "ecl",
        "edn" => "clojure",
        "Eiffel" => "eiffel",
        "Elm" => "elm",
        "Embedded" => "htmlembedded",
        "Embedded" => "htmlembedded",
        "Erlang" => "erlang",
        "Esper" => "sql",
        "Factor" => "factor",
        "FCL" => "fcl",
        "Forth" => "forth",
        "Fortran" => "fortran",
        "F#" => "mllike",
        "Gas" => "gas",
        "Gherkin" => "gherkin",
        "GitHub" => "gfm",
        "Go" => "go",
        "Groovy" => "groovy",
        "HAML" => "haml",
        "Haskell" => "haskell",
        "Haskell" => "haskell",
        "Haxe" => "haxe",
        "HXML" => "haxe",
        "ASP.NET" => "htmlembedded",
        "HTML" => "htmlmixed",
        "HTTP" => "http",
        "IDL" => "idl",
        "Pug" => "pug",
        "Java" => "clike",
        "Java" => "htmlembedded",
        "JavaScript" => "javascript",
        "JSON" => "javascript",
        "JSON-LD" => "javascript",
        "JSX" => "jsx",
        "Jinja2" => "jinja2",
        "Julia" => "julia",
        "Kotlin" => "clike",
        "LESS" => "css",
        "LiveScript" => "livescript",
        "Lua" => "lua",
        "Markdown" => "markdown",
        "mIRC" => "mirc",
        "MariaDB" => "sql",
        "Mathematica" => "mathematica",
        "Modelica" => "modelica",
        "MUMPS" => "mumps",
        "MS" => "sql",
        "mbox" => "mbox",
        "MySQL" => "sql",
        "Nginx" => "nginx",
        "NSIS" => "nsis",
        "NTriples" => "ntriples",
        "Objective" => "clike",
        "OCaml" => "mllike",
        "Octave" => "octave",
        "Oz" => "oz",
        "Pascal" => "pascal",
        "PEG.js" => "pegjs",
        "Perl" => "perl",
        "PHP" => "php",
        "Pig" => "pig",
        "Plain" => "null",
        "PLSQL" => "sql",
        "PowerShell" => "powershell",
        "Properties" => "properties",
        "ProtoBuf" => "protobuf",
        "Python" => "python",
        "Puppet" => "puppet",
        "Q" => "q",
        "R" => "r",
        "reStructuredText" => "rst",
        "RPM" => "rpm",
        "RPM" => "rpm",
        "Ruby" => "ruby",
        "Rust" => "rust",
        "SAS" => "sas",
        "Sass" => "sass",
        "Scala" => "clike",
        "Scheme" => "scheme",
        "SCSS" => "css",
        "Shell" => "shell",
        "Sieve" => "sieve",
        "Slim" => "slim",
        "Smalltalk" => "smalltalk",
        "Smarty" => "smarty",
        "Solr" => "solr",
        "SML" => "mllike",
        "Soy" => "soy",
        "SPARQL" => "sparql",
        "Spreadsheet" => "spreadsheet",
        "SQL" => "sql",
        "SQLite" => "sql",
        "Squirrel" => "clike",
        "Stylus" => "stylus",
        "Swift" => "swift",
        "sTeX" => "stex",
        "LaTeX" => "stex",
        "SystemVerilog" => "verilog",
        "Tcl" => "tcl",
        "Textile" => "textile",
        "TiddlyWiki" => "tiddlywiki",
        "Tiki" => "tiki",
        "TOML" => "toml",
        "Tornado" => "tornado",
        "troff" => "troff",
        "TTCN" => "ttcn",
        "TTCN_CFG" => "ttcn",
        "Turtle" => "turtle",
        "TypeScript" => "javascript",
        "TypeScript" => "jsx",
        "Twig" => "twig",
        "Web" => "webidl",
        "VB.NET" => "vb",
        "VBScript" => "vbscript",
        "Velocity" => "velocity",
        "Verilog" => "verilog",
        "VHDL" => "vhdl",
        "Vue.js" => "vue",
        "XML" => "xml",
        "XQuery" => "xquery",
        "Yacas" => "yacas",
        "YAML" => "yaml",
        "Z80" => "z80",
    );
}
