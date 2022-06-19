@extends('rafy-mora.formbuilder-field::emails.layout')

@section('content_fb_email')
<span class="preheader">{!! trans('rafy-mora.formbuilder-field::formbuilder.emails.message_admin', ['form_title' => $dataMail['orginal_form']->title]) !!}</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        {{-- "<p><br></p>" it's empty field for summernote TODO change that --}}
                        @if(!empty($dataMail['orginal_form']->message_admin) && $dataMail['orginal_form']->message_admin != '<p><br></p>')
                            {!! $dataMail['orginal_form']->message_admin !!}
                        @else
                            {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.message_admin', ['form_title' => $dataMail['orginal_form']->title]) !!}
                        @endif
                        @if($dataMail['orginal_form']->include_data)
                            {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.admin_line_1') !!}
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary data-form">
                                <thead class="data-form">
                                    <tr>
                                        <td>{{ trans('rafy-mora.formbuilder-field::formbuilder.emails.thead.label') }}</td>
                                        <td>{{ trans('rafy-mora.formbuilder-field::formbuilder.emails.thead.value') }}</td>
                                    </tr>
                                </thead>
                                <tbody class="data-form">
                                    @foreach ($dataMail['content_form'] as $field)
                                        @if($field->type == 'hidden')
                                            @continue
                                        @elseif($field->type == 'checkbox-group')
                                            <tr>
                                                <td>{{ $field->label }}: </td>
                                                <td>
                                                    <ul>
                                                        @if(!empty($field->userData[0]))
                                                            @foreach ($field->userData[0] as $userData)
                                                                <li>{{ $userData }}</li>
                                                            @endforeach
                                                        @else
                                                            <p>{{ trans('rafy-mora.formbuilder-field::formbuilder.emails.no_data') }}</p>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $field->label ?? null }}: </td>
                                                <td>{{ $field->userData[0] ?? trans('rafy-mora.formbuilder-field::formbuilder.emails.no_data') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if($dataMail['orginal_form']->in_database)
                            {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.user_data_saved', ["url_admin" => url(config('backpack.base.home_link') . config('backpack.base.route_prefix'))]) !!}
                        @endif

                        @if($dataMail['orginal_form']->copy_user && empty($dataMail['error_mail_user']))
                            {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.user_notif_sent') !!}
                        @endif
                        @if(!empty($dataMail['error_mail_user']))
                            {!! $dataMail['error_mail_user'] !!}
                        @endif

                        {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.signature', ['app_name' => config('app.name'), 'url_site' => url(config('app.url'))]) !!}
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block powered-by">
                    @if (config('backpack.base.developer_link') && config('backpack.base.developer_name'))
                            {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" rel="noopener" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
                        @endif
                        @if (config('backpack.base.show_powered_by'))
                            {{ trans('backpack::base.powered_by') }} <a target="_blank" rel="noopener" href="http://backpackforlaravel.com">Backpack for Laravel</a>.
                        @endif
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
@endsection