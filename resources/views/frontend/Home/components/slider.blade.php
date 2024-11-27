  <!--=============================
        BANNER START
    ==============================-->
    <section class="fp__banner" style="background: url({{ asset('frontend/images/banner_bg.jpg') }});">
        <div class="fp__banner_overlay">
            <div class="row banner_slider">
                @foreach ($slider as $slide)
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('storage/'.$slide->image) }}" alt="image">
                                                  @if ($slide->offer)
                                                  <span> {{ $slide->offer }}  </span>
                                                  @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1>{!! $slide->title !!}</h1>
                                        <h3>{!! $slide->sub_title !!}</h3>
                                        <p>{!! $slide->short_desc !!}</p>
                                        <ul class="d-flex flex-wrap">
                                            <li><a class="common_btn" href="{{ $slide->button_link }}">shop now</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--=============================
        BANNER END
    ==============================-->
