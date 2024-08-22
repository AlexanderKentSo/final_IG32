@extends('peserta.layout.index', [
    'pageTitle' => 'Multiple Choice | Industrial Games',
    'navTitle' => 'Multiple Choice',
])

@section('cdn')

@endsection

@section('styles')

@endsection

@section('content')
    <a
        class="btn btn-accent btn-sm px-6 rounded mb-3"
        href="{{ route('peserta.index') }}"
    >
        Back
    </a>

    {{--  Content  --}}
    <div class="border-black border grid grid-cols-3 gap-x-8">
        <div class="col-span-1 bg-primary">
            test
        </div>

        <div class="col-span-2 bg-base-300">
            test 2
        </div>
    </div>
@endsection

@section('scripts')

@endsection
