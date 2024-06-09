
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>Upload an Audio</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <br>
        <br>
        <input name="email" type="email" required placeholder="Email">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>

    <script src="index.js"></script>
</body>
</html> 


