<x-layout :title="$title">

    {{-- ✅ رسالة النجاح --}}
    @if (session('success'))
    <div class="inline-flex w-fit max-w-max items-center gap-2 
                bg-green-100 border border-green-400 text-green-700 
                px-4 py-2 rounded mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- زرار إنشاء بوست جديد --}}
    <div class="mt-8 flex items-center justify-end gap-x-4">
        <a href="/blog/create"
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Create
        </a>
    </div>

    {{-- قائمة البوستات --}}
    <div class="mt-6 space-y-6">
        @foreach ($posts as $post)
        <div class="blog-post border rounded-lg p-4 bg-white shadow-sm">
            <h2 class="text-xl font-semibold"><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p class="text-sm text-gray-600 mt-1">Author: {{ $post->author }}</p>

            {{-- التعليقات --}}
            @if ($post->comments->count())
            <ul class="list-disc ms-6 mt-3 space-y-1">
                @foreach ($post->comments as $comment)
                <li>{{ $comment->content }} - <i>{{ $comment->author }}</i></li>
                @endforeach
            </ul>
            @endif

            {{-- الأزرار --}}
            <div class="mt-4 flex gap-2">
                {{-- تعديل --}}
                <a href="/blog/{{ $post->id }}/edit"
                    class="rounded-md bg-yellow-600 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                    Edit
                </a>

                {{-- حذف مع بوب اب شيك --}}
                <div x-data="{ open: false }" class="relative inline-block">
                    <!-- زرار الحذف -->
                    <button
                        @click="open = true"
                        class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500">
                        Delete
                    </button>

                    <!-- البوب اب -->
                    <div
                        x-show="open"
                        x-transition
                        @click.away="open = false"
                        class="absolute z-50 mt-2 w-64 rounded-lg bg-white p-4 shadow-lg border border-gray-200">
                        <p class="text-gray-800 text-sm mb-4">هل أنت متأكد إنك عايز تحذف البوست ده؟</p>
                        <div class="flex justify-end gap-2">
                            <button
                                @click="open = false"
                                class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">
                                إلغاء
                            </button>

                            <form action="/blog/{{ $post->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="px-3 py-1 rounded-md bg-red-600 text-white hover:bg-red-500">
                                    حذف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- روابط الصفحات --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    {{-- ✅ سكريبت Alpine.js عشان البوب اب يشتغل --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</x-layout>