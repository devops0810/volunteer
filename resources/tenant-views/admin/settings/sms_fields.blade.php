@extends('layouts.admin')
@section('pageTitle',__('admin.edit').' '.$smsGateway->gateway_name)

@section('innerTitle')
    {{ __('admin.edit').' '.$smsGateway->gateway_name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('settings.sms_gateways') }}">@lang('admin.sms-settings')</a> <span class="bread-slash">/</span></li>
    <li><span class="bread-blod">{{ __('admin.edit').' '.$smsGateway->gateway_name  }}</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <form method="POST" action="{{ route('settings.save-sms-gateway',['smsGateways'=>$smsGateway->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($smsGateway->smsGatewayFields()->orderBy('sort_order')->get() as $field)
                        <div class="form-group">
                            <label for="{{ $field->key }}">@lang('sms_'.$smsGateway->code.'.'.$field->key)</label>
                            @if($field->type=='text')

                                <input placeholder="{{ $field->placeholder }}" @if(empty($field->class)) class="form-control" @else class="{{ $field->class }}"@endif type="text" name="{{ $field->key }}" value="{{ $field->value }}"/>

                            @elseif($field->type=='textarea')

                                <textarea placeholder="{{ $field->placeholder }}"  @if(empty($field->class)) class="form-control" @else class="{{ $field->class }}" @endif  name="{{ $field->key }}" id="{{ $field->key }}">{!! clean( $field->value) !!}</textarea>

                            @elseif($field->type=='select')
                                <?php



                                if(!empty($field->options)){
                                    $options = explode(',',$field->options);
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







                                if(empty($field->class)){
                                    $class = 'form-control';
                                }
                                else{
                                    $class = $field->class;
                                }
                                ?>
                                {{ Form::select($field->key,$foptions,$field->value,['placeholder' => $field->placeholder,'class'=>$class]) }}


                            @elseif($field->type=='radio')

                                <?php


                                if(!empty($field->options)){
                                    $options = explode(',',$field->options);
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
                                            <input type="radio" @if($field->value==$key2) checked @endif  name="{{ $field->key }}" id="{{ $field->key }}" value="{{ $key2 }}" >
                                            {{ $value2 }}
                                        </label>
                                    </div>
                                @endforeach

                            @elseif($field->type='image')

                                @if(!empty($field->value))
                                    <img class="img-responsive" src="{{ asset($field->value) }}" style="max-width: 300px"/>
                                    <br/>
                                    <a class="btn btn-danger" href="{{ route('settings.remove-picture',['setting'=>$field->id]) }}">@lang('admin.remove-picture')</a>
                                    <br/><br/>
                                @endif

                                <input type="file" name="{{ $field->key }}"/>
                            @endif

                        </div>

                    @endforeach
                    <button class="btn btn-primary btn-block btn-lg" type="submit">@lang('admin.save')</button>
                </form>




            </div>
        </div>


    </div>

@endsection


@section('footer')
    <script src="{{ asset('themes/main/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('themes/main/js/summernote/summernote-active.js') }}"></script>

@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('themes/main/css/summernote/summernote.css') }}">
@endsection