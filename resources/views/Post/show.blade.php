<x-layout :title="$title">
    {{-- ✅ رسالة نجاح --}}
    @if (session('success'))
    <div class="inline-flex w-fit max-w-max items-center gap-2 
                bg-green-100 border border-green-400 text-green-700 
                px-4 py-2 rounded mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- ✅ تفاصيل البوست --}}
    <div class="blog-post border rounded-lg p-6 bg-white shadow-sm mb-6">
        <h3 class="text-2xl font-bold mb-2">{{ $post->title }}</h3>
        <p class="text-gray-700 mb-4">{{ $post->body }}</p>
        <p class="text-sm text-gray-500">Author: {{ $post->author }}</p>
    </div>

    {{-- ✅ فورم إضافة تعليق --}}
    <div class="border rounded-lg p-4 bg-gray-50 mb-6">
        <h4 class="font-semibold mb-3">أضف تعليق جديد 💬</h4>
        <form action="/comments" method="POST" class="space-y-4">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @csrf
            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="author" class="mt-1 w-full rounded-md border-gray-300" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Your Comment</label>
                <textarea name="content" rows="3" class="mt-1 w-full rounded-md border-gray-300" required></textarea>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-500">
                أضف التعليق
            </button>
        </form>
    </div>

    {{-- ✅ عرض التعليقات --}}
    @if ($post->comments->count())
    <div class="border rounded-lg p-4 bg-white shadow-sm">
        <h4 class="font-semibold mb-3">التعليقات:</h4>
        <ul class="space-y-2">
            @foreach ($post->comments as $comment)
            <li class="border rounded-md p-3 bg-gray-50">
                <p class="text-gray-800">{{ $comment->content }}</p>
                <p class="text-sm text-gray-500 mt-1">— {{ $comment->author }}</p>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <p class="text-gray-500">لا توجد تعليقات حتى الآن.</p>
    @endif
</x-layout>