@push('after_style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"></link>
@endpush

@include('crud::fields.inc.wrapper_start')
@php
    $data = (!empty($field["value"])) ? $field["value"] : json_encode([]);
@endphp
    <label>{!! $field['label'] !!}</label>
    <textarea name="{{ $field['name'] }}" id="result-build-wrap" style="display: none">{{ $data }}</textarea>
    <div id="build-wrap"></div>
    <div class="render-wrap"></div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@push('after_scripts')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/rafy-mora/formbuilder-field/js/form-builder.min.js') }}"></script>
    <script src="{{ asset('vendor/rafy-mora/formbuilder-field/js/form-render.min.js') }}"></script>
    <script>
        jQuery(function ($) {
            var fbTemplate = document.getElementById("build-wrap");
            var data = '{!! $data !!}';

            var options = {
                controlPosition: 'left',
                locale: '{{ config("app.locale") }}',
                disabledActionButtons: ['data'],
                editOnAdd: true,
                stickyControls: {
                    enable: true
                },
                disableFields: ['button','file','starRating'],
                defaultFields: JSON.parse(data),
                onSave: function (evt, formData) { saveForm(formData) }
            };
            $(fbTemplate).formBuilder(options);

            /**
             * @TODO: save with same buton than CRUD
             */
            function saveForm(formData) {
                // toggleEdit(false);
                $(".render-wrap").formRender({ formData });
                $("#result-build-wrap").text(formData);
            }
        });
    </script>
@endpush
