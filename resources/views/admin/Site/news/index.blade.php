@extends('admin.layouts.app')
@section('head')
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style('assets/admin/global/plugins/datatables/datatables.min.css') !!}
        {!! Html::style('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
        <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
    <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            {!! Breadcrumbs::renderIfExists('news.index') !!}
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">
                            <small></small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->

                        <div class="row">
                            @include('shared.flash')
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    {!!
                                      CHTML::formTitleBox(
                                          $caption=" News",
                                          $captionIcon="fa fa-newspaper-o",
                                          $routeName="news.create",
                                          $buttonClass="",
                                          $buttonIcon=""
                                      )
                                    !!}
                                    <div class="portlet-body">
                                        {!!
                                            CHTML::filterBoxOpen(
                                                $caption="Search News",
                                                $captionIcon="fa fa-search-plus"
                                            )
                                        !!}
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Search Text
                                                </label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Enter Search Text"
                                                        name="searchText"
                                                        id="searchText"
                                                        value="{{ old('searchText') }}"
                                                        autofocus
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group pull-right">
                                                <label for="condition" class="control-label">&nbsp;</label><br/>
                                                <button type="submit"
                                                        class="btn blue display_news_by_search_text">
                                                    <i class="fa fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                        {!!
                                            CHTML::filterBoxClose()
                                        !!}

                                        <div id="display_news_by_search_text">
                                            {!! CHTML::customPaginate($news,'top') !!}
                                            <table
                                                    class="
                                                        table
                                                        table-striped
                                                        table-bordered
                                                        table-hover
                                                        dt-responsive
                                                    "
                                                    id="sample_3"
                                                    cellspacing="0"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th class="all">Image</th>
                                                        <th class="all">Title</th>
                                                        <th class="none">Details</th>
                                                        <th class="min-phone-l">Date</th>
                                                        <th class="all">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($news as $thisNews)
                                                    <tr>
                                                        @if(File::isFile( 'images/thumbnail_images/'.$thisNews->news_image ))
                                                            <td>
                                                                {{
                                                                    Html::image(
                                                                        'images/thumbnail_images/'.$thisNews->news_image,
                                                                        $thisNews->title,
                                                                        array('width'=>100)
                                                                    )
                                                                }}
                                                            </td>
                                                        @else
                                                            <td> {{ Html::image('images/logo.png') }}</td>
                                                        @endif
                                                        <td>{{$thisNews->news_title}}</td>
                                                        <td>{!! substr($thisNews->news_body, 0, 30) !!}...</td>
                                                        <td>
                                                            {{
                                                                $thisNews->created_at->format(config('app.date_format'))
                                                            }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                    style="float:right;"
                                                                    method="POST"
                                                                    class="form-inline"
                                                                    action="{{route('news.destroy',$thisNews->id)}}"
                                                                    onsubmit="return confirm('Are you sure?')"
                                                            >
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <a
                                                                        href="{{ route('news.show',$thisNews->id) }}"
                                                                        class="btn btn-icon-only grey-cascade"
                                                                >
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a
                                                                        href="{{ route('news.edit',$thisNews->id) }}"
                                                                        class="btn btn-icon-only btn-primary"
                                                                >
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button
                                                                        type="submit"
                                                                        class="btn btn-icon-only btn-danger"
                                                                >
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {!! CHTML::customPaginate($news,'') !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function() {
            $(".display_news_by_search_text").on('click',function() {
                var searchText = $('#searchText').val() || '';
                var pickToken = '{{csrf_token()}}';
                $.ajax({
                    type: "POST",
                    url: '{{route('news.displayNewsBySearchText')}}',
                    data: {'searchText':searchText, '_token':pickToken},
                    success: function (data) {
                        $('#display_news_by_search_text').html(data);
                    }
                });
            });
        });
    </script>
@endsection