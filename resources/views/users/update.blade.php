<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href={{ asset('css/ads.css') }}> -->
    <!-- <link rel="stylesheet" href={{ asset('css/style.css') }}> -->
    <title>Document</title>
</head>

<body>

    <body class="bg-gray-300 antialiased">
        <div class="container mx-auto mb-5 mt-20 py-2">
            <div>

                <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
                    <div class="flex justify-center">
                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
                    </div>

                    <div class="mt-16">
                        <h1 class="font-bold text-center text-3xl text-gray-900">
                            {{ $user->login }}
                        </h1>
                        <div class="my-5 px-6">
                            <a href="{{ route('logout') }}" class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white"><span class="font-bold"></span>Please ensure all information is correct before saving changes.</a>
                        </div>
                        <!-- <div class="flex justify-between items-center my-5 px-6">
                            <a href="" class="text-white hover:text-gray-900 hover:bg-gray-100 bg-blue-400 rounded transition duration-150 ease-in font-medium text-sm text-center w-1/6 py-3">Edit</a>
                            <a href="" class="text-white hover:text-gray-900 hover:bg-gray-100 bg-red-600 rounded transition duration-150 ease-in font-medium text-sm text-center w-1/6 py-3">Delete</a>
                        </div> -->

                        <div class="w-full">
                            @if (session()->has('fail'))
                            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                </svg>
                                <p>{{ session()->get('fail') }}</p>
                            </div>
                            @endif
                            <form action="/update_profile" method="POST">
                                @csrf
                                <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                                    <div href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        <label for="">Username</label>
                                        <input class="ml-20 p-4 form-control text-s border-2 border-blue-200 h-8 rounded-lg " id="login" name="login" type="text" placeholder="Enter your first name" value="{{ $user->login }}">
                                        @error('login')
                                        <div class="text-red-400"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        <label for="">Email</label>
                                        <input class="ml-[18%] p-4 form-control text-s border-2 border-blue-200 h-8 rounded-lg " id="email" name="email" type="text" placeholder="Enter your first name" value="{{ $user->email }}" disabled>
                                    </div>


                                    <div href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        <label for="">Phone number</label>
                                        <input class="ml-[8%] p-4 form-control text-s border-2 border-blue-200 h-8 rounded-lg " name="phone_number" id="phone_number" type="text" placeholder="Enter your first name" value="{{ $user->phone_number }}">
                                        @error('phone_number')
                                        <div class="text-red-400"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        <label for="">Old password</label>
                                        <input class="ml-[9%] p-4 form-control text-s border-2 border-blue-200 h-8 rounded-lg " name="old_password" id="old_password" type="password" placeholder="Enter your old password">
                                        @error('old_password')
                                        <div class="text-red-400"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                        <label for="">New password</label>
                                        <input class="ml-[8%] p-4 form-control text-s border-2 border-blue-200 h-8 rounded-lg " name="new_password" id="new_password" type="password" placeholder="Enter your new password">
                                        @error('new_password')
                                        <div class="text-red-400"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 my-2">Save changes</button>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </body>

</html>
</body>

</html>
