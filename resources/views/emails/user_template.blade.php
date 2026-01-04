@extends('rafy-mora.formbuilder-field::emails.layout')

@section('content_fb_email')
<span class="preheader">{!! trans('rafy-mora.formbuilder-field::formbuilder.emails.message_user', ['app_name' => config('app.name')]) !!}</span>
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
                        {{-- <p><br></p> it's empty field for summernote TODO change that --}}
                        @if(!empty($dataMail['orginal_form']->message_user) && $dataMail['orginal_form']->message_user != '<p><br></p>')
                            {!! $dataMail['orginal_form']->message_user !!}
                        @else
                            {!! trans('rafy-mora.formbuilder-field::formbuilder.emails.message_user', ['app_name' => config('app.name')]) !!}
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