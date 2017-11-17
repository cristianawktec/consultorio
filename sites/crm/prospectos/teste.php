<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>jQuery UI Autocomplete - Default functionality</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />

 
<script>
$(function() {
var availableTags = [
"Palhoça",
"São José",
"Florianópolis",
"Porto Alegre",
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
"Scheme"
];
$( "#tags" ).autocomplete({
source: availableTags
});
});
</script>
</head>
<body>
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags" />
</div>
</body>
</html>