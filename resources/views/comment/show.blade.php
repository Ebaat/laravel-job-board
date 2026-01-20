<x-layout :title="$title">
    <h2>Comment by {{ $comment->author }}</h2>
    <p>{{ $comment->content }}</p>

    @if ($comment->post)
    <h3>Related Post:</h3>
    <ul>
        <li>
            <strong>{{ $comment->post->title }}</strong>
            <p>{{ $comment->post->body }}</p>
            <p>Author: {{ $comment->post->author }}</p>
            <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
        </li>
    </ul>


    @else
    <p>No related post found.</p>
    @endif
    </div>
</x-layout>