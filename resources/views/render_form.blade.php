
@extends('rafy-mora.formbuilder-field::layout')

@section('content_fb')
    <div class="col-md-12 bold-labels">
        @if($form->display_title)
            <h2>{{ $form->title }}</h2>
        @endif
        @if($form->display_intro)
            <p>{!! $form->intro !!}</p>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <form action="{{ route('storeformbuilderentry') }}" method="POST">
            @csrf
            <div class="render-wrap"></div>
            <input type="hidden" name="original-form" value="{{ $form->uniq_id }}"/>
            <input type="submit" value="{{ $form->text_button }}" name="submit" id="formbuilder-submit-button" class='{{ config('formbuilder-field.button_class') }}'>
        </form>
    </div>
@endsection

@push('scripts_fb')
    {{-- @TODO: If form return validation custom error, data contain old value of form --}}
    @if(session('dataError'))
        @php $data = session('dataError') @endphp
    @endif

    <script src="{{ asset('vendor/rafy-mora/formbuilder-field/js/form-render.min.js') }}"></script>
    <script>
        jQuery(function ($) {
            var formData = {!! $data !!};
            console.log(formData);
            var renderWrap = $(".render-wrap").formRender({ formData });
        });
    </script>
@endpush
