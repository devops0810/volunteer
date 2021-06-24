@extends('layouts.account-page')

@section('pageTitle',__('saas.domains'))
@section('page-title',__('saas.domains'))

@section('page-content')

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">@lang('saas.domains')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">@lang('saas.change') @lang('saas.domain')</a>
        </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="home" style="padding-top: 30px">

            <ul>
                @foreach($domains as $domain)
                    <li>{{ $domain->fqdn }}</li>
                    @endforeach
            </ul>

        </div>
        <div class="tab-pane container fade" id="menu1"  style="padding-top: 30px">
            <form action="{{ route('user.domains.save') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="">@lang('saas.username')</label>
                    <input required class="form-control" type="text" name="username" placeholder="@lang('saas.username')"/>
                </div>
<button type="submit" class="btn btn-primary">@lang('saas.save')</button>
            </form>

        </div>


    </div>



@endsection

