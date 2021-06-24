@extends('layouts.account-page')

@section('pageTitle',__('saas.stats'))
@section('page-title',__('saas.stats'))

@section('page-content')

    <div id="stats-box">
        @lang('saas.loading')

    </div>

@endsection

@section('footer')
    <script>
        $('#stats-box').load('{{ route('user.get-stats') }}');
    </script>

    @endsection