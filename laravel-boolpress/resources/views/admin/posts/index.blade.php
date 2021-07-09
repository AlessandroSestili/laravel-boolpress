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
    {{-- {{ $post->tag }} --}}
    @foreach($post->tags as $tag)
        {{$tag->name}}
    @endforeach
    <br>
    <br>

@endforeach
