<x-layout :title="$title">

    <form method="post" action="/blog" class="space-y-8 divide-y divide-gray-200">
        @csrf
        <div class="space-y-12">

            {{-- SECTION 1 --}}
            <div class="border-b border-gray-200 pb-12">
                <h2 class="text-lg font-semibold text-gray-900">Create new post</h2>
                <p class="mt-1 text-sm text-gray-600">
                    Use this form to create a new post.
                </p>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input id="title" type="text" value="{{ old('title') }}" name="title" autocomplete="given-name"
                                class="{{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }} block w-full rounded-md bg-white px-3 py-2 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        @error('title')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm font-medium text-gray-900">Author</label>
                        <div class="mt-2">
                            <input id="author" type="text" value="{{ old('author') }}" name="author" autocomplete="family-name"
                                class="{{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }} block w-full rounded-md bg-white px-3 py-2 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        @error('author')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="{{ $errors->has('body') ? 'border-red-500' : 'border-gray-300' }} block w-full rounded-md bg-white px-3 py-2 text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('body') }}</textarea>
                        </div>
                        <p class="mt-3 text-sm text-gray-600">Write a few sentences about your product.</p>
                        @error('body')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-full">

                        <div class="flex gap-3">
                            <input id="published" type="checkbox" name="published" checked
                                class="mt-1 size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                            <div class="text-sm">
                                <label for="published" class="font-medium text-gray-900">Is Published</label>
                                <p class="text-gray-600">Do you want to post or save as draft.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SECTION 2 --}}


            {{-- SECTION 3 --}}

        </div>

        <div class="mt-8 flex items-center justify-end gap-x-4">
            <a href="/blog" class="text-sm font-semibold text-gray-700 hover:text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
</x-layout>
```