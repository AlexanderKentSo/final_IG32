<!doctype html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Industrial Games</title>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('images') }}/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">

    @vite('resources/css/app.css')
    <style>
        :root {
            --square-height: 2.3rem;
            --square-width: 2.3rem;
            --square-padding: 0.5rem;
            --square-font-size: 1.2rem;
            --square-border-radius: 0.275em;
            --number-title-font-size: 0.6rem;
            --number-title-left: 0.3rem;
            --number-title-top: 0.25rem;
        }

        .pace .pace-progress {
            background-color: oklch(var(--p)) !important;
            height: 0.25rem !important;
        }

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

        .tab {
            transition: background-color 0.2s ease-in-out !important;
        }

        .select2-container.select2-container--default .select2-selection--multiple {
            height: 39px;
            --border-opacity: 1 !important;
            border-color: #e2e8f0 !important;
            border-color: rgba(226, 232, 240, var(--border-opacity)) !important;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice {
            height: 26px;
            display: flex;
            align-items: center;
            margin-top: 0;
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
            padding-right: 0.5rem;
            margin-right: 0.5rem;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice:first-child {
            margin-left: -0.25rem;
        }

        .select2-container.select2-container--default .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
            margin-left: 0.25rem;
            margin-right: 0.5rem;
        }

        .select2-container.select2-container--default .select2-search--dropdown .select2-search__field {
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container.select2-container--default .select2-results__option {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .select2-container.select2-container--default .select2-results__option--highlighted[aria-selected] {
            --bg-opacity: 1;
            background-color: #e2e8f0;
            color: #0f172a;
            font-weight: 500;
            /*background-color: #1C3FAA;*/
            /*background-color: rgba(28, 63, 170, var(--bg-opacity));*/
        }

        .select2-container--default .select2-results__option--selected {
            background-color: #cbd5e1 !important;
            color: #0f172a;
            font-weight: 500;
        }

        .select2-container .select2-selection.select2-selection--single {
            height: 39px;
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container .select2-selection .select2-selection__rendered {
            height: 100%;
            display: flex;
            align-items: center;
            padding-left: 0.75rem;
            padding-right: 2rem;
        }

        .select2-container .select2-selection .select2-selection__arrow {
            width: 32px;
            height: 100%;
        }

        .select2-container .select2-dropdown {
            --border-opacity: 1;
            border-color: #e2e8f0;
            border-color: rgba(226, 232, 240, var(--border-opacity));
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-weight: 600 !important;
        }

        .select2-search__field {
            background-color: oklch(var(--n));
            border-color: oklch(var(--ac));
        }

        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }


        .square {
            width: var(--square-width);
            height: var(--square-height);
            padding: var(--square-padding);
            display: inline-block;
            font-size: var(--square-font-size);
            text-align: center;
            border-radius: var(--square-border-radius);
            transition: all 0.2s linear;
            background-color: #fff;
        }

        .square:disabled {
            border: 1px solid rgba(0, 0, 0, 0.2);
            pointer-events:none;
        }

        .square:enabled {
            background-color: #F6E3C7;
            /*border: 1px solid rgba(0, 0, 0, 0.5);*/
            border: 1.5px solid #6B0001;
        }

        .square:focus {
            outline: none;
            /*border: 1.5px solid #2F3645;*/
            border: 1.5px solid #6B0001;
            /*filter: drop-shadow(0px 4px #2F3645);*/
            filter: drop-shadow(0px 4px #6B0001);
            transform: translateY(-4px);
        }

        .square:focus + .number-title {
            --number-title-top: 0.024rem;
        }

        td {
            position: relative;
        }

        .number-title {
            position: absolute;
            font-size: var(--number-title-font-size);
            left: var(--number-title-left);
            top: var(--number-title-top);
            z-index: 99;
            transition: all 0.2s ease-in-out;
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
        <div class="w-full max-w-xs">
            <label for="nomor-1-team" class="font-semibold">Select Team</label>
            <br />
            <select name="nomor-team" id="nomor-team" class="" style="width: 100%;">
                <option value="" disabled selected>--- Select Team ---</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
            <br />
            <p class="mt-2 text-body font-bold">Leftover: <span id="leftOver">-</span></p>
        </div>

        {{--    Board Choices    --}}
        <div role="tablist" class="tabs tabs-boxed gap-x-4 mt-5">
            <a role="tab" class="tab tab-active hover:bg-primary/30 text-body" id="board-1">Board 1</a>
            <a role="tab" class="tab  hover:bg-primary/30 text-body" id="board-2">Board 2</a>
        </div>

        {{--    Board Content    --}}
        <div class="mt-8 border border-primary border-4 rounded">
            {{--      Board 1      --}}
            <div class="board board-1 bg-base-300 p-4 shadow-xl">
                <div class="w-full">
                    <label for="nomor-1-question" class="font-semibold">Select Question</label>
                    <br />
                    <div class="flex justify-between">
                        <div class="flex gap-x-4 items-center w-1/6">
                            <select name="nomor-1-question" id="nomor-1-question" class="w-24" style="width: 100%;">
                                <option value="" selected disabled>-- Select Question --</option>
                                @foreach($questionBoard1 as $q)
                                    <option value="{{ $q->id }}">{{ $q->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button
                            class="btn btn-primary self-end rounded"
                            id="btnAnswer1"
                            onclick="answer(1)"
                        >
                            Answer
                        </button>
                    </div>
                    <button class="btn rounded" id="btn-question-1" onclick="modalQuestion1.showModal()" disabled>Show Question</button>
                </div>
                <br />
                <div class="flex justify-center pl-14 select-none">
                    <table>
                        @for($row = 1; $row <= $board1MaxRow; $row++)
                            <tr>
                                @for($col = 1; $col <= $board1MaxCol; $col++)
                                    @if(isset($letter1[$row][$col]))
                                        <td>
                                            <input
                                                type="text"
                                                class="square text-black"
                                                value="{{ ($letter1[$row][$col]['show']) ? strtoupper($letter1[$row][$col]['letter']) : "" }}"
                                                oninput="this.value = this.value.toUpperCase()"
                                                maxlength="1"
                                                row="{{ $row }}"
                                                col="{{ $col }}"
                                                board="1"
                                                show="{{ $letter1[$row][$col]['show'] }}"
                                                direction="{{ $letter1[$row][$col]['direction'] }}"
                                                disabled
                                            />
                                            @if(isset($letter1[$row][$col]['head_number']))
                                                <span class="number-title">{{ $letter1[$row][$col]['head_number'] }}</span>
                                            @endif
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>

            {{--      Board 2      --}}
            <div class="board board-2 bg-base-300 p-4 shadow-xl" style="display: none;">
                <div class="w-full">
                    <label for="nomor-2-question" class="font-semibold">Select Question</label>
                    <br />
                    <div class="flex justify-between">
                        <div class="flex gap-x-4 items-center w-1/6">
                            <select name="nomor-2-question" id="nomor-2-question" class="w-24" style="width: 100%;">
                                <option value="" selected disabled>-- Select Question --</option>
                                @foreach($questionBoard2 as $q)
                                    <option value="{{ $q->id }}">{{ $q->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button
                            class="btn btn-primary self-end rounded"
                            id="btnAnswer2"
                            onclick="answer(2)"
                        >
                            Answer
                        </button>
                    </div>
                    <button class="btn rounded" id="btn-question-2" onclick="modalQuestion1.showModal()" disabled>Show Question</button>
                </div>
                <br />
                <div class="flex justify-center pl-14 select-none">
                    <table>
                        @for($row = 1; $row <= $board2MaxRow; $row++)
                            <tr>
                                @for($col = 1; $col <= $board2MaxCol; $col++)
                                    @if(isset($letter2[$row][$col]))
                                        <td>
                                            <input
                                                type="text"
                                                class="square text-black"
                                                value="{{ ($letter2[$row][$col]['show']) ? strtoupper($letter2[$row][$col]['letter']) : "" }}"
                                                oninput="this.value = this.value.toUpperCase()"
                                                maxlength="1"
                                                row="{{ $row }}"
                                                col="{{ $col }}"
                                                board="2"
                                                show="{{ $letter2[$row][$col]['show'] }}"
                                                direction="{{ $letter2[$row][$col]['direction'] }}"
                                                disabled
                                            />
                                            @if(isset($letter2[$row][$col]['head_number']))
                                                <span class="number-title">{{ $letter2[$row][$col]['head_number'] }}</span>
                                            @endif
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Modal kartu  --}}
<dialog id="modalCard" class="modal">
    <div class="modal-box w-11/12 max-w-xl rounded-md bg-base-100 select-none">
        <h3 class="text-3xl text-primary select-none text-center text-body">Selamat Anda mendapatkan kartu</h3>
        <h4 class="text-2xl text-primary select-none text-center text-header mt-5" id="cardTitle"></h4>
        <div class="flex justify-center mt-3">
            <div
                class="bg-secondary/50 border border-base-300 w-1/2 h-96 rounded flex flex-col items-center justify-center shadow-2xl"
                style="border-width: 5px;"
            >
                <img src="{{ asset('images/maskot.svg') }}" alt="" class="w-1/2" draggable="false" id="cardImg">
                <p class="p-2 font-bold text-center text-accent" id="cardDesc"></p>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

{{--  Modal Question 1  --}}
<dialog id="modalQuestion1" class="modal">
    <div class="modal-box w-11/12 max-w-xl rounded-md bg-base-100 select-none">
        <h3 class="text-3xl text-primary select-none text-center text-body">Question</h3>
        <h4 class="text-2xl text-primary select-none text-center text-header mt-5" id="cardTitle"></h4>
        <div class="flex justify-center mt-3">
            <div
                class="bg-secondary/50 border border-base-300 rounded flex flex-col items-center justify-center shadow-2xl"
                style="border-width: 5px;"
            >
{{--                <img src="{{ asset('images/maskot.svg') }}" alt="" class="w-1/2" draggable="false" id="cardImg">--}}
                <p class="p-6 font-bold text-center text-accent" id="questionDesc"></p>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script>
    // ===== SWAL Toaster =====
    var notyf = new Notyf();

    // $("#modalCard")[0].showModal();


    $(document).ready(function () {
        $("#nomor-team").select2();
        $("#nomor-1-question").select2();
        $("#nomor-2-question").select2();
    });

    $(".tab").click(function () {
        $(".tab").removeClass("tab-active");
        $(this).addClass("tab-active");
        $(".board").css('display', 'none');
        $("." + $(this).attr('id')).css('display', 'block');
    });

    $("#nomor-team").on('change', function () {
        let team_id = $(this).val();

        if (team_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('minigame.leftover') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'team_id': team_id
                },
                success: function (response) {
                    reset();
                    // console.log($("#nomor-1-question").html());
                    // $("#nomor-1-question").html()
                    $("#leftOver").text(response.leftover);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        }
    })

    const reset = (board) => {
        $(".square[board=" + board + "]").each(function (id) {
            $(this).css('background-color', "");
            $(this).attr('disabled', true);
            $(this).blur();
            if ($(this).attr("show") === "0") {
                $(this).val("");
            }
            $(this).removeClass('current-state-' + board);
        })
    }

    const answer = (board) => {
        // console.log($("#nomor-"+ board +"-question").val());
        // return;
        if (
            $("#nomor-"+ board +"-question").val() == null ||
            $("#nomor-team").val() == null
        ) {
            Swal.fire({
                title: 'Error!',
                text: 'Silahkan pilih tim atau pertanyaan terlebih dahulu!',
                icon: 'error',
                // confirmButtonText: 'Cool'
            });
            return;
        }

        let inputs = $(".current-state-" + board);
        if (inputs.length < 1) {
            Swal.fire({
                title: 'Error!',
                text: 'Silahkan pilih pertanyaan terlebih dahulu!',
                icon: 'error',
            })
        }

        const sortedInputs = inputs.toArray().sort((a, b) => {
            const rowA = parseInt($(a).attr('row'));
            const rowB = parseInt($(b).attr('row'));
            const colA = parseInt($(a).attr('col'));
            const colB = parseInt($(b).attr('col'));

            if (rowA === rowB) {
                return colA - colB;
            }

            return rowA - rowB;
        });

        let answer = sortedInputs.map(input => $(input).val()).join('');
        let team_id = $("#nomor-team").val();
        let question_id = $("#nomor-"+ board +"-question").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('minigame.submit') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'answer': answer,
                'team_id': team_id,
                'question_id': question_id,
                'board': board
            },
            success: function (response) {
                console.log(response)

                if (response.status === 'success') {
                    let board = parseInt(response.board);
                    let options = "<option value='' selected disabled>-- Select Question --</option>";

                    for (const [key, val] of Object.entries(response.questions)) {
                        options += `<option value="${val.id}">${val.number}</option>`;
                    }
                    $("#nomor-"+ board +"-question").html(options);
                    inputs.attr('show', "1");
                    reset(board);
                    $("#leftOver").text(response.leftover);

                    // Tampilkan Kartu
                    $("#cardImg").attr('src', "#");
                    $("#cardTitle").text(response.card.title);
                    $("#cardDesc").text(response.card.desc);
                    let imgAsset = (response.card.type === "chance") ? "{{ asset('images/maskot.svg') }}" : "{{ asset('images/maskot-marah.svg') }}";
                    $("#cardImg").attr('src', imgAsset);

                    $("#cardImg").on('load', function () {
                        $("#modalCard")[0].showModal();
                    });

                } else if (response.status === 'failed') {
                    Swal.fire({
                        title: 'Error!',
                        text: response.msg,
                        icon: 'error',
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    }

    $("#nomor-1-question").on("change", function () {
        let question_id = $(this).val();

        if (!question_id) {
            Swal.fire({
                title: 'Error!',
                text: 'Silahkan pilih pertanyaan terlebih dahulu!',
                icon: 'error',
            })
            notyf
                .success({
                    message: 'There has been an error. Dismiss to retry.',
                    dismissible: true,
                    duration: 2000,
                    icon: false
                })
            return;
        }

        let btnQuestion1 = $("#btn-question-1");
        btnQuestion1.attr('disabled', true);

        $.ajax({
            type: 'POST',
            url: '{{ route('minigame.cell.active') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'question_id': question_id
            },
            success: function (response) {
                reset(1);
                let rows = response.rows;
                let cols = response.cols;
                console.log(response);
                $("[direction*=:direction]".replace(":direction", response.number))
                    .each(function (id) {
                        let row = parseInt($(this).attr("row"));
                        let col = parseInt($(this).attr("col"));
                        if (
                            rows.includes(row) &&
                            cols.includes(col) &&
                            $(this).attr('board') == "1"
                        ) {
                            if ($(this).attr("show") == "0") {
                                console.log($(this));
                                $(this).attr("disabled", false);
                                $(this).blur();
                            }

                            $(this).addClass('current-state-1');
                        }
                    });
                $("#questionDesc").text(response.quest);
                btnQuestion1.attr('disabled', false);
                console.log(response);
            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    })

    $("#nomor-2-question").on("change", function () {
        let question_id = $(this).val();

        if (!question_id) {
            Swal.fire({
                title: 'Error!',
                text: 'Silahkan pilih pertanyaan terlebih dahulu!',
                icon: 'error',
            })
            notyf
                .success({
                    message: 'There has been an error. Dismiss to retry.',
                    dismissible: true,
                    duration: 2000,
                    icon: false
                })
            return;
        }

        let btnQuestion2 = $("#btn-question-2");
        btnQuestion2.attr('disabled', true);

        $.ajax({
            type: 'POST',
            url: '{{ route('minigame.cell.active') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'question_id': question_id
            },
            success: function (response) {
                reset(2);
                let rows = response.rows;
                let cols = response.cols;
                $("[direction*=:direction]".replace(":direction", response.number))
                    .each(function (id) {
                        let row = parseInt($(this).attr("row"));
                        let col = parseInt($(this).attr("col"));

                        if (
                            rows.includes(row) &&
                            cols.includes(col) &&
                            $(this).attr('board') === "2"
                        ) {
                            if ($(this).attr("show") === "0") {
                                $(this).attr("disabled", false);
                                $(this).blur();
                            }

                            $(this).addClass('current-state-2');
                        }
                    });
                $("#questionDesc").text(response.quest);
                btnQuestion2.attr('disabled', false);

                console.log(response);
            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    })
</script>
</body>
</html>
