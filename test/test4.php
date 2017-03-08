<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <link href="js/jquery-ui.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <script>
            $(function () {
                var availableTags = [];
                availableTags.push(
                    "ActionScript",
                    "AppleScript",
                    "Asp",
                    "BASIC",
                    "C",
                    "C++",
                    "Clojure",
                    "COBOL",
                    "ColdFusion",
                    "Erlang",
                    "Fortran",
                    "Groovy",
                    "Haskell",
                    "Java",
                    "JavaScript",
                    "Lisp",
                    "Perl",
                    "PHP",
                    "Python",
                    "Ruby",
                    "Scala",
                    "Scheme");
                $("#tags").autocomplete({
                    source: availableTags
                });
            });
        </script>
        HELLO!!!::::
        <div class="ui-widget">
            <label for="tags">Tags: </label>
            <input id="tags">
        </div>
    </body>
</html>
