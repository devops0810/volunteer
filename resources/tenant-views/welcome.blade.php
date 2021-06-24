@extends('layouts.site')
@section('pageTitle',setting('general_homepage_title'))
@section('innerTitle',setting('general_homepage_title'))

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">
@if(!empty(setting('general_homepage_intro')))
            <div class="row"  style="margin-left: 0px;margin-right: 0px; margin-bottom: 20px">
                <div class="col-md-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert-title dropzone-custom-sys" style="text-align: left">
                            {!! clean( setting('general_homepage_intro')) !!}
                        </div>
                    </div>
                </div>
            </div>

    @endif
        @guest
        <div class="row" style="margin-left: 0px;margin-right: 0px; margin-bottom: 50px">

            <div class="col-md-6 col-md-offset-3">
                <div class="single-pro-review-area mt-t-30 mg-b-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-payment-inner-st">
                                    <ul id="myTabedu1" class="tab-review-design">
                                        <li class="active"><a href="#description">@lang('site.login')</a></li>
                                        @if(setting('general_enable_registration')==1)
                                        <li><a href="#reviews"> @lang('site.register')</a></li>
                                            @endif
                                    </ul>
                                    <div id="myTabContent" class="tab-content custom-product-edit">
                                        <div class="product-tab-list tab-pane fade active in" id="description">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="review-content-section">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="devit-card-custom">
                                                                    <div class="form-group">
                                                                        <input id="login_email"  type="text" placeholder="@lang('site.email')" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                        @error('email')
                                                                        <p class="help-block" >
                                                                            <strong>{{ $message }}</strong>
                                                                        </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input id="login_password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('site.password')">

                                                                        @error('password')
                                                                        <p class="help-block" >
                                                                            <strong>{{ $message }}</strong>
                                                                        </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">



                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                                <label class="form-check-label" for="remember">
                                                                                    @lang('site.remember-me')
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('site.login')</button>

                                                                    @if (Route::has('password.request'))
                                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                            @lang('site.forgot-password')
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>

                                        </div>
                                        @if(setting('general_enable_registration')==1)
                                        <div class="product-tab-list tab-pane fade" id="reviews">

                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="review-content-section">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="devit-card-custom">

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


                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('site.register')</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </form>

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        @endguest
        <div class="row"  style="margin-left: 0px;margin-right: 0px;">
            <div class="col-md-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert-title dropzone-custom-sys">
                        <h2>@lang('site.departments') @if(request('search')): {{ request('search') }} @endif</h2>
                        <p>@lang('site.dept-info')</p>
                        @if(false)
                        <div style="text-align: right">

                        </div>
                            @endif

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9"><h3></h3></div>
                        <div class="col-md-3" style="padding-left: 50px; padding-top: 10px;padding-bottom: 10px">
                            <form role="search" class="sr-input-func" method="get" action="{{ route('site.departments') }}">
                                <input value="{{ request('search') }}" type="text" placeholder="Search..." class="search-int form-control" name="search">
                                <a href="#"><i class="fa fa-search"></i></a>
                            </form>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($departments as $department)
                            @include('site.partials.department')
                        @endforeach
                    </div>
                    <div style="text-align: center">
                        <a class="btn btn-lg btn-success" href="{{ route('site.departments') }}">@lang('site.all-departments')</a>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/build/css/intlTelInput.css') }}">

    <style>
        .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags.png') }}");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags@2x.png') }}");}
        }



    </style>
@endsection

@section('footer')
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
@endsection