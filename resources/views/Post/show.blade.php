<x-layout :title="$title">
    <h2>Blog</h2>
    @foreach ($posts as $post)
    <div class="blog-post">
        <h3>{{ $post->title }}</h3>

        <p>{{ $post->body }}</p>
        <p>Author: {{ $post->author }}</p>
    </div>
    @endforeach
</x-layout>