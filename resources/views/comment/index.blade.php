<x-layout :title="$title">
    <h2>comments</h2>
    @foreach ($comments as $comment)
    <h3>{{ $comment->author }}</h3>
    <p>{{ $comment->content }}</p>
    <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
    </div>
    @endforeach
    </div>
</x-layout>