@extends('layouts.app')

@section('content')
@include('ckfinder::setup')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Editor') }}</label>

                            <textarea class="editor" id="editor" name="editor"></textarea>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
    <script type='text/javascript' src="{{ asset('nanospell/autoload.js') }}" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- <script src="{{ asset('ckeditor5/ckeditor5-build-classic/ckeditor.js') }}"></script> -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        /*ClassicEditor.create( document.querySelector( '.editor' ), {
                
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        'CKFinder',
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
                sidebar: {
                container: document.querySelector( '.sidebar' )
            },
            } )
            .then( editor => {
                window.editor = editor;
                
            } )
            .catch( error => {
                console.error( error );
            } );*/
            CKEDITOR.replace( 'editor', {
                // Use named CKFinder browser route
                filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}",
                // Use named CKFinder connector route
                filebrowserUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files"
            } );
            // CKFinder.setupCKEditor( editor );

            // var editor = CKEDITOR.replace( 'ckfinder' );
            // CKFinder.setupCKEditor( editor );
            
            nanospell.ckeditor('editor',{
                dictionary:"en",
                server:"php"  // can be php, asp, asp.net or java
            }); 
    </script>
@endsection
