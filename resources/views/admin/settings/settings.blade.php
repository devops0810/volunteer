@extends('layouts.admin-page')
@section('pageTitle',__("admin.setting-".$group))

@section('pageTitle',__('saas.create-new').' '.__('saas.plan'))
@section('page-title',__("admin.setting-".$group))

@section('page-content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <form method="POST" action="{{ route('admin.save-settings') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($settings as $setting)
                        <div class="form-group">
                            <label for="{{ $setting->key }}">@lang('settings.'.$setting->key)</label>
                            @if($setting->type=='text')

                                <input placeholder="{{ $setting->placeholder }}" @if(empty($setting->class)) class="form-control" @else class="{{ $setting->class }}"@endif type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"/>
                                
                                @elseif($setting->type=='textarea')

                                <textarea placeholder="{{ $setting->placeholder }}"  @if(empty($setting->class)) class="form-control" @else class="{{ $setting->class }}" @endif  name="{{ $setting->key }}" id="{{ $setting->key }}">{!!  $setting->value !!}</textarea>
                            
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
                                {{ Form::select($setting->key,$foptions,$setting->value,['placeholder' => $setting->placeholder,'class'=>$class]) }}


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
                                
                                @elseif($setting->type='image')

                                    @if(!empty($setting->value))
                                    <img class="img-responsive" src="{{ asset($setting->value) }}" style="max-width: 300px"/>
                                    <br/>
                                    <a class="btn btn-danger" href="{{ route('admin.remove-picture',['setting'=>$setting->id]) }}">@lang('admin.remove-picture')</a>
                                    <br/><br/>
                                        @endif

                                <input type="file" name="{{ $setting->key }}"/>
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