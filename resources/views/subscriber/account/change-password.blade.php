@extends('layouts.account-page')
@section('pageTitle','Change Password')
@section('page-content')

    <div class="card-box">
        <form id="form-change-password" role="form" method="POST" action="{{ route('account.update-password') }}" novalidate class="form-horizontal">
            <div class="col-md-9">
                <label for="current-password" class="col-sm-4 control-label">Current Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                    </div>
                </div>
                <label for="password" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </form>
    </div>

    @endsection