@extends('layouts.site')
@section('pageTitle',__('admin.profile'))

@section('innerTitle')
   @lang('admin.profile')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li> 
    <li><span class="bread-blod">@lang('admin.profile')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <form id="sendForm" method="post" action="{{ route('account.save-profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name" class="control-label">@lang('admin.name')</label>
                        <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($user->name) ? $user->name : '') }}" >
                        {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">@lang('admin.email')</label>
                        <input  required class="form-control" name="email" type="text" id="email" value="{{ old('email',isset($user->email) ? $user->email : '') }}" >
                        {!! clean( $errors->first('email', '<p class="help-block">:message</p>')) !!}
                    </div>

                    <div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
                        <label for="telephone" class="control-label">@lang('admin.telephone')</label>
                        <input  class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone',isset($user->telephone) ? $user->telephone : '') }}" >
                        {!! clean( $errors->first('telephone', '<p class="help-block">:message</p>')) !!}
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                        <label for="gender" class="control-label">@lang('admin.gender')</label>
                        <select required  name="gender" class="form-control" id="gender" required>
                            <option></option>
                            @foreach (json_decode('{"m":"'.__('admin.male').'","f":"'.__('admin.female').'"}', true) as $optionKey => $optionValue)
                                <option value="{{ $optionKey }}" {{ ((null !== old('gender',@$user->gender)) && old('gender',@$user->gender) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                            @endforeach
                        </select>
                        {!! clean( $errors->first('gender', '<p class="help-block">:message</p>')) !!}
                    </div>
                    <div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
                        <label for="about" class="control-label">@lang('admin.about')</label>
                        <textarea class="form-control" rows="5" name="about" type="textarea" id="about" >{{ old('about',isset($user->about) ? $user->about : '') }}</textarea>
                        {!! clean( $errors->first('about', '<p class="help-block">:message</p>')) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
                                <label for="picture" class="control-label">@lang('admin.change') @lang('admin.picture')</label>


                                <input class="form-control" name="picture" type="file" id="picture" value="{{ isset($user->picture) ? $user->picture : ''}}" >
                                {!! clean( $errors->first('picture', '<p class="help-block">:message</p>')) !!}
                            </div>

                        </div>
                        <div class="col-md-6">
                            @if(!empty($user->picture))

                                <div><img src="{{ asset($user->picture) }}" style="max-width: 300px" /></div> <br/>
                                <a onclick="return confirm('@lang('admin.delete-prompt')')" class="btn btn-danger" href="{{ route('account.remove-picture') }}"><i class="fa fa-trash"></i> @lang('admin.delete') @lang('admin.picture')</a>

                            @endif
                        </div>
                    </div>




                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{{  __('site.update') }}">
                    </div>


                </form>




            </div>
        </div>


    </div>

@endsection
