<x-layout :title="$title">
    <h2>Tags</h2>
    @foreach ($tags as $tag)
    <div class="blog-post">
        <h3>{{ $tag->title }}</h3>


        @endforeach


    </div>
</x-layout>