<?php
// Allow CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Folder to scan
$folder = 'images';

// Build the base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$baseUrl = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';

// Get all image files
$files = scandir($folder);
$imageFiles = array_filter($files, function($file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
});

// Create URLs
$imageUrls = array_map(function($file) use ($folder, $baseUrl) {
    return $baseUrl . $folder . '/' . rawurlencode($file);
}, $imageFiles);

// Return JSON
echo json_encode(array_values($imageUrls));
