<x-layout :title="$title">

    {{-- عرض كل أخطاء الـ validation فوق الفورم --}}
    @if ($errors->any())
    <div class="mb-4 p-3 border border-red-400 bg-red-100 text-red-700 rounded">
        <ul class="list-disc ms-6">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/blog/{{ $post->id }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="space-y-12">

            <div class="border-b border-gray-200 pb-12">
                <h2 class="text-lg font-semibold text-gray-900">Edit a post</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Post ID: <span class="font-semibold">{{ $post->id }}</span>
                </p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label class="block text-sm font-medium">Title</label>
                        <input type="text" name="title"
                            value="{{ old('title', $post->title) }}"
                            class="block w-full rounded-md border px-3 py-2 {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}">
                        @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label class="block text-sm font-medium">Author</label>
                        <input type="text" name="author"
                            value="{{ old('author', $post->author) }}"
                            class="block w-full rounded-md border px-3 py-2 {{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }}">
                        @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium">Content</label>
                        <textarea name="body" rows="4"
                            class="block w-full rounded-md border px-3 py-2 {{ $errors->has('body') ? 'border-red-500' : 'border-gray-300' }}">{{ old('body', $post->body) }}</textarea>
                        @error('body')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="published"
                                {{ old('published') || (!old() && $post->published) ? 'checked' : '' }}>
                            <span>Is Published</span>
                        </label>
                    </div>

                </div>
            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="/blog">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>

        </div>
    </form>

</x-layout>