<div class="col-md-4 mg-b-15 ">
    <div style="min-height: 500px" class="courses-inner res-mg-b-30">
        <div class="courses-title" style="text-align: center">
            @if(!empty($department->picture) && file_exists($department->picture))
                <a href="{{ route('site.department',['department'=>$department->id]) }}"><img style="max-height: 200px" src="{{ asset($department->picture) }}"  ></a>
            @endif
            <h2>{{ $department->name }}</h2>
        </div>
        <p>
            {{ limitLength($department->description,200) }}
        </p>
        <div class="course-des">
            @if(setting('general_member_count')==1)
                <p><b>@lang('site.members'):</b> {{ $department->users()->count() }}</p>
            @endif

            <p><b>@lang('site.new-membership'):</b> @if($department->enroll_open==1) @lang('site.open') @else @lang('site.closed') @endif</p>
            @if($department->enroll_open==1)

                <p><b>@lang('site.enrollment'):</b>
                    @if($department->approval_required==1)
                        @lang('site.approval-required')
                    @else
                        @lang('site.instant')
                    @endif
                </p>

            @endif


        </div>
        <div class="product-buttons">

            <a class="btn btn-primary" href="{{ route('site.department',['department'=>$department->id]) }}">@lang('site.details')</a>
            @if($department->enroll_open==1)

                @if($department->approval_required==1)
                    <a class="btn btn-success" href="{{ route('site.apply',['department'=>$department->id]) }}">@lang('site.apply')</a>
                @else
                    <a class="btn btn-success" href="{{ route('site.join-department',['department'=>$department->id]) }}">@lang('site.join')</a>
                @endif

            @endif
        </div>
    </div>
</div>