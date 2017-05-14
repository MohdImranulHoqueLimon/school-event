<!-- HOME NEW -->
<section class="section-event-news bg-white">
    <div class="container">

        <div class="event-news">
            <div class="row">

                <!-- EVENT -->
                <div class="col-md-6">
                    <div class="event">
                        <h2 class="heading">EVENT &amp; DEAL</h2>
                        <p>Lorem Ipsum is simply dummy text</p>

                        <div class="row">

                            <!-- ITEM -->
                            <div class="col-xs-12 col-sm-12">
                                <div class="event-slide owl-single">

                                    <div class="event-item">
                                        <div class="img">
                                            <a href="#">
                                                <img src="{{asset('assets/images/home/eventdeal/img-1.jpg')}}" alt="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="event-item">
                                        <div class="img">
                                            <a href="#">
                                                <img src="{{asset('assets/images/home/eventdeal/img-1.jpg')}}" alt="">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="col-xs-6">
                                <div class="event-item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="{{asset('assets/images/home/eventdeal/img-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <div class="text-cn">
                                            <h2>SAVE THE DATE</h2>
                                            <span>BECCA &amp; ROBERT</span>
                                            <a href="#" class="awe-btn awe-btn-12">VIEW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                            <!-- ITEM -->
                            <div class="col-xs-6">
                                <div class="event-item">
                                    <div class="img">
                                        <a href="#">
                                            <img src="{{asset('assets/images/home/eventdeal/img-3.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <div class="text-cn">
                                            <h2>GO ON BEACH. HILLTER </h2>
                                            <a href="#" class="awe-btn awe-btn-12">VIEW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END / ITEM -->

                        </div>
                    </div>
                </div>
                <!-- END / EVENT -->

                <!-- NEWS -->
                <div class="col-md-6">
                    <div class="news">
                        <h2 class="heading">NEWS</h2>
                        <p>Lorem Ipsum is simply dummy</p>

                        <div class="row">
                            @foreach($news as $thisNews)
                                <!-- ITEM -->
                                <div class="col-md-12">
                                    <div class="news-item">
                                        <div class="img">
                                            <a href="{{'/newsdetails/' . $thisNews->id}}">
                                                @if(File::isFile( 'images/thumbnail_images/'.$thisNews->news_image ))
                                                    {{ Html::image('images/thumbnail_images/'.$thisNews->news_image, $thisNews->news_title) }}
                                                @else
                                                    {{ Html::image('images/logo.png', $thisNews->news_title) }}
                                                @endif
                                            </a>
                                        </div>
                                        <div class="text">
                                            <span class="date">{{ $thisNews->created_at->format('d') }} / {{ $thisNews->created_at->format('F') }}</span>
                                            <h2>{!! link_to('/newsdetails/' . $thisNews->id, $thisNews->news_title) !!}</h2>
                                            <a href="" class="read-more">[ Read More ]</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                        @endforeach

                        </div>

                        @if(count($news)>0)
                        <a href="#" class="awe-btn awe-btn-default">VIEW MORE</a>
                        @else
                            <h2>No Data Found</h2>
                        @endif

                    </div>

                </div>
                <!-- END / NEWS -->

            </div>

            <div class="hr"></div>

        </div>

    </div>
</section>
<!-- END / HOME NEW -->