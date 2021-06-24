@extends('layouts.admin-page')

@section('pageTitle',$title)
@section('page-title',$title)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <a href="{{ route('admin.payment-methods') }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <br />
                        <br />



                        <form method="POST" action="{{ route('admin.payment-methods.update',['paymentMethod'=>$paymentMethod->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                            {{ csrf_field() }}
                        @foreach($paymentMethod->paymentMethodFields as $setting)
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">@lang('saas.'.$setting->key)</label>
                                    @if($setting->type=='text')

                                        <input  @if(empty($setting->class)) class="form-control" @else class="{{ $setting->class }}"@endif type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"/>

                                    @elseif($setting->type=='textarea')

                                        <textarea   @if(empty($setting->class)) class="form-control" @else class="{{ $setting->class }}" @endif  name="{{ $setting->key }}" id="{{ $setting->key }}">{!! clean($setting->value) !!}</textarea>

                                    @elseif($setting->type=='select')
                                        <?php



                                        if(!empty($setting->options)){
                                            $options = explode(',',$setting->options);
                                            $foptions = [];

                                            foreach($options as $option){
                                                if(preg_match('#=#',$option)) {
                                                    $temp = explode('=', $option);
                                                    $foptions[$temp[0]] = $temp[1];
                                                }
                                                else{
                                                    $foptions[$option]=$option;
                                                }

                                            }

                                        }
                                        else{
                                            $foptions=[];
                                        }







                                        if(empty($setting->class)){
                                            $class = 'form-control';
                                        }
                                        else{
                                            $class = $setting->class;
                                        }
                                        ?>
                                        {{ Form::select($setting->key,$foptions,$setting->value,['class'=>$class]) }}


                                    @elseif($setting->type=='radio')

                                        <?php


                                        if(!empty($setting->options)){
                                            $options = explode(',',$setting->options);
                                            $foptions = [];

                                            foreach($options as $option){
                                                if(preg_match('#=#',$option)) {
                                                    $temp = explode('=', $option);
                                                    $foptions[$temp[0]] = $temp[1];
                                                }
                                                else{
                                                    $foptions[$option]=$option;
                                                }

                                            }

                                        }
                                        else{
                                            $foptions=[];
                                        }
                                        ?>

                                        @foreach($foptions as $key2=>$value2)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" @if($setting->value==$key2) checked @endif  name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $key2 }}" >
                                                    {{ $value2 }}
                                                </label>
                                            </div>
                                        @endforeach


                                    @endif

                                </div>


                            @endforeach

                            <div class="form-group">
                                <label for="method_label">@lang('saas.label')</label>
                                <input class="form-control" type="text" name="method_label" value="{{ old('method_label',$paymentMethod->method_label) }}"/>
                            </div>

                            <div class="form-group">
                                <label for="sort_order">@lang('saas.sort-order')</label>
                                <input class="form-control" type="text" name="sort_order" value="{{ old('sort_order',$paymentMethod->sort_order) }}"/>
                            </div>

                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="status" class="control-label">@lang('saas.enabled')</label>
                                <select name="status" class="form-control" id="status" >
                                    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}" {{ ((null !== old('status',@$paymentMethod->status)) && old('status',@$paymentMethod->status) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>
                                {!! clean( $errors->first('status', '<p class="help-block">:message</p>')) !!}
                            </div>

                            <div class="form-group {{ $errors->has('is_global') ? 'has-error' : ''}}">
                                <label for="is_global" class="control-label">@lang('saas.global')?</label>
                                <select name="is_global" class="form-control" id="is_global" >
                                    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}" {{ ((null !== old('is_global',@$paymentMethod->is_global)) && old('is_global',@$paymentMethod->is_global) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>
                                {!! clean( $errors->first('is_global', '<p class="help-block">:message</p>')) !!}
                            </div>

                            <div class="form-group currency_list">
                                <label for="currencies">@lang('saas.currencies')</label>

                                <select multiple name="currencies[]" id="currencies" class="form-control select2">
                                    <option></option>
                                    @foreach(\App\Models\Currency::get() as $currency)
                                        <option  @if( (is_array(old('currencies')) && in_array(@$currency->id,old('currencies')))  || (null === old('currencies')  && $paymentMethod->currencies()->where('currency_id',$currency->id)->first() ))
                                            selected
                                            @endif
                                            value="{{ $currency->id }}">{{ $currency->country->currency_name }} ({{ $currency->country->currency_code }})</option>
                                    @endforeach
                                </select>



                            </div>

                            <button class="btn btn-primary btn-block" type="submit">@lang('saas.save')</button>
                        </form>

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
    <script>

        $(function(){
            $('select').select2();
        });

        function toogleOptions(){

            if($('#is_global').val()=='0'){
                $('.currency_list').show();
                console.log('not free');
            }
            else{
                $('.currency_list').hide();
                console.log('is free');
            }
        }

        $(function(){
            toogleOptions();
            $('#is_global').change(function(){
                toogleOptions();
            })
        })
    </script>
@endsection