@extends('layouts.admin-page')

@section('pageTitle',__('saas.edit').' '.__('saas.invoice').' #'.$invoice->id)
@section('page-title',__('saas.edit').' '.__('saas.invoice').' #'.$invoice->id)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <a href="{{ url('/admin/invoices') }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <br />
                        <br />



                        <form method="POST" action="{{ url('/admin/invoices/' . $invoice->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.invoices.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.invoices.form-logic')

