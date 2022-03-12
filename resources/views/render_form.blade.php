@if (config('formbuilder-field.styles') && count(config('formbuilder-field.styles')))
    @foreach (config('formbuilder-field.styles') as $path)
        <link rel="stylesheet" type="text/css" href="{{ asset($path) }}"></link>
    @endforeach
@endif

<div class="col-md-12 bold-labels">
    @if($form->display_title)
        <h2>{{ $form->title }}</h2>
    @endif
    @if($form->display_intro)
        <p>{!! $form->intro !!}</p>
    @endif
    <form action="/" method="POST">
        @csrf
        <div class="render-wrap"></div>
        <input type="submit" value="{{ $form->text_button }}" name="submit">
    </form>
</div>


@if (config('formbuilder-field.scripts') && count(config('formbuilder-field.scripts')))
    @foreach (config('formbuilder-field.scripts') as $path)
    <script type="text/javascript" src="{{ asset($path) }}"></script>
    @endforeach
@endif

<script src="{{ asset('vendor/rafy-mora/formbuilder-field/js/form-render.min.js') }}"></script>
<script>
    jQuery(function ($) {
        var formData = '{!! $data !!}';
        $(".render-wrap").formRender({ formData });
    });
</script>
