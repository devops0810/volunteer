@extends('layouts.admin-page')

@section('pageTitle',__('saas.create-new').' '.__('saas.domain'))
@section('page-title',__('saas.create-new').' '.__('saas.domain').': '.$website->subscriber->user->name)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="{{ route('admin.hostnames.index',['website'=>$website->id]) }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <br />
                        <br />


                        <form method="POST" action="{{ route('admin.hostnames.store',['website'=>$website->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.hostnames.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
