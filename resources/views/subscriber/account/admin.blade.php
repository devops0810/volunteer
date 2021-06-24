@extends('layouts.account-page')
@section('pageTitle','Create Admin Account')
@section('page-content')

    <div class="card-box">
        <p>
            Create a new Admin/Instructor account on your {{ env('APP_NAME') }} instance. This is useful in a situation where you loose your admin password and can not access the admin account's email for whatever reason.
        </p>
        <form method="post" class="form"  action="{{ route('account.create-admin') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="role">Role</label>

                {{ Form::select('role_id', $roles,old('role_id'),['placeholder' => 'Select an option...','class'=>'form-control','required'=>'required','id'=>'role_id']) }}

            </div>
            <div class="form-group">
                <label for="name">First Name</label>
                <input name="first_name" required="required" type="text"  class="form-control" value="{{ old('first_name') }}"/>
            </div>

            <div class="form-group">
                <label for="name">Last Name</label>
                <input name="last_name" required="required" type="text"  class="form-control" value="{{ old('last_name') }}"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" required="required"  class="form-control" type="email" value="{{ old('email') }}"/>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" required="required" type="password"  class="form-control" value="{{ old('password') }}"/>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


@endsection