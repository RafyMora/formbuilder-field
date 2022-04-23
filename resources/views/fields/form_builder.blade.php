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
            var data = document.getElementById("result-build-wrap").value;

            var options = {
                controlPosition: 'left',
                locale: '{{ config("app.locale") }}',
                disabledActionButtons: ['data','save'],
                scrollToFieldOnAdd: true,
                editOnAdd: true,
                stickyControls: {
                    enable: true
                },
                disableFields: ['button','file','starRating'],
                defaultFields: JSON.parse(data),
                onSave: function (evt, formData) { saveForm(formData) }
            };
            let fom = $(fbTemplate).formBuilder(options);
            $("form").submit(function(e){
                saveForm(fom.actions.getData('json'));
            });

            function saveForm(formData) {
                // $(".render-wrap").formRender({ formData });
                $("#result-build-wrap").text(formData);
                new Noty({
                    type: "success",
                    text: '{{ __("rafy-mora.formbuilder-field::formbuilder.labels.form_saved") }}',
                }).show();
            }
        });
    </script>
@endpush
