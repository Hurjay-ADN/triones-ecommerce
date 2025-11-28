<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Register</title>
    </head>

    <body class="bg-linear-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c]">
        <div class="flex justify-center items-center min-h-screen px-4">
            <form action="{{ route('auth.store') }}" method="POST"
                class="border bg-[#142536] flex flex-col gap-5 rounded-lg text-gray-200 w-full max-w-sm p-6">
                @csrf
                <div>
                    <h2 class="text-2xl mb-4 font-semibold text-center">Register</h2>
                </div>

                <div>
                    <label for="username" class="block mb-1">Username</label>
                    <input type="text" name="username" class="border border-gray-300 px-3 py-2 w-full rounded" />
                    @error('username')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block mb-1">Email</label>
                    <input type="email" name="email" class="border border-gray-300 px-3 py-2 w-full rounded" />
                    @error('email')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block mb-1">Password</label>
                    <input type="password" name="password" class="border border-gray-300 px-3 py-2 w-full rounded" />
                    @error('password')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <button class="block w-full rounded py-2 px-3 bg-[#f54c00] text-white cursor-pointer">
                        Register
                    </button>
                    <div class="flex justify-center mt-3">
                        <span class="text-sm inline-block">
                            Have an account?
                            <a href="{{ route('login') }}" class="hover:text-[#006328] text-[#01be4e]">
                                Login here
                            </a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>
