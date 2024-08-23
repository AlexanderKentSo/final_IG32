@extends('peserta.layout.index', [
    'pageTitle' => 'Multiple Choice | Industrial Games',
    'navTitle' => 'Multiple Choice',
])

@section('cdn')
@endsection

@section('styles')

@endsection

@section('content')
    <div class="flex justify-between items-center mb-3">
        <div>
            <a
                class="btn btn-accent btn-sm px-6 rounded"
                href="{{ route('peserta.index') }}"
            >
                Back
            </a>
        </div>
        <div class="bg-primary px-5 py-1.5 rounded text-white">
            <span class="countdown font-mono text-xl">
              <span id="hours_left"></span>
              :
              <span id="mins_left"></span>
              :
              <span id="secs_left"></span>
            </span>
        </div>
    </div>

    {{--  Content  --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-5 lg:gap-x-6 select-none">
        {{--    Navigation    --}}
        <div class="col-span-1 card bg-base-300/80 shadow-xl rounded-md order-2 lg:order-1">
            <div class="card-body">
                <h2 class="card-title justify-center mb-2">Navigate</h2>
                <div class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-12 lg:grid-cols-5 2xl:grid-cols-6 gap-5">
                    @foreach($questions as $question)
                        @php
                            $classColor = "";
                            if ($question->number == $number) {
                                $classColor = 'btn-primary text-base-100';
                            } else if (
                                isset(
                                    $question->teams()->where('team_id', $team->id)
                                            ->first()->pivot->answer
                                )
                            ) {
                                $classColor = 'btn-accent';
                            }
                        @endphp
                        <button
                            class="btn rounded-full {{ $classColor }}"
                            form="submit_submission"
                            name="target"
                            value="{{ $question->number }}"
                        >
                            {{ $question->number }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{--    Form    --}}
        <div class="col-span-1 lg:col-span-2 bg-base-300/20 rounded-md shadow-xl order-1 lg:order-2">
            <div class="card-body">
                <h2 class="card-title justify-center">Number {{  $questionNow->number }}</h2>
                <form class="bg-white p-4 sm:p-6 rounded" id="submit_submission" method="POST" action="{{ route('peserta.mc.submit') }}">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $questionNow->id }}">
                    {{--          Question          --}}
                    <div class="mb-6">
                        {!! $questionNow->question !!}
                    </div>

                    {{--         Choices           --}}
                    @php($choices = $questionNow->choices()->get()->shuffle())
                    @foreach($choices as $choice)
                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-x-4">
                                <input
                                    type="radio"
                                    name="answer"
                                    class="radio radio-sm radio-primary"
                                    value="{{ $choice->alphabet }}"
                                    {{ !is_null($currentSubmission) ? ($currentSubmission->pivot->answer == $choice->alphabet ? 'checked' : '') : ''  }}
                                />
                                <span class="label-text">{{ $choice->choice }}</span>
                            </label>
                        </div>
                    @endforeach
                </form>
                <div class="card-actions justify-between mt-4">
                    <button
                        class="btn btn-accent btn-sm rounded-md disabled:bg-accent/50"
                        type="submit"
                        {{ (is_null($previous)) ? 'disabled' : '' }}
                        value="{{ $previous ?? 1 }}"
                        form="submit_submission"
                        name="target"
                    >
                        Previous
                    </button>
                    @if($number == $last_number)
                        <button
                            class="btn btn-primary btn-sm rounded-md px-6 disabled:bg-accent/50"
                            type="button"
                            onclick="document.getElementById('finishAttemptModal').showModal()"
                        >
                            Finish Attempt
                        </button>
                    @else
                        <button
                            class="btn btn-accent btn-sm rounded-md px-6 disabled:bg-accent/50"
                            type="submit"
                            value="{{ $next }}"
                            name="target"
                            form="submit_submission"
                        >
                            Next
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--  Modal Attempt  --}}
    <dialog id="finishAttemptModal" class="modal">
        <div class="modal-box w-11/12 max-w-xl rounded-md bg-base-100 select-none">
            <form method="dialog">
                <button class="btn btn-sm btn-circle absolute right-2 top-2 focus:outline-none">✕</button>
            </form>
            <h3 class="text-3xl text-primary select-none text-center text-header">Finish Attempt</h3>
            <div class="flex justify-center mt-3">
                <div
                    class="bg-secondary/50 border border-2 border-base-300 w-1/2 h-96 rounded flex flex-col items-center justify-center shadow-2xl"
                >
                    <img src="{{ asset('images/maskot-kepala.svg') }}" alt="" class="w-1/2 mb-5">
                    <h4 class="mb-3 font-semibold">Submit All and Finish?</h4>
                    <button
                        class="btn btn-primary btn-sm rounded-md px-6 disabled:bg-accent/50"
                        type="submit"
                        name="target"
                        form="submit_submission"
                        value="end"
                        id="btnFinishAttempt"
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
        // Klik Kanan
        document.addEventListener('contextmenu', event => {
            event.preventDefault()
            Swal.fire({
                title: 'Error!',
                text: 'This Feature is Disabled',
                icon: 'error',
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
                Swal.fire({
                    title: 'Warning',
                    text: 'This Feature is Disabled!',
                    icon: 'warning',
                });
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        var year = {{ now()->year }};
        var month = {{ now()->month }};
        var day = {{ now()->day }};
        var hour = {{ now()->hour }};
        var minute = {{ now()->minute }};
        var second = {{ now()->second }};
        var millisecond = {{ now()->millisecond }};

        var isredirect = false;

        const countdown = () => {
            let startDate = null;
            var offerDate = new Date(
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->year }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->month }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->day }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->hour }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->minute }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->second }},
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contest->waktu_selesai)->millisecond }}
            );

            second += 1;
            if (second > 60) {
                minute += 1;
                second -= 60;
            }
            if (minute > 60) {
                hour += 1;
                minute -= 60;
            }

            startDate = new Date(year, month, day, hour, minute, second, 0);


            //offerTime will have the total millseconds
            const offerTime = offerDate - startDate;


            // 1 sec= 1000 ms
            // 1 min = 60 sec
            // 1 hour = 60 mins
            var offerHours = Math.floor((offerTime / (1000 * 60 * 60)));
            var offerMins = Math.floor((offerTime / (1000 * 60) % 60));
            var offerSecs = Math.floor((offerTime / 1000) % 60);


            //Kalau waktu sudah habis
            if (offerHours <= 0 && offerMins <= 0 && offerSecs <= 0) {
                if (!isredirect){
                    // console.log("SDSD");
                    $("#btnFinishAttempt").click();
                    isredirect = true;
                }
            }

            if (offerHours > 0 || offerMins > 0 || offerSecs > 0) {
                if (offerHours < 10) offerHours = "0" + offerHours
                if (offerMins < 10) offerMins = "0" + offerMins
                if (offerSecs < 10) offerSecs = "0" + offerSecs

                $('#hours_left').attr("style", "--value:" + offerHours);
                $('#mins_left').attr("style", "--value:" + offerMins);
                $('#secs_left').attr("style", "--value:" + offerSecs);
            }
        }
        setInterval(countdown, 1000);
    </script>
@endsection
