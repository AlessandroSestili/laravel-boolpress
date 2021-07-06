@foreach($posts as $post)
               
    {{ $post->id }}
    <br>
    {{ $post->title }}
    <br>
    {{ $post->content }}
    <br>
    {{ $post->slug }}
    <br>
    <br>

@endforeach