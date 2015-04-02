<?php
// JQuery File Upload Plugin v1.6.2 by RonnieSan - (C)2009 Ronnie Garcia
// Sample by Travis Nickels

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/';
//	$newFileName = $_GET['name'].'_'.(($_GET['location'] != '')?$_GET['location'].'_':'').$_FILES['Filedata']['name'];
	$newFileName = $_GET['name'].'_'.time()."-".rand(100,999).".".substr($_FILES['Filedata']['name'],(strlen($_FILES['Filedata']['name'])-3),3);
	$targetFile =  str_replace('//','/',$targetPath) . $newFileName;
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	// mkdir(str_replace('//','/',$targetPath), 0755, true);
	
	move_uploaded_file($tempFile,$targetFile);
}

if ($newFileName)
	echo $newFileName;
else // Required to trigger onComplete function on Mac OSX
	echo '1';

?>