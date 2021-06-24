@extends('layouts.site')
@section('pageTitle',__('site.application').': '.$department->name)
@section('innerTitle',__('site.application').': '.$department->name)

@section('breadcrumb')
    <li><a href="{{ route('site.home') }}">@lang('site.home')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ route('site.departments') }}">@lang('site.departments')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">{{ ucfirst(__('site.apply')) }}</span>
    </li>
@endsection

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">

        <div class="row" style="margin-left: 0px;margin-right: 0px; margin-bottom: 50px">

            <div class="col-md-6 col-md-offset-3">
                <div class="single-pro-review-area mt-t-30 mg-b-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-payment-inner-st">
                                    <form method="POST" action="{{ route('site.save-application',['department'=>$department->id]) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="devit-card-custom">

                                                                @foreach($fields as $field)
                                                                    @php
                                                                    if(isset($user)){
                                                                    $value = old($field->id,($user->departmentFields()->where('department_field_id',$field->id)->first()) ? $user->departmentFields()->where('department_field_id',$field->id)->first()->pivot->value:'');

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


                                                                <button type="submit" class="btn btn-lg btn-primary btn-block waves-effect waves-light">@lang('site.apply')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>


@endsection