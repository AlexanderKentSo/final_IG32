<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Industrial Games</title>
    <link rel="shortcut icon" href="{{ asset('images') }}/logo.png">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    @vite('resources/css/app.css')
    <style>
        .pace .pace-progress {
            background-color: oklch(var(--p)) !important;
            height: 0.25rem !important;
        }
    </style>
</head>
<body>
    <div class="flex flex-col gap-y-4 justify-center items-center h-[100dvh]">
        <h1 class="text-5xl font-medium text-header text-neutral-content">Final Industrial Games</h1>
        <div class="card card-side bg-base-200 shadow-xl rounded-md max-w-5xl text-body text-black">
            <div class="grid grid-cols-3">
                <div
                    class="flex p-10 justify-center items-center bg-base-300 rounded-bl-md rounded-tl-md col-span-1"
                >
                    <img
                        src="{{ asset('images') }}/maskot.svg"
                        class="w-[100%]"
                        alt="Movie" />
                </div>
                <form class="card-body col-span-2" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="card-title">Login</h2>
                    @if(session()->has('gagal'))
                        <div role="alert" class="alert alert-error rounded-md">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 shrink-0 stroke-current"
                                fill="none"
                                viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session()->get('gagal') }}</span>
                        </div>
                    @endif
                    <label class="form-control w-full max-w-md">
                        <div class="label">
                            <span class="label-text">Username</span>
                        </div>
                        <input
                            type="text"
                            placeholder="username"
                            class="input input-bordered rounded-md w-full"
                            name="username"
                        />
                    </label>
                    <label class="form-control w-full max-w-md">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input
                            type="password"
                            placeholder="password"
                            class="input input-bordered rounded-md w-full"
                            name="password"
                            id="password"
                        />
                        <div class="label">
                            <span class="label-text-alt flex gap-x-2" style="font-size: 0.9rem;">
                                <input type="checkbox" class="checkbox checkbox-xs rounded [--chkbg:oklch(var(--in))] transition-all" id="cbShowPassword">
                                <label for="cbShowPassword">Show Password</label>
                            </span>
                        </div>
                    </label>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary rounded px-10">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#cbShowPassword").click(function () {
            if ($("#password").attr('type') == "password") {
                $("#password").attr("type", 'text');
            } else {
                $("#password").attr("type", 'password');
            }
        })
    </script>
</body>
</html>
