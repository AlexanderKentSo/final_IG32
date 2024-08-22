@extends('soal.layout.index', [
    'pageTitle' => 'Soal | Dashboard',
    'navTitle' => 'Dashboard'
])

@php($user = auth()->user())

@section('content')
    <div class="w-full flex justify-center">
        <div class="hero bg-base-200 max-w-7xl">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Halo, {{ $user->username }}!</h1>
                    <p class="py-6">
                        Disini anda dapat <strong>melihat</strong>, <strong>membuat</strong>, dan <strong>mengganti</strong> soal untuk Multiple Choice
                    </p>
                    <a class="btn btn-primary rounded-md" href="{{ route('soal.create') }}">Create</a>
                </div>
            </div>
        </div>
    </div>

    {{--  Table  --}}
    <div class="overflow-auto mt-8">
        <div class="overflow-auto" style="max-height: 37.5rem;">
            <table class="table table-pin-cols">
                <thead>
                    <tr>
                        <th width="10%" class="text-center bg-secondary text-accent font-semibold">Number</th>
                        <th width="60%" class="text-center bg-secondary text-accent font-semibold">Question</th>
                        <th width="30%" class="text-center bg-secondary text-accent font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($questions) < 1)
                        <tr>
                            <td width="100%" colspan="3" class="text-center text-accent font-semibold">Belum ada soal</td>
                        </tr>
                    @else
                        @foreach($questions as $question)
                            <tr>
                                <td width="10%" class="text-center text-accent">
                                    {{ $question->number }}
                                </td>
                                <td width="60%" class="text-center text-accent">
                                    {!! $question->question !!}
                                </td>
                                <td width="30%" class="text-center text-accent">
                                    <a href="{{ route('soal.edit', ['question' => $question->id]) }}" class="btn btn-sm">Update</a>
                                    <button class="btn btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
