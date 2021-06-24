@extends('layouts.admin-page')
@section('pageTitle',__('saas.free-trial'))

@section('page-title')
    @lang('saas.free-trial')
@endsection


@section('page-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">

                    <div  >
                        <div  >



                            <form class="form-inline_" method="post" action="{{ route('admin.save-trial') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="trial_enabled">@lang('saas.enable-trial')</label>
                                    <select class="form-control" name="trial_enabled" id="trial_enabled">
                                        @foreach(['1'=>__('saas.yes'),'0'=>__('saas.no')] as $key=>$value)
                                            <option value="{{ $key }}" @if(old('trial_enabled',setting('trial_enabled'))==$key) selected @endif >{{ $value }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group options">
                                    <label for="trial_package_duration_id">@lang('saas.trial-plan')</label>
                                    <select class="form-control" name="trial_package_duration_id" id="trial_package_duration_id">
                                        <option value=""></option>
                                        @foreach($packages as $package)
                                            <option @if(old('trial_package_duration_id',setting('trial_package_duration_id'))==$package->id) selected @endif value="{{ $package->id }}">{{ $package->package->name }} ({{ ($package->type=='m')? __('saas.monthly'):__('saas.annual') }}) - {{ price($package->price) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group options">
                                    <label for="trial_days">@lang('saas.trial-days')</label>
                                    <input class="form-control number" type="text" name="trial_days" value="{{ old('trail_days',setting('trial_days')) }}"/>
                                </div>
                                
                                
                                
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('select').select2();
        });

        function toogleOptions(){

            if($('#trial_enabled').val()=='1'){
                $('.options').show();
                $('.options select,.options input').attr('required','required');
                console.log('not free');
            }
            else{
                $('.options').hide();
                $('.options select,.options input').removeAttr('required');
                console.log('is free');
            }
        }

        $(function(){
            toogleOptions();
            $('#trial_enabled').change(function(){
                toogleOptions();
            })
        })
    </script>


@endsection

