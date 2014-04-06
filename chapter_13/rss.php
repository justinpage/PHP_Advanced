<?php

header('Content-type: text/xml');

echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title>Larry Ullman&apos;s Important Things</title>
<description>The most recent things Larry has been writing about</description>
<link>http://LarryUllman.com</link>
';

$data = [
	0 => ['title' => 'SSH Key Authentication', 'description'=> 'The wonderful hosting company that I use', 'link' => 'http://www.larryulman.com/2012/ssh', 'pubDate' => '1337930580'],
	1 => ['title' => 'FTP Key Authentication', 'description'=> 'The wonderful hosting company that I use', 'link' => 'http://www.larryulman.com/2012/ftp', 'pubDate' => '1337930580'],
	2 => ['title' => 'Live Key Authentication', 'description'=> 'The wonderful hosting company that I use', 'link' => 'http://www.larryulman.com/2012/ssh', 'pubDate' => '1337930580'],
];

foreach ($data as $item) {
	echo '<item>
	<title>' .htmlentities($item['title']) . '</title>
	<description>' . htmlentities($item['description']) . '...</description>
	<link>' . $item['link'] . '</link>
	<guid>' . $item['link'] . '</guid>
	<pubDate>' . date('r', $item['pubData']) . '</pubDate>
	</item>
	';
}

echo '</channel>
</rss>
';
