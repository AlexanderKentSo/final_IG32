@extends('peserta.layout.index', [
    'pageTitle' => 'Dashboard | Industrial Games',
    'navTitle' => 'Dashboard',
])

@section('cdn')

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
    {{--  Hero  --}}
    <div class="flex flex-col items-center gap-y-5 w-full select-none">
        <div class="hero bg-base-200/50 max-w-7xl shadow-xl">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Welcome, {{ $tim->name }}</h1>
                    <div class="mt-5 stats bg-accent text-primary-content rounded-lg w-full">
                        <div class="stat">
                            <div class="stat-title font-bold text-white">Harga Jual Produk Tim</div>
                            <div class="stat-value">Rp. {{ $hargaJual }}</div>
                            <div class="stat-actions">
                                <button
                                    class="btn btn-sm btn-ghost border border-white rounded-md"
                                    onclick="modalCard.showModal()"
                                >
                                    Lihat Kartu
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-x-5 w-full select-none">
            <div class="w-full bg-neutral-content/80 p-4 rounded shadow-xl">
                <h2 class="text-neutral text-header text-2xl tracking-widest mb-2">Multiple Choice</h2>
                <p>Disini Anda dapat mengerjakan soal berbentuk <strong>PILIHAN GANDA</strong>.</p>
                <div class="mt-3 flex justify-end">
                    <a href="{{ route('peserta.mc.index', ['number' => 1]) }}" class="btn btn-sm px-4 rounded-md">Buka</a>
                </div>
            </div>
            <div class="w-full bg-base-300/80 p-4 rounded shadow-xl">
                <h2 class="text-neutral text-header text-2xl tracking-widest mb-2">Final</h2>
                <p>Disini Anda dapat memasukkan <strong>JAWABAN AKHIR</strong> dari soal yang telah diberikan oleh panitia.</p>
                <div class="mt-3 flex justify-end">
                    <a href="" class="btn btn-sm rounded-md px-4">Buka</a>
                </div>
            </div>
        </div>
    </div>


    {{--  Modal kartu  --}}
    <dialog id="modalCard" class="modal">
        <div class="modal-box w-11/12 max-w-xl rounded-md bg-base-100 select-none">
            @if(!is_null($kartu))
                @php($kartu = $kartu->card)
                <h3 class="text-3xl text-primary select-none text-center text-header">{{ $kartu->title }}</h3>
                <div class="flex justify-center mt-3">
                    <div
                        class="bg-secondary/50 border border-base-300 w-1/2 h-96 rounded flex flex-col items-center justify-center shadow-2xl"
                        style="border-width: 5px;"
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
                        class="bg-secondary/20 border border-base-300 border-dashed w-1/2 h-96 rounded flex flex-col items-center justify-center shadow-2xl"
                        style="border-width: 5px;"
                    >
                        <img src="{{ asset('images') }}/maskot-kepala.svg" alt="" class="w-1/2" draggable="false">
                    </div>
                </div>
            @endif
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
@endsection

@section('scripts')

@endsection
