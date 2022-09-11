<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{asset('images/logo.svg')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{asset('images/logo.svg')}}">
                        <span class="text-white text-lg ml-3"> P<span class="font-medium text-orange-400">AE</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('images/illustration.svg')}}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Smart tracking 
                        </div>
                        <div class="-intro-x text-lg text-white text-opacity-70 dark:text-gray-500">PT Pintu Air Ekspress</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Silahkan Login
                        </h2>

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible show flex items-center mt-3 mb-0" role="alert"> 
                                {{ session('loginError') }}
                                
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button>
                            </div> 
                        @endif

                        <form action="/login" method="post">
                            @csrf
                            
                            <div class="intro-x mt-8">
                                <input type="text" name="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block @error('email') is-invalid @enderror" id="email" placeholder="Email" autocomplete="off" autofocus required value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" id="password" placeholder="Password" required>
                            </div>
                            
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <a href="dashboard">
                                    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                                </a>
                            </div>
                        </form>
                       
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
       
        <!-- BEGIN: JS Assets-->
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>