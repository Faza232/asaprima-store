<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @include('partials.links')
</head>
    <body class="font-poppins">
        <div class="lg:flex">
            <div class="lg:w-1/2 xl:max-w-screen-sm">
                <div class="py-12 bg-green-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div>
                            <svg class="w-10 text-green-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:currentColor;stroke-width:20;stroke-linecap:round;stroke-miterlimit:3;}
                                </style>
                                <g transform="matrix( 1, 0, 0, 1, 0,0) ">
                                <g>
                                <path id="Layer0_0_1_STROKES" class="st0" d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8"/>
                                </g>
                                </g>
                            </svg>
                        </div>
                        <div class="text-2xl text-green-800 tracking-wide ml-2 font-semibold">PT Asa Prima Niaga</div>
                    </div>
                </div>
                <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-4 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl text-green-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Register</h2>
                    <div class="mt-12">
                        <form action="{{ route('register.save') }}" method="POST" class="user">
                            @csrf
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Username</div>
                                <input name="username" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" type="text" placeholder="Enter your username">
                                @error('username')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror 
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                </div>
                                <input name="password" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" type="password" placeholder="Enter your password">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror 
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Confirm Password
                                    </div>
                                </div>
                                <input name="password2" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-green-500" type="password" placeholder="Enter your password again">
                                @error('password2')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror 
                            </div>
                            <div class="mt-10">
                                <button type="submit" class="bg-green-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-green-600
                                shadow-lg">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-green-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('img/auth.png');">
                </div>
            </div>
        </div>
      @include('partials.scripts')
      @yield('content-js')
  </body>
  </html>