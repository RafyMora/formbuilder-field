
@extends('rafy-mora.formbuilder-field::layout')

@section('content_fb')
    <div class="bold-labels">
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

        <form action="{{ route('storeformbuilderentry') }}" method="POST" class="form-builder" id="fb-{{ $form->uniq_id }}">
            @csrf
            <div class="render-wrap"></div>
            <input type="hidden" name="original-form" value="{{ $form->uniq_id }}"/>
            {{-- ADD RECAPTCHA BOX FOR FRONT VALIDATION --}}
            @if (!empty(config('formbuilder-field.captcha_v3_site_key')) && !empty(config('formbuilder-field.captcha_v3_secret_key')) && !empty($form->display_captcha))
                <div data-sitekey="{{ config('formbuilder-field.captcha_v3_site_key') }}" data-size="invisible" data-callback='onSubmit' data-action='submit' class='g-recaptcha'></div>
            @endif
            <input type="submit" value="{{ $form->text_button }}" name="submit" id="formbuilder-submit-button" class='{{ config('formbuilder-field.button_class') }}'>
        </form>
    </div>
@endsection

@push('scripts_fb')
    {{-- @TODO: If form return validation custom error, data contain old value of form --}}
    @if(session('dataError'))
        @php $data = session('dataError') @endphp
    @endif

    {{-- ADD GOOGLE RECAPTCHA V3 --}}
    @if (!empty(config('formbuilder-field.captcha_v3_site_key')) && !empty(config('formbuilder-field.captcha_v3_secret_key')) && !empty($form->display_captcha))
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            (function() {
                document.getElementById("fb-{{ $form->uniq_id }}").addEventListener("submit", function(event) {
                    console.log('form submitted.');
                    if (!grecaptcha.getResponse()) {
                        console.log('captcha not yet completed.');

                        event.preventDefault(); //prevent form submit
                        grecaptcha.execute();
                    } else {
                        console.log('form really submitted.');
                    }
                });
            })();
        </script>
    @endif

    <script src="/formbuilder-field/js/form-render.min.js"></script>
    <script>
        jQuery(function ($) {
            var formData = {!! $data !!};
            var renderWrap = $(".render-wrap").formRender({ formData });
        });
    </script>
@endpush
