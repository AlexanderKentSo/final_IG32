<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Industrial Games</title>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col gap-y-4 justify-center items-center h-[100dvh]">
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
