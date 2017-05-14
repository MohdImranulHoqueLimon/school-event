{!! CHTML::customPaginate($testimonialsBySearchText,'top') !!}
<table
        class="table table-striped table-bordered table-hover order-column"
        id="sample_1"
        cellspacing="0"
>
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
    @foreach($testimonialsBySearchText as $thisTestimonial)
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
{!! CHTML::customPaginate($testimonialsBySearchText,'') !!}
<script>
    jQuery(document).ready(function() {
        $(".pagination a").on('click',function() {
            var page=$(this).attr('href').split('page=')[1];
            var searchText = $('#searchText').val() || '';
            var pickToken = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                url: '{{route('testimonials.displayTestimonialsBySearchText')}}?page='+page,
                data: {'searchText':searchText, '_token':pickToken},
                success: function (data) {
                    $('#display_testimonials_by_search_text').html(data);
                }
            });
            return false;
        });
    });
</script>