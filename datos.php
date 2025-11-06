<?php
/**
 * datos.php - Reads articles from file and populates the $articulos array
 */

$articulos = array();

// Get the path to the articles file
$articlesFile = __DIR__ . '/articles.txt';

// Check if file exists
if (file_exists($articlesFile)) {
    // Read the file content
    $fileContent = file($articlesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Parse each line and create article array
    foreach ($fileContent as $line) {
        // Split the line by pipe delimiter
        $parts = explode('|', $line);
        
        // Check if we have all 4 fields
        if (count($parts) === 4) {
            $articulos[] = array(
                'id' => trim($parts[0]),
                'title' => trim($parts[1]),
                'category' => trim($parts[2]),
                'content' => trim($parts[3])
            );
        }
    }
} else {
    // If file doesn't exist, provide error message
    error_log("Articles file not found: " . $articlesFile);
}
?>
