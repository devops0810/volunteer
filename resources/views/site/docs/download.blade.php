<!DOCTYPE html>
<html>

<body>
<div style="text-align: center">
    <h3>User Guide</h3>
</div>

<h1>@lang('saas.user-guide')</h1>

 <div>
     @foreach(\App\Models\HelpCategory::orderBy('sort_order')->get() as $category)

         <div class="panel panel-color panel-inverse">
             <div class="panel-heading">
                 <h3 class="panel-title">{{ $category->name }}</h3>
             </div>
             <div class="panel-body">
                 <ul class="list-unstyled">
                     @foreach($category->helpPosts()->where('status',1)->orderBy('sort_order')->get(['title','id']) as $post)
                         <li>{{ $post->sort_order }}. {{ $post->title }}</li>
                     @endforeach
                 </ul>
             </div>
         </div>



     @endforeach
 </div>
@foreach(\App\Models\HelpCategory::orderBy('sort_order')->get() as $category)
    <h3 style="border-bottom: solid 1px #cccccc">{{ $category->name }}</h3>
    @foreach($category->helpPosts()->where('status',1)->orderBy('sort_order')->get(['title','id','content']) as $post)
        <h4>{{ $post->title }}</h4>
        <div style="margin-bottom: 200px; border-top: solid 1px #cccccc">
            {!! clean($post->content) !!}
        </div>
    @endforeach
@endforeach
</body>
</html>