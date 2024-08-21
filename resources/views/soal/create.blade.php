@extends('soal.layout.index', [
    'pageTitle' => 'Create Question',
    'navTitle' => 'Create Question'
])

@section('content')

@endsection


@section('scripts')
    <script type="text/javascript">
        tinymce.init({
            selector: '#soal',
            toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
            toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
            relative_urls: false,
            document_base_url: '{{ asset('.') }}',
            paste_data_images: true,
            promotion: false
        });
    </script>
@endsection
