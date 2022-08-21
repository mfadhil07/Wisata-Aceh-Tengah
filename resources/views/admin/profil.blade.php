<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Profile</title>
</head>

<body>
    <div class="flex">
        <h1 class="mt-6 ml-10 font-bold text-xl">Profile Admin</h1>
    </div>
    <div class="mx-8 mt-2 w-1/2">
        <a class="relative block p-8 overflow-hidden border border-gray-500 rounded-lg" href="">
            <span
                class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

            <div class="justify-between sm:flex">
                <div>
                    <h5 class="text-lg font-bold text-gray-900">
                        Nama Admin
                    </h5>
                    <h5 class="mt-2 text-2sm ">Username : </h5>
                    <h5 class="mt-2 text-2sm ">Email : </h5>
                    <h5 class="mt-2 text-2sm"> Deskripsi</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, necessitatibus.</p>
                </div>
                <div class="flex-shrink-0 hidden ml-3 sm:block">
                    <img class="object-cover w-24 h-24 rounded-lg shadow-sm"
                        src="https://www.hyperui.dev/photos/man-5.jpeg" alt="" />

                </div>
            </div>
            <div class="mt-4 sm:pr-8">

            </div>
        </a>
    </div>

    {{-- <div class="flex justify-center">
        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
            <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="" />
            <div class="p-6 flex flex-col justify-start">
                <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                <p class="text-gray-700 text-base mb-4">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This
                    content is a little bit longer.
                </p>
                <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
            </div>
        </div>
    </div> --}}
</body>

</html>
