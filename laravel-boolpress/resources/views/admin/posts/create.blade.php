
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <label for="title">Title: </label>
        <input type="text" name="title" id="title">

        <label for="content">Content: </label>
        <input type="text" name="content" id="content">

        <label for="slug">Slug: </label>
        <input type="text" name="slug" id="slug">

        <input type="submit" value="Invia">
    </form>
</body>
</html>