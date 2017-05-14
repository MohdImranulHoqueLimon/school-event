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
                            {!! Breadcrumbs::renderIfExists('testimonials.index') !!}
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
                                          $caption="  Testimonial",
                                          $captionIcon="glyphicon glyphicon-tasks",
                                          $routeName="testimonials.create",
                                          $buttonClass="",
                                          $buttonIcon=""
                                      )
                                    !!}
                                    <div class="portlet-body">
                                        {!!
                                            CHTML::filterBoxOpen($caption="Search Testimonial", $captionIcon="fa fa-search-plus")
                                        !!}
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Search Text
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Search Text" name="searchText" id="searchText" value="{{ old('searchText') }}"  autofocus>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group pull-right">
                                                <label for="condition" class="control-label">&nbsp;</label><br/>
                                                <button type="submit"
                                                        class="btn blue display_testimonials_by_search_text">
                                                    <i class="fa fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                        {!!
                                            CHTML::filterBoxClose()
                                        !!}

                                        <div id="display_testimonials_by_search_text">
                                            {!! CHTML::customPaginate($testimonial,'top') !!}
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" width="100%" id="sample_1" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="all" width="12%">Client</th>
                                                        <th class="all" width="12%">Designation</th>
                                                        <th class="all" width="12%">Company</th>
                                                        <th class="none" width="40%">Description</th>
                                                        <th class="min-phone-l" width="10%">Date</th>
                                                        <th class="all" width="14%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($testimonial as $thisTestimonial)
                                                    <tr>
                                                        <td>{{$thisTestimonial->testimonial_client}}</td>
                                                        <td>{{$thisTestimonial->testimonial_designation}}</td>
                                                        <td>{{$thisTestimonial->testimonial_company}}</td>
                                                        <td>{!! substr($thisTestimonial->testimonial_body, 0, 75) !!}...</td>
                                                        <td>{{$thisTestimonial->created_at->format(config('app.date_format'))}}</td>
                                                        <td>
                                                            <form style="float:right;" method="POST" class="form-inline" action="{{route('testimonials.destroy',$thisTestimonial->id)}}" onsubmit="return confirm('Are you sure?')">
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <a href="{{ route('testimonials.show',$thisTestimonial->id) }}" class="btn btn-icon-only grey-cascade"><i class="fa fa-eye"></i></a>
                                                                <a href="{{ route('testimonials.edit',$thisTestimonial->id) }}" class="btn btn-icon-only btn-primary"><i class="fa fa-edit"></i></a>
                                                                <button type="submit" class="btn btn-icon-only btn-danger"><i class="fa fa-times"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {!! CHTML::customPaginate($testimonial,'') !!}
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
            $(".display_testimonials_by_search_text").on('click',function() {
                var searchText = $('#searchText').val() || '';
                var pickToken = '{{csrf_token()}}';
                $.ajax({
                    type: "POST",
                    url: '{{route('testimonials.displayTestimonialsBySearchText')}}',
                    data: {'searchText':searchText, '_token':pickToken},
                    success: function (data) {
                        $('#display_testimonials_by_search_text').html(data);
                    }
                });
            });
        });
    </script>
@endsection