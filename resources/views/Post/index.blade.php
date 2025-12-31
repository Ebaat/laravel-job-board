<x-layout :title="$title">
    <h2>Blog</h2>
    @foreach ($posts as $post)
    <div class="blog-post">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Author: {{ $post->author }}</p>
        @foreach ($post->comments as $comment)
        <li>{{ $comment->content }} - <i>{{ $comment->author }}</i></li>

        @endforeach

    </div>
    @endforeach
    </div>
    {{ $posts->links() }}
</x-layout>