
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
{{-- <a href="{{ route("comics.edit" , $comic->id) }}">
    Modifica Fumetto
</a>
<br>
<a href="{{ route("comics.delete" , $comic->id) }}">
    Elimina Fumetto
</a> --}}

<ul>
    <li>ID: {{$post->id}}</li>
    <li>Title: {{$post->title}}</li>
    <li>Content: {{$post->content}}</li>
    <li>Slug: {{$post->slug}}</li>
</ul>

</body>
</html>