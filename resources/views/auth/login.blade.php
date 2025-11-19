<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        @vite('resources/css/app.css')
        <title>Login</title>
    </head>

    <body class="bg-gradient-to-br from-[#1f2937] via-[#2d3748] to-[#c2410c]">

        <div class="flex justify-center items-center h-dvh">
            <form action="{{ route('session.store') }}"
                class="border bg-[#142536] flex flex-col gap-4  rounded  text-gray-200 w-full lg:w-3/12 p-5 "
                method="POST">
                @csrf
                <div>
                    <h2 class="text-xl mb-3 font-semibold">Login</h2>
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
                        class="block my-3 w-full rounded py-1 px-3 bg-[#f54c00] text-white cursor-pointer">Login</button>
                    <div class="flex justify-center">
                        <span class="text-sm inline-block">Dont have an account? <a href="{{ route('register') }}"
                                class="hover:text-[#006328] text-[#01be4e]">Register here</a> </span>
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>
