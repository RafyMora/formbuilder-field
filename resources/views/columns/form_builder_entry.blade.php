@php
    $column['value'] = data_get($entry, $column['name']);
    $column['value'] = json_decode($column['value']);
    
@endphp

@foreach ($column['value'] as $field)
    @if($field->type == 'hidden')
        @continue
    @elseif($field->type == 'checkbox-group')
        <b>{{ $field->label }}: </b>
        <ul>
            @foreach ($field->userData[0] as $userData)
                <li>{{ $userData }}</li>
            @endforeach
        </ul>
    @else
        <p><b>{{ $field->label ?? null }}: </b>{{ $field->userData[0] }}</p>
    @endif
@endforeach
