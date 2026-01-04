@if (config('formbuilder-field.scripts') && count(config('formbuilder-field.scripts')))
    @foreach (config('formbuilder-field.scripts') as $path)
        <script type="text/javascript" src="{{ asset($path) }}"></script>
    @endforeach
@endif
