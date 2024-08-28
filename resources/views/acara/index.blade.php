@extends('acara.layout.index', [
    'pageTitle' => 'Acara | Dashboard',
    'navTitle' => 'Dashboard'
])

@php($user = auth()->user())

@section('content')
    {{--  Alert  --}}
    <div role="alert" class="alert rounded-md">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="stroke-info h-6 w-6 shrink-0">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Selamat Datang, <strong>{{ ucfirst($user->username) }}</strong>!</span>
    </div>

    {{--  Submissions  --}}
    <div class="flex flex-col mt-5 items-center">
        <h1 class="text-4xl font-bold text-body tracking-widest text-primary">Submission Tim</h1>

        <div class="overflow-auto mt-8 w-full rounded">
            <div class="overflow-auto" style="max-height: 37.5rem;">
                <table class="table table-pin-rows">
                    <thead>
                    <tr>
                        <th width="40%" class="text-center bg-secondary text-accent font-semibold">Tim</th>
                        <th width="30%" class="text-center bg-secondary text-accent font-semibold">Status</th>
                        <th width="30%" class="text-center bg-secondary text-accent font-semibold">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $team => $result)
                            <tr>
                                <td width="40%" class="text-center">{{ $result['name'] }}</td>
                                <td width="30%" class="text-center">
                                    @if(is_null($result['submission']))
                                        <span class="badge rounded-full bg-red-200 border border-red-500 text-red-800">Belum Mengumpukan</span>
                                    @else
                                        <span class="badge rounded-full bg-green-200 border border-green-500 text-green-800">Sudah Mengumpulkan</span>
                                    @endif
                                </td>
                                <td width="30%" class="text-center">
                                    <a
                                        class="btn btn-sm rounded-md btn-accent"
                                        href="{{ route('acara.show', ['team' => $team]) }}"
                                    >
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
