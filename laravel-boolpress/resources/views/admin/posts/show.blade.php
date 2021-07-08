
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="{{ route("admin.posts.edit" , $post->id) }}">
    Modifica Post
</a>
<br>
{{-- <a href="{{ route("admin.posts.delete" , $post->id) }}">
    Elimina Post
</a> --}}

<form action="{{ route("admin.posts.destroy" , $post->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <input type="submit" value="Elimina">
</form>

<ul>
    <li>ID: {{$post->id}}</li>
    <li>Title: {{$post->title}}</li>
    <li>Content: {{$post->content}}</li>
    <li>Slug: {{$post->slug}}</li>
    <li>Utente: {{$post->user->name}} ({{$post->user->email}})</li>


</ul>

</body>
</html>