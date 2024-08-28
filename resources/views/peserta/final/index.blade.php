@extends('peserta.layout.index', [
    'pageTitle' => 'Final | Industrial Games',
    'navTitle' => 'Final',
])

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
@endsection

@section('styles')

@endsection

@section('content')
    {{--  Alerts  --}}
    @if(session()->has('success'))
        <div role="alert" class="alert mb-5 rounded bg-emerald-400">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-emerald-800"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session()->get('success') }}</span>
        </div>
    @endif
    @if(session()->has('failed'))
        <div role="alert" class="alert mb-5 rounded bg-red-400">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-red-800"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session()->get('failed') }}</span>
        </div>
    @endif

    <div class="mb-3">
        <div>
            <a
                class="btn btn-accent btn-sm px-6 rounded"
                href="{{ route('peserta.index') }}"
            >
                Back
            </a>
        </div>
    </div>

    {{--  Hero  --}}
    <div class="flex flex-col items-center gap-y-5 w-full select-none">
        <div class="hero bg-base-200/50 max-w-7xl shadow-xl">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-4xl font-bold text-primary">Final Industrial Games</h1>
                    <div class="mt-5 stats bg-base-300 text-primary-content rounded-lg w-full">
                        <div class="stat">
                            <div class="stat-title font-bold text-white">Harga Jual Produk Tim</div>
                            <div class="stat-value">Rp. {{ $hargaJual }}</div>
                            <div class="stat-actions">
                                <button
                                    class="btn btn-sm rounded-md"
                                    onclick="confirmationModal.showModal()"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-5 w-full select-none mt-7">
            <div class="col-span-1">
                @if(!is_null($kartu))
                    @php($kartu = $kartu->card)
                    <h3 class="text-3xl text-primary select-none text-center text-header">{{ $kartu->title }}</h3>
                    <div class="flex justify-center mt-3">
                        <div
                            class="bg-secondary/50 border border-base-300 rounded flex flex-col items-center justify-center shadow-2xl"
                            style="border-width: 5px; width: 16.875rem; height: 25rem;"
                        >
                            @php($cardImg = $kartu->type == "chance" ? asset('images/maskot.svg') : asset('images/maskot-marah.svg'))
                            <img src="{{ $cardImg }}" alt="" class="w-1/2" draggable="false">
                            <p class="p-2 font-bold text-center text-accent">{{ $kartu->desc }}</p>
                        </div>
                    </div>
                @else
                    <h3 class="text-3xl text-primary select-none text-center text-header">Tim belum memiliki kartu</h3>
                    <div class="flex justify-center mt-3">
                        <div
                            class="bg-secondary/20 border border-base-300 border-dashed rounded flex flex-col items-center justify-center shadow-2xl"
                            style="border-width: 5px; width: 16.875rem; height: 25rem;"
                        >
                            <img src="{{ asset('images') }}/maskot-kepala.svg" alt="" class="w-1/2" draggable="false">
                        </div>
                    </div>
                @endif
            </div>

            {{--    Input    --}}
            <form class="col-span-1 bg-base-300/70 rounded shadow-2xl py-4 px-6" id="submit_form" action="{{ route('peserta.final.submit') }}" method="POST">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Choose Strategy</span>
                    </div>
                    <select class="select select-bordered rounded" name="strategy_id" id="strategy" required>
                        <option disabled selected>Pick one</option>
                        @foreach($strategies as $strategy)
                            <option value="{{ $strategy->id }}">{{ $strategy->strategy }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="form-control w-full mt-2">
                    <div class="label">
                        <span class="label-text font-bold">HPP:</span>
                    </div>
                    <input type="number" step="0.01" placeholder="hpp ..." name="hpp" class="input input-bordered w-full rounded"  />
                </label>

                <label class="form-control w-full mt-2">
                    <div class="label">
                        <span class="label-text font-bold">Laba Kotor:</span>
                    </div>
                    <input type="number" step="0.01" placeholder="laba kotor ..." name="laba_kotor" class="input input-bordered w-full rounded"  />
                </label>

                <label class="form-control w-full mt-2">
                    <div class="label">
                        <span class="label-text font-bold">Laba Bersih:</span>
                    </div>
                    <input type="number" step="0.01" placeholder="laba bersih ..." name="laba_bersih" class="input input-bordered w-full rounded"  />
                </label>

                <label class="form-control w-full mt-2">
                    <div class="label">
                        <span class="label-text font-bold">Target Cost:</span>
                    </div>
                    <input type="number" step="0.01" placeholder="target cost ..." name="target_cost" class="input input-bordered w-full rounded" />
                </label>
            </form>

            {{--    Strategy    --}}
            <div class="col-span-1 bg-base-300/70 rounded shadow-2xl p-6">
                <div
                    class="flex flex-col justify-center items-center h-full bg-base-100 border border-base-200 rounded px-4 py-7 xl:py-0 gap-5"
                    style="border-width: 5px;"
                >
                    <img src="{{ asset('images') }}/maskot-kepala.svg" alt="" class="w-1/4" draggable="false">
                    <p id="strategyTerm"></p>
                    <p id="strategyCondition"></p>
                </div>
            </div>
        </div>
    </div>

    {{--  Modal Attempt  --}}
    <dialog id="confirmationModal" class="modal">
        <div class="modal-box w-11/12 max-w-xl rounded-md bg-base-100 select-none">
            <form method="dialog">
                <button class="btn btn-sm btn-circle absolute right-2 top-2 focus:outline-none">✕</button>
            </form>
            <h3 class="text-3xl text-primary select-none text-center text-header tracking-widest">Confirmation</h3>
            <div class="flex justify-center mt-3">
                <div
                    class="bg-secondary/50 border border-2 border-base-300 w-1/2 h-96 rounded flex flex-col items-center justify-center shadow-2xl"
                >
                    <img src="{{ asset('images/maskot.svg') }}" alt="" class="w-1/2 mb-5">
                    <h4 class="mb-3 font-semibold">Submit Final Answer?</h4>
                    <button
                        class="btn btn-primary btn-sm rounded-md px-6 disabled:bg-accent/50"
                        type="submit"
                        id="btnFinishAttempt"
                        form="submit_form"
                    >
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </dialog>
@endsection

@section('scripts')
    <script>
        var notyf = new Notyf();
        // Klik Kanan
        document.addEventListener('contextmenu', event => {
            event.preventDefault()
            notyf.error({
                message: 'This Feature is Disabled',
                duration:2000,
                dismissible: true,
                position: {
                    x: 'center',
                    y: 'top',
                },
            });
            return false;
        });

        // Other shortcut
        document.onkeydown = function (e) {
            if (
                (e.keyCode == 123) ||
                (e.ctrlKey && e.shiftKey && e.keyCode == 73) ||
                (e.ctrlKey && e.shiftKey && e.keyCode == 74) ||
                (e.ctrlKey && e.keyCode == 85)
            ) {
                e.preventDefault();
                notyf.error({
                    message: 'This Feature is Disabled',
                    duration:2000,
                    dismissible: true,
                    position: {
                        x: 'center',
                        y: 'top',
                    },
                });
                return false;
            }
        }
    </script>

    <script>
        $("#strategy").on('change', function () {
            let strategy_id = $(this).val();

            $.ajax({
                type: 'GET',
                url: '{{ route('peserta.final.strategy', ['strategy' => ':strategy']) }}'.replace(':strategy', strategy_id),
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function (response) {
                    const strategy = response.strategy;

                    $("#strategyTerm").text(strategy.term);
                    $("#strategyCondition").text(strategy.condition);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        })
    </script>
@endsection
