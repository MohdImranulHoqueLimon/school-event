{!! CHTML::customPaginate($newsBySearchText,'top') !!}
<table
        class="table table-striped table-bordered table-hover dt-responsive"
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
    @foreach($newsBySearchText as $thisNews)
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
                <td> {{ HTML::image('images/logo.png') }}</td>
            @endif
            <td>{{$thisNews->news_title}}</td>
            <td>{!! substr($thisNews->news_body, 0, 30) !!}...</td>
            <td>{{ $thisNews->created_at->format(config('app.date_format')) }}</td>
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
                    <button type="submit" class="btn btn-icon-only btn-danger"><i class="fa fa-times"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! CHTML::customPaginate($newsBySearchText,'') !!}
<script>
    jQuery(document).ready(function() {
        $(".pagination a").on('click',function() {
            var page=$(this).attr('href').split('page=')[1];
            var searchText = $('#searchText').val() || '';
            var pickToken = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                url: '{{route('news.displayNewsBySearchText')}}?page='+page,
                data: {'searchText':searchText, '_token':pickToken},
                success: function (data) {
                    $('#display_news_by_search_text').html(data);
                }
            });
            return false;
        });
    });
</script>