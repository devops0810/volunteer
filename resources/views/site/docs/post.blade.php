@extends('layouts.doc')
@section('pageTitle',$post->title)
    @section('content')
        <div>{!! clean($post->content) !!}</div>
        <div class="row">
            <div class="col-xs-6">

                @if($previous)
                <a class="btn btn-primary" href="{{ route('docs.post',['id'=>$previous->id,'slug'=>safeUrl($previous->title)]) }}"><i class="fa fa-chevron-left"></i> Previous</a>
                    <div style="margin-top: 10px"><p><small><a href="{{ route('docs.post',['id'=>$previous->id,'slug'=>safeUrl($previous->title)]) }}">{{ $previous->title }}</a></small></p></div>
                    @endif
            </div>
            <div class="col-xs-6" style=" text-align: right;">

                @if($next)
                    <a class="btn btn-primary" href="{{ route('docs.post',['id'=>$next->id,'slug'=>safeUrl($next->title)]) }}">Next <i class="fa fa-chevron-right"></i></a>

                    <div style="margin-top: 10px; clear: both"><p><small><a href="{{ route('docs.post',['id'=>$next->id,'slug'=>safeUrl($next->title)]) }}">{{ $next->title }}</a></small></p></div>
                @endif
            </div>
        </div>
        <div style="margin-top: 50px">
            @if(!empty(setting('general_disqus_shortcode')))
                <div >
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = '{{ setting('general_disqus_shortcode') }}'; // required: replace example with your forum shortname

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function () {
                            var s = document.createElement('script'); s.async = true;
                            s.type = 'text/javascript';
                            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                        }());
                    </script>
                </div>
            @endif
        </div>

        @endsection
@section('breadcrumb')
    <li><a href="{{ route('docs.index') }}">@lang('saas.docs')</a></li>
     <li class="active">{{ $post->title }}</li>
    @endsection