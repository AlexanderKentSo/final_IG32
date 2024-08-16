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
    <style>
        .tab {
            transition: background-color 0.2s ease-in-out !important;
        }
    </style>
</head>
<body>
{{--  Form Logout  --}}
<form action="{{ route('logout') }}" id="formLogout" method="POST" class="bg-none">
    @csrf
</form>
{{--  Navbar  --}}
<div class="navbar bg-secondary px-5">
    <div class="flex-1">
        <a class="btn btn-ghost text-2xl text-body">Minigame</a>
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
    <h1 class="text-5xl text-center text-header text-neutral-content tracking-widest">Crossword</h1>

    {{--  Board Content  --}}
    <div class="px-20 mt-4">
        {{--    Board Choices    --}}
        <div role="tablist" class="tabs tabs-boxed gap-x-4">
            <a role="tab" class="tab tab-active hover:bg-primary/30 text-body" id="board1">Board 1</a>
            <a role="tab" class="tab hover:bg-primary/30 text-body" id="board2">Board 2</a>
        </div>

        {{--    Board Content    --}}
        <div class="mt-8">
            sadsad
        </div>
    </div>
</div>
<script>
    $(".tab").click(function () {
        $(".tab").removeClass("tab-active");
        $(this).addClass("tab-active");
    })
</script>
</body>
</html>
