@extends('layouts.account-page')

@section('pageTitle','Subscripiton Plans')
@section('page-content')
    <div class="card-box_">


        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#home" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                    <span class="hidden-xs">Change Plan</span>
                </a>
            </li>
            <li class="">
                <a href="#profile" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                    <span class="hidden-xs">Current Plan</span>
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">

                <div class="row">
                    <div class="col-lg-9 center-page">
                        <div class="text-center">
                            <h3 class="m-b-30 m-t-20">Choose your perfect plan</h3>
                            <p>
                                Flexible and affordable pricing plans.
                            </p>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">Monthly Plans</a></li>
                            <li role="presentation"><a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">Annual Plans</a></li>
                            <li role="presentation"><a href="#profile3" aria-controls="profile3" role="tab" data-toggle="tab">Mobile App Service</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home2" style="padding-top: 20px">

                                <div class="row m-t-50">
                                    @foreach($packages as $package)
                                        <!--Pricing Column-->
                                        <article class="pricing-column col-lg-4 col-md-4">
                                            <div class="inner-box card-box">
                                                <div class="plan-header text-center">
                                                    <h3 class="plan-title">{{ $package->name }}</h3>
                                                    <h2 class="plan-price">{!! clean( price($package->packageDurations->first()->price)) !!}</h2>
                                                    <div class="plan-duration">Per Month</div>
                                                </div>
                                                <ul class="plan-stats list-unstyled text-center">
                                                    <li>Unlimited Courses &amp; Sessions</li>

                                                        <li><strong>Free Android App</strong></li>

                                                    <li>{{ formatSizeUnits($package->video_storage_space) }} Video Hosting</li>
                                                    <li>{{ empty($package->student_limit)?'Unlimited':$package->student_limit }} active students</li>
                                                    <li>{{ empty($package->admin_limit)?'Unlimited':$package->admin_limit }} admins/instructors</li>
                                                    @if($package->id > 1)
                                                        <li>Custom Domain Supported</li>
                                                    @else
                                                        <li>Subdomain only</li>
                                                    @endif
                                                    <li>Unlimited Bandwidth</li>
                                                </ul>

                                                <div class="text-center">
                                                    <form action="{{ route('invoice.create') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="purpose" value="subscription"/>
                                                        <input type="hidden" name="item_id" value="{{ $package->packageDurations->first()->id }}"/>
                                                        <button type="submit" class="btn btn-danger btn-bordred btn-rounded waves-effect waves-light">Select Plan</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </article>
                                    @endforeach



                                </div>
                                </div>
                            <div role="tabpanel" class="tab-pane" id="profile2"   style="padding-top: 20px">


                                <div class="row m-t-50">
                                    @foreach($packages as $package)
                                        <!--Pricing Column-->
                                        <article class="pricing-column col-lg-4 col-md-4">
                                            <div class="inner-box card-box">
                                                <div class="plan-header text-center">
                                                    <h3 class="plan-title">{{ $package->name }}</h3>
                                                    <h2 class="plan-price">{!! clean( price($package->packageDurations()->where('duration','1 Year')->first()->price)) !!}</h2>
                                                    <div class="plan-duration">Per Year</div>
                                                </div>
                                                <ul class="plan-stats list-unstyled text-center">
                                                    <li>Unlimited Courses &amp; Sessions</li>

                                                        <li><strong>Free Android App</strong></li>

                                                    <li>{{ empty($package->student_limit)?'Unlimited':$package->student_limit }} active students</li>
                                                    <li>{{ empty($package->admin_limit)?'Unlimited':$package->admin_limit }} admins/instructors</li>
                                                    @if($package->id > 1)
                                                        <li>Custom Domain Supported</li>
                                                    @else
                                                        <li>Subdomain only</li>
                                                    @endif
                                                    <li>Unlimited Bandwidth</li>
                                                </ul>

                                                <div class="text-center">
                                                    <form action="{{ route('invoice.create') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="purpose" value="subscription"/>
                                                        <input type="hidden" name="item_id" value="{{ $package->packageDurations()->where('duration','1 Year')->first()->id }}"/>
                                                        <button type="submit" class="btn btn-danger btn-bordred btn-rounded waves-effect waves-light">Select Plan</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </article>
                                    @endforeach



                                </div>

                            </div>


                            <div role="tabpanel" class="tab-pane" id="profile3"   style="padding-top: 20px">


                                <div class="row m-t-50">
                                        <!--Pricing Column-->
                                        <article class="pricing-column col-lg-4 col-md-4">
                                            <div class="inner-box card-box">
                                                <div class="plan-header text-center">
                                                    <h3 class="plan-title">Mobile App</h3>
                                                    <h2 class="plan-price">{!! clean( price(240)) !!}</h2>
                                                    <div class="plan-duration">Per Year</div>
                                                </div>
                                                <ul class="plan-stats list-unstyled text-center">
                                                    <li>iOS Version</li>
                                                    <li>Android Version</li>
                                                    <li>Annual Subscription Only</li>
                                                    <li>All subscription plans supported</li>
                                                    <li>Regular App updates</li>

                                                </ul>

                                                <div class="text-center">
                                                    <a  href="https://rave.flutterwave.com/pay/dxoolxkvue3a" target="_blank" class="btn btn-danger btn-bordred btn-rounded waves-effect waves-light">Subscribe Now</a>

                                                </div>
                                            </div>
                                        </article>




                                </div>

                            </div>


                        </div>









                    </div><!-- end col -->
                </div>
                <!-- end row -->


            </div>
            <div class="tab-pane" id="profile">
                <div class="row">
                    <div class="col-md-2"><strong>Plan</strong>:</div>
                    <div class="col-md-8">{{ $user->subscriber->packageDuration->package->name }}</div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><strong>Expires</strong>:</div>
                    <div class="col-md-8">{{ date('d/M/Y',$user->subscriber->expires) }}</div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><strong>Billing Cycle</strong>:</div>
                    <div class="col-md-8">{{ $user->subscriber->packageDuration->duration }}</div>
                    <div class="col-md-2"></div>
                </div>

            </div>

        </div>
    </div>

@endsection