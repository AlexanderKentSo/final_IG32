@extends('soal.layout.index', [
    'pageTitle' => 'Edit Question',
    'navTitle' => 'Edit Question'
])

@section('cdn')
    <script src="{{ asset('js') }}/flowbite.min.js"></script>
    @vite('resources/js/ckeditor5.js')
@endsection

@section('styles')
    <style>
        .ck-editor__editable {
            min-height: 350px !important;
        }

        .Wirisformula {
            display: inline !important;
        }
    </style>
@endsection

@section('content')
    {{--  Alerts  --}}
    <div>
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
    </div>

    <div class="px-14 mb-5">
        <a class="btn btn-accent btn-sm rounded-md px-6" href="{{ route('soal.index') }}">Back</a>
    </div>

    <form class="px-14" method="POST" action="{{ route('soal.update', ['question' => $question->id]) }}">
        @csrf
        <div>
            <label for="quantity-input" class="block mb-2 text-sm font-bold text-primary">Nomor</label>
            <div class="relative flex items-center max-w-[8rem]">
                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-base-300 hover:bg-base-300/80 border border-gray-300 rounded-s-lg p-3 h-11 active:scale-95 transition-all">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                    </svg>
                </button>
                <input
                    type="text"
                    id="quantity-input"
                    data-input-counter aria-describedby="helper-text-explanation"
                    data-input-counter-min="1"
                    class="bg-base-200 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    min="1"
                    value="{{ $question->number }}"
                    name="nomor"
                    required />
                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-base-300 hover:bg-base-300/90 border border-gray-300 rounded-e-lg p-3 h-11 active:scale-95 transition-all">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="mt-5">
{{--            <textarea id="soal" name="soal">{{ htmlspecialchars($question->question, ENT_QUOTES, 'UTF-8') }}</textarea>--}}
            <textarea id="soal" name="soal">{{ $question->question }}</textarea>
        </div>

        {{--    Jawaban Benar    --}}
        <div class="mt-5">
            <label class="form-control w-48">
                <div class="label">
                    <span class="label-text font-bold text-primary">Jawaban Benar</span>
                </div>
                <select name="jawaban_benar" class="select text-lg rounded-md bg-base-300 text-accent focus:outline-none" style="font-weight: 600;" required>
                    <option disabled selected>Jawaban Benar</option>
                    <option value="A" {{ $question->answer == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $question->answer == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $question->answer == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ $question->answer == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ $question->answer == 'E' ? 'selected' : '' }}>E</option>
                </select>
            </label>
        </div>

        {{--    Choices    --}}
        <div class="mt-5 flex flex-col gap-y-5">
            <div class="flex">
                <button class="btn rounded-r-none rounded-l-sm" type="button">A</button>
                <input
                    type="text"
                    placeholder="Type here"
                    class="input w-full bg-neutral rounded-l-none rounded-r-sm focus:outline-none"
                    name="isi_a"
                    value="{{ $a }}"
                    required
                />
            </div>
            <div class="flex">
                <button class="btn rounded-r-none rounded-l-sm" type="button">B</button>
                <input
                    type="text"
                    placeholder="Type here"
                    class="input w-full bg-neutral rounded-l-none rounded-r-sm focus:outline-none"
                    name="isi_b"
                    value="{{ $b }}"
                    required
                />
            </div>
            <div class="flex">
                <button class="btn rounded-r-none rounded-l-sm" type="button">C</button>
                <input
                    type="text"
                    placeholder="Type here"
                    class="input w-full bg-neutral rounded-l-none rounded-r-sm focus:outline-none"
                    name="isi_c"
                    value="{{ $c }}"
                    required
                />
            </div>
            <div class="flex">
                <button class="btn rounded-r-none rounded-l-sm" type="button">D</button>
                <input
                    type="text"
                    placeholder="Type here"
                    class="input w-full bg-neutral rounded-l-none rounded-r-sm focus:outline-none"
                    name="isi_d"
                    value="{{ $d }}"
                    required
                />
            </div>
            <div class="flex">
                <button class="btn rounded-r-none rounded-l-sm" type="button">E</button>
                <input
                    type="text"
                    placeholder="Type here"
                    class="input w-full bg-neutral rounded-l-none rounded-r-sm focus:outline-none"
                    name="isi_e"
                    value="{{ $e }}"
                    required
                />
            </div>
        </div>
        <div class="mt-5 flex justify-end">
            <button class="btn btn-primary rounded-md px-12">Ubah</button>
        </div>
    </form>
@endsection


@section('scripts')
    <script type="text/javascript">
        {{--tinymce.init({--}}
        {{--    selector: '#soal',--}}
        {{--    external_plugins: {--}}
        {{--        'mathSymbols': '{{ asset('js/mathsymbols/plugin.js') }}'--}}
        {{--    },--}}
        {{--    plugins: [--}}
        {{--        'mathSymbols'--}}
        {{--    ],--}}
        {{--    toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',--}}
        {{--    toolbar2: 'mathSymbols | cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',--}}
        {{--    relative_urls: false,--}}
        {{--    document_base_url: '{{ asset('.') }}',--}}
        {{--    paste_data_images: true,--}}
        {{--    promotion: false,--}}
        {{--});--}}
    </script>
@endsection
