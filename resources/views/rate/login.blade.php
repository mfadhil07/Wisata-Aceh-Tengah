<!DOCTYPE html>
<html data-theme="white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title> {{ $title }}</title>
</head>

<body class="font-mono bg-white-400">
    <!-- Container -->
    <div class="h-screen flex">
        <div class="flex w-1/2 bg-gradient-to-tr from-green-600 to-green-900 i justify-around items-center">
            <div>
                <h1 class="text-white font-bold text-6xl font-sans">WEBGIS</h1>
                <p class="text-white mt-1">Website Objek Wisata Aceh Tengah</p>
            </div>
        </div>
        <div class="flex w-1/2 justify-center items-center bg-white  mx-auto">

            <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="/rating/login">
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="bg-red-100 border flex flex-col justify-center border-red-400 text-red-600 px-6 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('loginError') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                @endif
                <h1 class="text-gray-800 font-bold text-3xl mb-1">Login...!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>

                @csrf
                <div class="mb-4 text-black">
                    <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <input class="pl-2 outline-none border-none" id="name" type="text" name="name"
                            placeholder="Name" />
                    </div>
                    @error('name')
                        <div class="flex bg-gray-100 rounded-lg mb-4 text-sm text-red-700" role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <span class="font-sm">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="mb-4 text-black">
                    <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <input class="pl-2 outline-none border-none" id="password" type="password" name="password"
                            placeholder="Password" />
                    </div>
                    @error('password')
                        <div class="flex bg-gray-100 rounded-lg mb-4 text-sm text-red-700" role="alert">
                            <div>
                                <span class="font-sm">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="mb-6 text-center">
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
