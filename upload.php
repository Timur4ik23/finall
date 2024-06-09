<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $audio = $_FILES['fileToUpload'];

    if ($audio['error'] == UPLOAD_ERR_OK) {
        $audioFileName = 'uploads/' . basename($audio['name']);
        if (move_uploaded_file($audio['tmp_name'], $audioFileName)) {

            include 'confirmation.php';

        } else {
            echo "Failed to upload audio file.";
        }
    } else {
        echo "Audio file error.";
    }
} else {
    echo "Invalid request method.";
}
?>