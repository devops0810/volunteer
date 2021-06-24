@extends('layouts.admin-page')

@section('pageTitle',__('saas.blog-post').' :'.$blogpost->title)
@section('page-title',__('saas.blog-post').' :'.$blogpost->title)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/blog-posts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/blog-posts/' . $blogpost->id . '/edit') }}" title="Edit blogPost"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/blogposts' . '/' . $blogpost->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') blogPost" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $blogpost->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.title') </th><td> {{ $blogpost->title }} </td></tr><tr><th> @lang('saas.content') </th><td> {!! clean($blogpost->content) !!} </td></tr>
                                    <tr>
                                        <th>@lang('saas.enabled')</th>
                                        <td>{{ boolToString($blogpost->status) }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.cover-image')</th>
                                        <td>
                                            @if(!empty($blogpost->cover_image))
                                                <img src="{{ asset($blogpost->cover_image) }}" />
                                                @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.created-by')</th>
                                        <td>
                                            @if($blogpost->user()->exists())
                                            {{ $blogpost->user->name }}
                                                @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.meta-title')</th>
                                        <td>
                                            {{ $blogpost->meta_title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.meta-description')</th>
                                        <td>
                                            {{ $blogpost->meta_description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.categories')</th>
                                        <td>
                                            <ul>
                                            @foreach($blogpost->blogCategories as $category)
                                                <li>{{ $category->category }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>


                                    <tr><th> @lang('saas.published-on')</th><td> {{ $blogpost->published_on }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
