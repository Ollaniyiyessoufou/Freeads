<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
  <title>Sign up</title>

</head>

<body>
  <div class="flex min-h-full flex-col justify-center px-6 py-4 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto w-28" src="{{asset('image/logo.png')}}" alt="Freeads">
      <!-- <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2> -->
    </div>
    @if (session()->has('delete'))
    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
      </svg>
      <p>{{ session()->get('delete') }}</p>
    </div>
    @endif

    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
        @if (session()->has('success'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif

      <form class="space-y-2" action="/" method="POST">
        @csrf
        <div>
          <label for="login" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="login" name="login" type="text" value="{{ old('login') }}" required placeholder="Thomas" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('login')

            <div class="text-red-400"> {{ $message }} </div>
            @enderror
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="thomas@gmail.com" autocomplete="email" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('email')

            <div class="text-red-400"> {{ $message }} </div>
            @enderror
          </div>
        </div>
        <div>
          <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone number</label>
          <div class="mt-2">
            <input id="phone_number" name="phone_number" type="tel" value="{{ old('phone_number') }}" placeholder="+229 66666666" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('phone_number')
            <div class="text-red-400"> {{ $message }} </div>
            @enderror
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" placeholder="Must contain : 8 char., upper., lower., number, special char." autocomplete="current-password" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('password')
            <div class="text-red-400"> {{ $message }} </div>
            @enderror
          </div>



        <div>
          <div class="flex items-center justify-between ">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password_confirmation" type="password" placeholder="Re-enter the password" autocomplete="current-password" required class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

        <div class="mt-4" >
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</button>
        </div>
      </form>


      <p class="mt-5 text-center text-sm text-gray-500">
        Already a member?
        <a href="/connect" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign-in here</a>
      </p>
    </div>
  </div>
</body>

</html>
