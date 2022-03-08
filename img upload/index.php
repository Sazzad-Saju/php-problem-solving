<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="myImg">
        <button type="submit" name="submit">UPLOAD</button>
    </form>
</body>
</html>