<?php

require_once 'includes/utilities.inc.php';

if (!$user->canCreatePage()) {
	header('Location:index.php');
	exit;	
}

require_once 'vendor/autoload.php';
$form = new HTML_QuickForm('addPageForm', 'post');

$form->addElement('text', 'title', 'Page Title');
$form->applyFilter('text', 'strip_tags');
$form->addRule('title', 'Please enter a page title.', 'required');

$form->addElement('textarea', 'content', ' Page Content');
$form->applyFilter('textarea', 'trim');
$form->addRule('content', 'Please enter the page content.', 'required');

$form->addElement('submit', 'submit', 'Add This Page');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($form->validate()) {
		$q = 'INSERT INTO pages (creatorId, title, content, dateAdded) VALUES (:creatorId, :title, :content, NOW())';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute([':creatorId' => $user->getId(), ':title' => $form->exportValue('title'), ':content' => $form->exportValue('content')]);	
		if ($r) {
			$form->freeze();
		}
	}
}

$pageTitle = 'Add a Page';
require_once 'includes/header.inc.php';
require_once 'views/add_page.html';
require_once 'includes/footer.inc.php';

