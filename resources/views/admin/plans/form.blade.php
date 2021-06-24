<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">@lang('saas.details')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">@lang('saas.payment-settings')</a>
    </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane container active" id="home" style="padding-top: 30px">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">@lang('saas.name')</label>
            <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($plan->name) ? $plan->name : '') }}" >
            {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
        </div>

        <div class="form-group {{ $errors->has('storage_space') ? 'has-error' : ''}}">
            <label for="storage_space" class="control-label">@lang('saas.storage-space')</label>
            <div class="row" style="margin-left:0px; margin-right: 0px" >
                <input placeholder="@lang('saas.numbers-only')" class="form-control col-md-6 digit" name="storage_space" type="text" id="storage_space" value="{{ old('storage_space',isset($plan->storage_space) ? $plan->storage_space : '') }}" >
                <select class="form-control col-md-6" name="storage_unit" id="storage_unit">
                    @foreach(['mb'=>'MB','gb'=>'GB','tb'=>'TB'] as $unit=>$label)
                        <option @if( old('storage_unit',isset($plan->storage_unit) ? $plan->storage_unit : '')==$unit) selected @endif value="{{ $unit }}" >{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            {!! clean( $errors->first('storage_space', '<p class="help-block">:message</p>')) !!}

            <p class="help-block">@lang('saas.unlimited-msg')</p>
        </div>
        <div class="form-group {{ $errors->has('user_limit') ? 'has-error' : ''}}">
            <label for="user_limit" class="control-label">@lang('saas.user-limit')</label>
            <input placeholder="@lang('saas.numbers-only')"  class="form-control number" name="user_limit" type="text" id="user_limit" value="{{ old('user_limit',isset($plan->user_limit) ? $plan->user_limit : '') }}" >
            {!! clean( $errors->first('user_limit', '<p class="help-block">:message</p>')) !!}
            <p class="help-block">@lang('saas.unlimited-msg')</p>
        </div>
        <div class="form-group {{ $errors->has('department_limit') ? 'has-error' : ''}}">
            <label for="department_limit" class="control-label">@lang('saas.department-limit')</label>
            <input placeholder="@lang('saas.numbers-only')"  class="form-control number" name="department_limit" type="text" id="department_limit" value="{{ old('department_limit',isset($plan->department_limit) ? $plan->department_limit : '') }}" >
            {!! clean( $errors->first('department_limit', '<p class="help-block">:message</p>')) !!}
            <p class="help-block">@lang('saas.unlimited-msg')</p>
        </div>
        <div class="form-group {{ $errors->has('public') ? 'has-error' : ''}}">
            <label for="public" class="control-label">@lang('saas.visibility')</label>
            <select name="public" class="form-control" id="public" >
                @foreach (json_decode('{"1":"'.__('saas.public').'","0":"'.__('saas.private').'"}', true) as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}" {{ ((null !== old('public',@$plan->public)) && old('plan',@$plan->public) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>
            {!! clean( $errors->first('public', '<p class="help-block">:message</p>')) !!}
        </div>
        <div class="form-group {{ $errors->has('public') ? 'has-error' : ''}}">
            <label for="is_free" class="control-label">@lang('saas.is-free')</label>
            <select name="is_free" class="form-control" id="is_free" >
                @foreach (json_decode('{"0":"'.__('saas.no').'","1":"'.__('saas.yes').'"}', true) as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}" {{ ((null !== old('is_free',@$plan->is_free)) && old('is_free',@$plan->is_free) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>
            {!! clean( $errors->first('public', '<p class="help-block">:message</p>')) !!}
        </div>


        <div class="amount form-group {{ $errors->has('monthly_price') ? 'has-error' : ''}}">
            <label for="monthly_price" class="control-label">@lang('saas.monthly-price')</label>
            <input placeholder="@lang('saas.numbers-only')"  class="form-control digit" name="monthly_price" type="text" id="monthly_price" value="{{ old('monthly_price',isset($monthly_price) ? $monthly_price : '') }}" >
            {!! clean( $errors->first('monthly_price', '<p class="help-block">:message</p>')) !!}
        </div>

        <div class="amount form-group {{ $errors->has('annual_price') ? 'has-error' : ''}}">
            <label for="annual_price" class="control-label">@lang('saas.annual-price')</label>
            <input placeholder="@lang('saas.numbers-only')"  class="form-control digit" name="annual_price" type="text" id="annual_price" value="{{ old('annual_price',isset($annual_price) ? $annual_price : '') }}" >
            {!! clean( $errors->first('annual_price', '<p class="help-block">:message</p>')) !!}
        </div>

        <div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
            <label for="sort_order" class="control-label">@lang('saas.sort-order')</label>
            <input placeholder="@lang('saas.numbers-only')"  class="form-control number" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($plan->sort_order) ? $plan->sort_order : '') }}" >
            {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
        </div>


    </div>
    <div class="tab-pane container fade" id="menu1"  style="padding-top: 30px">

        <div class="card" style="margin-bottom: 30px">
            <div class="card-body">
                <h5 class="card-title">Stripe</h5>
                <div class="form-group">
                    <label for="stripe_plan_m">@lang('saas.monthly-plan-id')</label>
                    <input class="form-control" type="text" name="stripe_plan_m" id="stripe_plan_m" value="{{ old('strip_plan_m',@$monthlyDuration->stripe_plan) }}"/>
                </div>
                <div class="form-group">
                    <label for="stripe_plan_a">@lang('saas.annual-plan-id')</label>
                    <input class="form-control" type="text" name="stripe_plan_a" id="stripe_plan_a" value="{{ old('strip_plan_m',@$annualDuration->stripe_plan) }}"/>
                </div>
                <p>
                    @lang('saas.webhook-url'): {{ route('webhooks.stripe') }}
                </p>
            </div>

        </div>

        <div class="card" style="margin-bottom: 30px">
            <div class="card-body">
                <h5 class="card-title">Paypal</h5>

                <p>
                    @lang('saas.webhook-url'): {{ route('webhooks.paypal') }}
                </p>
            </div>

        </div>


    </div>


</div>












<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
