<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{ $data->email_subject ?? __('rafy-mora.formbuilder-field::formbuilder.emails.default_subject')}}</title>
        @include('rafy-mora.formbuilder-field::emails.styles')
    </head>
    <body>
        @yield('content_fb_email')
    </body>
</html>
