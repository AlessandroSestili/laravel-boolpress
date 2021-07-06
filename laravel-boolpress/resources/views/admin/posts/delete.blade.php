<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{ route("admin.posts.delete" ,  $post ->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <label for="title">Title: </label>
        <input type="text" name="title" id="title" value="{{ $post->title }}">

        <label for="content">Content: </label>
        <input type="text" name="content" id="content" value="{{ $post->content }}">

        <label for="slug">Slug: </label>
        <input type="text" name="slug" id="slug" value="{{ $post->slug }}">

        <input type="submit" value="Elimina">
    </form>
</body>
</html>