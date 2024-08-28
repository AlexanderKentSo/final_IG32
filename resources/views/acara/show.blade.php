@extends('acara.layout.index', [
    'pageTitle' => 'Acara | Submission',
    'navTitle' => 'Submission'
])

@php($user = auth()->user())

@section('content')
    {{--  Alert  --}}
    <div class="mb-3">
        <div>
            <a
                class="btn btn-accent btn-sm px-6 rounded"
                href="{{ route('acara.index') }}"
            >
                Back
            </a>
        </div>
    </div>

    {{--  Content  --}}
    <div class="grid lg:grid-cols-3 gap-5 w-full select-none mt-10">
        <div class="col-span-1">
            @if(!is_null($result['card']))
                @php($kartu = $result['card'])
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
        <div class="col-span-1 bg-base-300/70 rounded shadow-2xl py-4 px-6">
            <div class="overflow-auto w-full rounded">
                <div class="overflow-auto">
                    <table class="table table-zebra table-pins-rows">
                        <tr>
                            <th width="50%" class="text-center font-bold">Header</th>
                            <th width="50%" class="text-center font-bold">Value</th>
                        </tr>
                        <tr>
                            <td><strong>HARGA JUAL</strong></td>
                            <td>{{ $result['harga_jual'] }}</td>
                        </tr>
                        @if(is_null($result['submission']))
                            <tr>
                                <td><strong>HPP</strong></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>LABA KOTOR</strong></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>LABA BERSIH</strong></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>TARGET COST</strong></td>
                                <td>-</td>
                            </tr>
                        @else
                            @php($cnt = 1)
                            <tr>
                                <td><strong>HPP</strong></td>
                                <td>{{ number_format($result['submission']->hpp, 2, ".", ",") }}</td>
                            </tr>
                            <tr>
                                <td><strong>LABA KOTOR</strong></td>
                                <td>{{ number_format($result['submission']->laba_kotor, 2, ".", ",")  }}</td>
                            </tr>
                            <tr>
                                <td><strong>LABA BERSIH</strong></td>
                                <td>{{ number_format($result['submission']->laba_bersih, 2, ".", ",")  }}</td>
                            </tr>
                            <tr>
                                <td><strong>TARGET COST</strong></td>
                                <td>{{ number_format($result['submission']->target_cost, 2, ".", ",")  }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        {{--    Strategy    --}}
        <div class="col-span-1 bg-base-300/70 rounded shadow-2xl p-6">
            <div
                class="flex flex-col justify-center items-center h-full bg-base-100 border border-base-200 rounded px-4 py-7 xl:py-0 gap-5"
                style="border-width: 5px;"
            >
                <img src="{{ asset('images') }}/maskot-kepala.svg" alt="" class="w-1/4" draggable="false">
                <p id="strategyTerm">
                    {{ $result['submission'] != null ? $result['submission']['term'] : '' }}
                </p>
                <p id="strategyCondition">
                    {{ $result['submission'] != null ? $result['submission']['condition'] : '' }}
                </p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
