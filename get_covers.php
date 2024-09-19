<?php
header('Content-Type: application/json');

$directory = 'covers/';

// Get all files in the directory
$files = array_diff(scandir($directory), array('..', '.'));

// Filetype filter
$imageFiles = array_filter($files, function($file) {
    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
});

// Check if there are no images in the covers directory
if (count($imageFiles) === 0) {
    // If no images found, include no-cover.png from the root directory
    $imageFiles[] = '../no-cover.png';
}

// Return the list of image files as JSON
echo json_encode(array_values($imageFiles));
?>
