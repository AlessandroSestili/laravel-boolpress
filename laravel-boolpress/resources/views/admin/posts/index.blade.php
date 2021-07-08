@foreach($posts as $post)
               
    {{ $post->id }}
    <br>
    {{ $post->title }}
    <br>
    {{ $post->content }}
    <br>
    {{ $post->slug }}
    <br>
    {{ $post->category->name }}
    <br>
    <br>

@endforeach