<x-layout title="Login">

    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">

            <a href="/">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Eb3at Logo" class="mx-auto size-12 mb-6" />
            </a>
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Sign In 🔐</h2>

            {{-- ✅ Success message after signup --}}
            @if (session('success'))
            <div class="mb-4 text-green-600 text-sm">
                {{ session('success') }}
            </div>
            @endif

            {{-- ✅ Validation errors --}}
            @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc ms-4">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- ✅ No route names, so direct URL used --}}
            <form action="/login" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 px-4 rounded-md shadow">
                    Log In
                </button>

                <p class="text-center text-sm text-gray-600 mt-3">
                    Don’t have an account?
                    <a href="/signup" class="text-indigo-600 hover:underline">Create one</a>
                </p>
            </form>
        </div>
    </div>

</x-layout>