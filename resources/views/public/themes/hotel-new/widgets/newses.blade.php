<h6 class="center contact_us_h6_2">

    {{__('layout.room.news archives')}}

</h6>
<span class="center contact_us_span_2"
      style="display: block">

{{--    {{__('layout.room.you can see our rooms here')}}--}}

</span>


<!--todo add posts-archive class-->

<div class="container posts-archive">
    <div class="row">
        @foreach($datas as $data)

            @include('public.themes.hotel-new.widgets.news_widget' , ['data'=>$data])

        @endforeach
    </div>
</div>
