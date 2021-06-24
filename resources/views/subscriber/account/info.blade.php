@extends('layouts.account-page')
@section('pageTitle','Account Info')
@section('page-content')

    <div class="card-box">

        <form method="post" class="form"  action="{{ route('account.saveinfo') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" required="required" type="text"  class="form-control" value="{{ old('name',$name) }}"/>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" required="required"  class="form-control" type="email" value="{{ old('email',$email) }}"/>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" required="required" type="text"  class="form-control" value="{{ old('username',$username) }}"/>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    @endsection