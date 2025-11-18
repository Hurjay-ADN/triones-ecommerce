@extends('layouts.layout')

@section('title')
    Registration Page
@endsection

@section('main-content')
    <section>
        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('auth.store') }}" class="border rounded border-gray-300 w-full lg:w-4/12 p-3"
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
                        class="block my-3 w-full rounded py-1 px-3 bg-blue-600 text-white cursor-pointer">Register</button>
                    <div class="flex justify-center">
                        <span class="text-sm inline-block">Have an account? <a href="{{ route('login') }}"
                                class="hover:text-blue-600 text-blue-400">Login here</a> </span>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
