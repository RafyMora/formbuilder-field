@if (config('formbuilder-field.styles') && count(config('formbuilder-field.styles')))
    @foreach (config('formbuilder-field.styles') as $path)
        <link rel="stylesheet" type="text/css" href="{{ asset($path) }}"></link>
    @endforeach
@endif