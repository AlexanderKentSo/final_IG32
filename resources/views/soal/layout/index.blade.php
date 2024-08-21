<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle ?? "Dashboard | Industrial Games" }}</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <script src="{{ asset('js') }}/tinymce/tinymce.min.js"></script>

    @yield('cdn')
    @vite('resources/css/app.css')
    <style>
        *::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        *::-webkit-scrollbar-track {
            /*box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);*/
            background-color: oklch(var(--b2));
            /*background-color: #f8fafc;*/
            width: 1px;
        }

        *::-webkit-scrollbar-thumb {
            background-color: oklch(var(--p));
            /*background-color: #1e293b;*/
            outline: 1px solid slategrey;
            border-radius: 0.8rem;
        }

        .pace .pace-progress {
            background-color: oklch(var(--p)) !important;
            height: 0.25rem !important;
        }
    </style>
    @yield('styles')
</head>
<body>
{{--  Form Logout  --}}
<form action="{{ route('logout') }}" id="formLogout" method="POST" class="bg-none">
    @csrf
</form>
{{--  Navbar  --}}
<div class="navbar bg-secondary px-5">
    <div class="flex-1">
        <a class="btn btn-ghost text-2xl text-body">{{ $navTitle ?? "Dashboard" }}</a>
    </div>
    <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="{{ asset('images/logo.svg') }}"
                    />
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-300 rounded-md z-[1] mt-3 w-52 p-2 shadow font-semibold">
                <li>
                    <a onclick="event.preventDefault(); document.getElementById('formLogout').submit();">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{--  Content  --}}
<div class="py-6 px-8 text-body-normal">
    @yield('content')
</div>


@yield('scripts')
</body>
</html>
