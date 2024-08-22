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
              <span style="--value:10;" id="hours_left"></span>
              :
              <span style="--value:24;" id="mins_left"></span>
              :
              <span style="--value:1;" id="secs_left"></span>
            </span>
        </div>
    </div>

    {{--  Content  --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-5 lg:gap-x-6 select-none">
        <div class="col-span-1 card bg-base-300/80 shadow-xl rounded-md">
            <div class="card-body">
                <h2 class="card-title justify-center">Navigate</h2>
                <p>If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-end mt-4">
                    <button class="btn btn-primary btn-sm rounded-md">Finish and Submit</button>
                </div>
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2 bg-base-300/20 rounded-md shadow-xl">
            <div class="card-body">
                <h2 class="card-title justify-center">Nomor {{  $questionNow->number }}</h2>
                <form class="bg-white p-6 rounded">
                    {{--          Question          --}}
                    <div class="mb-6">
                        {!! $questionNow->question !!}
                    </div>

                    {{--         Choices           --}}
                    @php($choices = $questionNow->choices()->get()->shuffle())
                    @foreach($choices as $choice)
                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-x-4">
                                <input type="radio" name="answer" class="radio radio-sm radio-primary" value="{{ $choice->alphabet }}" />
                                <span class="label-text">{{ $choice->choice }}</span>
                            </label>
                        </div>
                    @endforeach
                </form>
                <div class="card-actions justify-between mt-4">
                    <button class="btn btn-accent btn-sm rounded-md disabled:bg-accent/50" disabled>Previous</button>
                    <button class="btn btn-accent btn-sm rounded-md px-6 disabled:bg-accent/50">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
