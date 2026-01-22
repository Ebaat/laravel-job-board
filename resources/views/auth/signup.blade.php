<x-layout title="Sign Up">

    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <a href="/">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Eb3at Logo" class="mx-auto size-12 mb-6" />
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Create a New Account ✨</h2>
            </a>
            {{-- Show validation errors --}}
            @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc ms-4">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- ✅ Note: We’re using a direct URL since there’s no route name --}}
            <form action="/signup" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

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

                <div>
                    <label class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 px-4 rounded-md shadow">
                    Sign Up
                </button>

                <p class="text-center text-sm text-gray-600 mt-3">
                    Already have an account?
                    <a href="/login" class="text-indigo-600 hover:underline">Log in</a>
                </p>
            </form>
        </div>
    </div>

</x-layout>