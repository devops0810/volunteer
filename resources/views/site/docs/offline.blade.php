@extends('layouts.doc')
@section('pageTitle','Offline Documentation')
@section('content')

    <div>
        <p>
            Download the latest version of our documentation in PDF format here.
        </p>
        <form method="post" class="form" action="{{ route('docs.download') }}">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Download</button>
        </form>
    </div>
@endsection
@section('breadcrumb')
    <li><a href="{{ route('docs.index') }}">Table Of Contents</a></li>
    <li class="active">Offline Documentation</li>

@endsection