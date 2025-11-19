<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Register</title>
    </head>

    <body class="bg-gradient-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c]">
        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('auth.store') }}"
                class="border bg-[#142536] flex flex-col gap-4  rounded  text-gray-200 w-full lg:w-3/12 p-5 "
                method="POST">
                @csrf
                <div>
                    <h2 class="text-xl mb-3 font-semibold">Register</h2>
                </div>
                <div>
                    <label for="username" class="block mb-1">Username</label>
                    <input type="text" name="username" class="border border-gray-300 px-3 py-1 w-full rounded" />
                    @error('username')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block mb-1">Email</label>
                    <input type="email" name="email" class="border border-gray-300 px-3 py-1 w-full rounded" />
                    @error('email')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block mb-1">Password</label>
                    <input type="password" name="password" class="border border-gray-300 px-3 py-1 w-full rounded" />
                    @error('password')
                        <span class="text-red-400 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <button
                        class="block my-3 w-full rounded py-1 px-3 bg-[#086234] text-white cursor-pointer">Register</button>
                    <div class="flex justify-center">
                        <span class="text-sm inline-block">Have an account? <a href="{{ route('login') }}"
                                class="hover:text-[#91401b] text-[#eb8252]">Login here</a> </span>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>
