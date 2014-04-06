<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>XML Expat Parser</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

function handle_open_element($p, $element, $attributes) {
	switch ($element) {
		case 'BOOK':
			echo "<div>";
			break;
		case 'CHAPTER':
			echo "<p>Chapter {$attributes['NUMBER']}: ";

		case 'COVER':
			$image = @getimagesize($attributes['FILENAME']);
			echo "<img src=\"{$attributes['FILENAME']}\" $image[3] border=\"0\"><br>";
			break;

		case 'TITLE':
			echo "<h2>";
			break;

		case 'YEAR':
		case 'AUTHOR':
		case 'PAGES':
			echo '<span class="label">' . $element . '</span>: ';
			break;
	}
}

function handle_close_element($p, $element) {
	switch ($element) {
		case 'BOOK':
			echo '</div>';
			break;
		
		case 'CHAPTER':
			echo '</p>';
			break;

		case 'TITLE':
			echo '</h2>';
			break;

		case 'YEAR':
		case 'AUTHOR':
		case 'PAGES':
			echo '<br>';
			break;
	}
}

function handle_character_data($p, $cdata) {
	echo $cdata;
}


$p = xml_parser_create();

// set the handling functions
xml_set_element_handler($p, 'handle_open_element', 'handle_close_element');
xml_set_character_data_handler($p, 'handle_character_data');

$file = 'book2.xml';
$fp = @fopen($file, 'r') or die("<p>Could not open a file called '$file'.</p></body></html>");
while ($data = fread($fp, 4096)) {
	xml_parse($p, $data, feof($fp));	
}

xml_parser_free($p);

?>
</body>
</html>
