@extends('../themes/base')

@section('head')
    <title>Login - SAITAMA</title>
@endsection

@section('content')
    <div @class([
        'p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <a class="-intro-x flex items-center pt-5" href="">
                        <img class="w-6" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="SAITAMA" />
                        <span class="ml-3 text-lg text-white"> SAITAMA </span>
                    </a>
                    <div class="my-auto">
                        <img class="-intro-x -mt-16 w-1/2" src="{{ Vite::asset('resources/images/illustration.svg') }}"
                            alt="SAITAMA" />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            SAITAMA
                        </div>
                        <div class="-intro-x mt-1 text-3xl font-medium leading-tight text-white">
                            Sistem Aplikasi IT Asset Management
                        </div>
                        <div class="-intro-x mt-2 text-lg text-white text-opacity-70 dark:text-slate-400">
                            Integrasi dan Kolaborasi untuk Pengelolaan Aset TI <br> yang Lebih Efisien
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                            Log In
                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                            SAITAMA <br />
                            Sistem Aplikasi IT Asset Management
                            Integrasi dan Kolaborasi untuk Pengelolaan Aset TI yang Lebih Efisien.
                        </div>
                        <!-- BEGIN: Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="intro-x mt-8">
                                <x-base.form-input class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px]"
                                    type="text" placeholder="Username" name="username" />
                                <x-base.form-input class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]"
                                    type="password" placeholder="Password" name="password" />
                            </div>
                            {{-- <div class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                <div class="mr-auto flex items-center">
                                    <x-base.form-check.input class="mr-2 border" id="remember-me" type="checkbox" />
                                    <label class="cursor-pointer select-none" for="remember-me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="">Forgot Password?</a>
                            </div> --}}
                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button type="submit" class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    variant="primary">
                                    Login
                                </x-base.button>
                                {{-- <a href="/register" target="_blank">
                                    <x-base.button type="button" class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32"
                                        variant="outline-secondary">
                                        Register
                                    </x-base.button>
                                </a> --}}
                            </div>
                        </form>
                        <!-- END: Login Form -->

                        {{-- <div class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-left">
                            By signin up, you agree to our
                            <a class="text-primary dark:text-slate-200" href="">
                                Terms and Conditions
                            </a>
                            &
                            <a class="text-primary dark:text-slate-200" href="">
                                Privacy Policy
                            </a>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
