<x-layout :title="$title">
    <h2>Tag: {{ $tag->title }}</h2>

    <h3>Realted Posts</h3>
    @forelse ($tag->posts as $post)
    <div class="blog-post">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        <p>Author: {{ $post->author }}</p>
        <a href="/blog/{{ $post->id }}">Read more</a>
    </div>
    @empty
    <p>No posts found for this tag.</p>
    @endforlse
</x-layout>