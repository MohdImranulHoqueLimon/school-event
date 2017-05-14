<div class="news">
    @if($news->count())
        <div class="container">
            <div class="row">
                <div class="col-xs-12 center">
                    <div class="heading">
                        <span>Press release</span>
                        <h2>LATEST NEWS</h2>
                    </div>

                    <div class="design-line">
                        <span class="design"></span>
                    </div>
                </div>
                <div class="news-section">
                    @foreach($news as $thisNews)
                        <div class="col-xs-12 col-sm-4">
                            <div class="slides-tab zoom">
                                <figure>
                                    <a href="{{'/newsdetails/' . $thisNews->id}}">
                                        @if(File::isFile( 'images/thumbnail_images/'.$thisNews->news_image ))
                                            {{ Html::image('images/thumbnail_images/'.$thisNews->news_image, $thisNews->news_title) }}
                                        @else
                                            {{ Html::image('images/logo.png', $thisNews->news_title) }}
                                        @endif
                                    </a>
                                    <div class="date" style="width:65px!important;">
                                        <small> {{ $thisNews->created_at->format('F') }} </small><span>{{ $thisNews->created_at->format('d') }}</span>
                                    </div>
                                </figure>
                                <div class="slides-text">
                                    <h5>{!! link_to('/newsdetails/' . $thisNews->id, $thisNews->news_title) !!}</h5>
                                    <p>
                                        {!! substr($thisNews->news_body, 0, 75) !!} ...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
