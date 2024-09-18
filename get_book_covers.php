<?php
header('Content-Type: application/json');

$directory = 'covers/';

// Get all files in the directory
// Exclude . and ..
$files = array_diff(scandir($directory), array('..', '.'));

// Filetype filter
$imageFiles = array_filter($files, function($file) {
    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});

// Return the list of image files as JSON
echo json_encode(array_values($imageFiles));
?>
