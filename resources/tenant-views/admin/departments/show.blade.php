@extends('layouts.admin')
@section('pageTitle',__('admin.departments'))

@section('innerTitle')
    {{  ucfirst(__('site.department')) }} : {{ $department->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/departments') }}">@lang('admin.departments')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">{{  ucfirst(__('site.department')) }}</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/departments') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                        <a href="{{ url('/admin/departments/' . $department->id . '/edit') }}" title="@lang('admin.edit') @lang('admin.department')"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                        <form method="POST" action="{{ url('admin/departments' . '/' . $department->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title=" @lang('admin.delete') @lang('admin.department')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>  @lang('admin.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>@lang('admin.id')</th><td>{{ $department->id }}</td>
                                </tr>
                                <tr><th> @lang('admin.name') </th><td> {{ $department->name }} </td></tr><tr><th> @lang('admin.description') </th><td> {!! clean( $department->description) !!} </td></tr>

                                <tr>
                                    <th>@lang('admin.categories')</th>
                                    <td>
                                        <ul>
                                        @foreach($department->categories as $category)
                                                <li>{{ $category->name }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr><th> @lang('admin.enroll-open') </th><td> {{ boolToString($department->enroll_open) }} </td></tr>
                                @if($department->picture)
                                <tr>
                                    <th>@lang('admin.picture')</th>
                                    <td>
                                        <img src="{{ asset($department->picture) }}" style="max-width: 300px" />
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <th>@lang('admin.enabled')</th>
                                    <td>{{ boolToString($department->enabled) }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('admin.visibility')</th>
                                    <td>{{ (!empty($department->visible)? __('admin.public'):__('admin.private')) }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('admin.approval-required')</th>
                                    <td>{{ boolToString($department->approval_required) }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('admin.show-members')</th>
                                    <td>{{ boolToString($department->show_members) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.allow-communicate')</th>
                                    <td>{{ boolToString($department->allow_members_communicate) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.enable-forum')</th>
                                    <td>{{ boolToString($department->enable_forum) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.allow-create-topics')</th>
                                    <td>{{ boolToString($department->allow_members_create_topics) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.enable-roster')</th>
                                    <td>{{ boolToString($department->enable_roster) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.enable-announcements')</th>
                                    <td>{{ boolToString($department->enable_announcements) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.enable-resources')</th>
                                    <td>{{ boolToString($department->enable_resources) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.allow-members-upload')</th>
                                    <td>{{ boolToString($department->allow_members_upload) }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('admin.enable-blog')</th>
                                    <td>{{ boolToString($department->enable_blog) }}</td>
                                </tr> <tr>
                                    <th>@lang('admin.allow-members-post')</th>
                                    <td>{{ boolToString($department->allow_members_post) }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection