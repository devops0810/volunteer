<!doctype html>
<html class="no-js') }}" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@lang('site.register')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    @if($icon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($icon) }}">
        @endif
                <!-- Google Fonts
		============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/bootstrap.min.css') }}">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/font-awesome.min.css') }}">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/main/css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/main/css/owl.transitions.css') }}">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/animate.css') }}">
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/normalize.css') }}">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/main.css') }}">
        <!-- morrisjs CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/morrisjs/morris.css') }}">
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
        <!-- metisMenu CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/metisMenu/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/main/css/metisMenu/metisMenu-vertical.css') }}">
        <!-- calendar CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/calendar/fullcalendar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/main/css/calendar/fullcalendar.print.min.css') }}">
        <!-- forms CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/form/all-type-forms.css') }}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/style.css') }}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{ asset('themes/main/css/responsive.css') }}">
        <!-- modernizr JS
            ============================================ -->
        <script src="{{ asset('themes/main/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <style>
            #loginForm{
                text-align: left;
            }
        </style>



        <link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/build/css/intlTelInput.css') }}">

        <style>
            .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags.png') }}");}

            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags@2x.png') }}");}
            }



        </style>

        {!! clean( setting('general_header_scripts')) !!}

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">@lang('site.upgrade-browser')</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            @if($logo)
                <a href="{{ route('site.home') }}"><img style="max-width:200px; max-height: 55px;" class="main-logo" src="{{ asset($logo) }}"  /></a>
            @endif
            <h3 style="margin-top: 30px">@lang('site.register')</h3>

            <p></p>
        </div>
        <div>
            <div class="hpanel">
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div style="padding-left:50px; padding-right:50px">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('register') }}" id="loginForm">
                    @csrf

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">@lang('admin.name')</label>
                            <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($member->name) ? $member->name : '') }}" >
                            {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="control-label">@lang('admin.email')</label>
                            <input  required class="form-control" name="email" type="text" id="email" value="{{ old('email',isset($member->email) ? $member->email : '') }}" >
                            {!! clean( $errors->first('email', '<p class="help-block">:message</p>')) !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label for="password" class="control-label">@lang('admin.password')

                            </label>
                            <input  class="form-control" name="password" type="password" id="password" value="{{ old('password')  }}" >
                            {!! clean( $errors->first('password', '<p class="help-block">:message</p>')) !!}
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                            <label for="password" class="control-label">@lang('admin.confirm-password')

                            </label>
                            <input  class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ old('password_confirmation')  }}" >
                            {!! clean( $errors->first('password_confirmation', '<p class="help-block">:message</p>')) !!}
                        </div>


                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
                            <label for="telephone" class="control-label">@lang('admin.telephone')</label>
                           <div>
                               <input  class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone',isset($member->telephone) ? $member->telephone : '') }}" >

                           </div>

                            {!! clean( $errors->first('telephone', '<p class="help-block">:message</p>')) !!}
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                            <label for="gender" class="control-label">@lang('admin.gender')</label>
                            <select required  name="gender" class="form-control" id="gender" required>
                                <option></option>
                                @foreach (json_decode('{"m":"'.__('admin.male').'","f":"'.__('admin.female').'"}', true) as $optionKey => $optionValue)
                                    <option value="{{ $optionKey }}" {{ ((null !== old('gender',@$member->gender)) && old('gender',@$member->gender) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                @endforeach
                            </select>
                            {!! clean( $errors->first('gender', '<p class="help-block">:message</p>')) !!}
                        </div>


                        @foreach(\App\Field::where('enabled',1)->orderBy('sort_order','asc')->get() as $field)
                            @php
                            if(isset($member)){
                            $value = old($field->id,($member->fields()->where('field_id',$field->id)->first()) ? $member->fields()->where('field_id',$field->id)->first()->pivot->value:'');

                            }
                            else{
                            $value='';
                            }
                            @endphp
                            @if($field->type=='text')
                                <div class="form-group{{ $errors->has('field_'.$field->id) ? ' has-error' : '' }}">
                                    <label for="{{ 'field_'.$field->id }}">{{ $field->name }}:</label>
                                    <input placeholder="{{ $field->placeholder }}" @if(!empty($field->required))required @endif  type="text" class="form-control" id="{{ 'field_'.$field->id }}" name="{{ 'field_'.$field->id }}" value="{{ $value }}">
                                    @if ($errors->has('field_'.$field->id))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('field_'.$field->id) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @elseif($field->type=='select')
                                <div class="form-group{{ $errors->has('field_'.$field->id) ? ' has-error' : '' }}">
                                    <label for="{{ 'field_'.$field->id }}">{{ $field->name }}:</label>
                                    <?php
                                    $options = nl2br($field->options);
                                    $values = explode('<br />',$options);
                                    $selectOptions = [];
                                    foreach($values as $value2){
                                        $selectOptions[$value2]=trim($value2);
                                    }
                                    ?>
                                    {{ Form::select('field_'.$field->id, $selectOptions,$value,['placeholder' => $field->placeholder,'class'=>'form-control']) }}
                                    @if ($errors->has('field_'.$field->id))
                                        <span class="help-block">
                                                                                        <strong>{{ $errors->first('field_'.$field->id) }}</strong>
                                                                                    </span>

                                    @endif
                                </div>
                            @elseif($field->type=='textarea')
                                <div class="form-group{{ $errors->has('field_'.$field->id) ? ' has-error' : '' }}">
                                    <label for="{{ 'field_'.$field->id }}">{{ $field->name }}:</label>
                                    <textarea placeholder="{{ $field->placeholder }}" class="form-control" name="{{ 'field_'.$field->id }}" id="{{ 'field_'.$field->id }}" @if(!empty($field->required))required @endif  >{{ $value }}</textarea>
                                    @if ($errors->has('field_'.$field->id))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('field_'.$field->id) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @elseif($field->type=='checkbox')
                                <div class="checkbox">
                                    <label>
                                        <input name="{{ 'field_'.$field->id }}" type="checkbox" value="1" @if($value==1) checked @endif> {{ $field->name }}
                                    </label>
                                </div>

                            @elseif($field->type=='radio')
                                <?php
                                $options = nl2br($field->options);
                                $values = explode('<br />',$options);
                                $radioOptions = [];
                                foreach($values as $value3){
                                    $radioOptions[$value3]=trim($value3);
                                }
                                ?>
                                <h5><strong>{{ $field->name }}</strong></h5>
                                @foreach($radioOptions as $value2)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" @if($value==$value2) checked @endif  name="{{ 'field_'.$field->id }}" id="{{ 'field_'.$field->id }}-{{ $value2 }}" value="{{ $value2 }}" >
                                            {{ $value2 }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif


                        @endforeach



                        <button class="btn btn-success btn-block loginbtn" type="submit">@lang('site.register')</button>
                        <br/>
                        <a class="btn btn-default btn-block" href="{{ route('login') }}">@lang('site.login')</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p><a href="{{ route('site.home') }}">{{ setting('general_site_name') }}</a></p>
        </div>
    </div>
</div>
<!-- jquery
    ============================================ -->
<script src="{{ asset('themes/main/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ asset('themes/main/js/bootstrap.min.js') }}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ asset('themes/main/js/wow.min.js') }}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ asset('themes/main/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ asset('themes/main/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('themes/main/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ asset('themes/main/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('themes/main/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- tab JS
    ============================================ -->
<script src="{{ asset('themes/main/js/tab.js') }}"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ asset('themes/main/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('themes/main/js/icheck/icheck-active.js') }}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ asset('themes/main/js/plugins.js') }}"></script>
<!-- main JS
    ============================================ -->
<script src="{{ asset('themes/main/js/main.js') }}"></script>



    <script src="{{ asset('vendor/intl-tel-input/build/js/intlTelInput.js') }}"></script>

    <script>


        $("input[name=telephone]").intlTelInput({
            initialCountry: "auto",
            separateDialCode:true,
            hiddenInput:'f_telephone',
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "{{ asset('vendor/intl-tel-input/build/js/utils.js') }}" // just for formatting/placeholders etc
        });
    </script>

{!! clean( setting('general_footer_scripts')) !!}

</body>

</html>