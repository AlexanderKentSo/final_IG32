@extends('soal.layout.index', [
    'pageTitle' => 'Soal | Dashboard',
    'navTitle' => 'Dashboard'
])

@php($user = auth()->user())

@section('content')
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
                        <th width="50%" class="text-center bg-secondary text-accent font-semibold">Question</th>
                        <th width="10%" class="text-center bg-secondary text-accent font-semibold">Answer</th>
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
                                <td width="50%" class="text-center text-accent">
                                    {!! $question->question !!}
                                </td>
                                <td width="10%" class="text-center text-accent font-bold" style="font-size: 1.2rem;">
                                    {{ $question->answer }}
                                </td>
                                <td width="30%" class="text-center text-accent flex justify-center w-full gap-x-4">
                                    <a href="{{ route('soal.edit', ['question' => $question->id]) }}" class="btn btn-warning btn-sm">Update</a>
                                    <form id="formDelete_{{ $question->id }}" action="{{ route('soal.destroy', ['question' => $question->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn bg-red-800 btn-sm" onclick="if (!confirm('Apakah Anda yakin?')) {event.stopPropagation();event.preventDefault()} else { document.getElementById('formDelete_{{ $question->id }}').submit()};">Delete</button>
                                    </form>
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
