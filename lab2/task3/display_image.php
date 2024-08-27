<?php
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $imagePath = getenv('HOME') . '/code/httpd/uploads/' . $filename;

    // Check if the file exists
    if (file_exists($imagePath)) {
        $mimeType = mime_content_type($imagePath);

        header('Content-Type: ' . $mimeType);

        readfile($imagePath);
        exit;
    }
}

http_response_code(404);
echo 'Image not found';
?>

