<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Cloudinary</title>
</head>
<body>
    <h1>Upload To Cloudinary in DB <a href="/">Retour</a></h1>
    <form action="{{route('uploadpost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="monImages[]" multiple />
        <input type="submit" value="Uploader" />
    </form>
    <hr />

</body>
</html>