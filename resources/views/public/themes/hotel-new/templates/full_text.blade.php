<h4 class="center contact_us_h6_2">
    @if(isset($datas->properties['title']->title))
        {{$datas->properties['title']->title}}
    @endif
</h4>

<div class="container posts-archive" style="min-height: 600px;">


    <div class="row row-sup">
        <div class="col s12 row-sup-div">
            <div class="row">
                <div class=" col l11 s12">
                    @if(isset($datas->properties['content']->title))
                        {!! $datas->properties['content']->title!!}
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row row-sup">
        <div class="col s12 row-sup-div">
            <div class="row">
                <div class=" col l1 s12 img-sup-bg center-on-small-only">
                    <img class="responsive-img img-sup" src="{{asset('images/support.png')}}">
                </div>
                <div class=" col l11 s12">
                    <h6 class="sup-title">پشتیبانی هتل سه ستاره صبوری</h6>
                    <p style="display: inline-block">در صورت بروز هر گونه سوال یا وجود مشکل در روند پرداخت یا عملکرد
                        سایت با پشتیبانی ما ارتباط برقرار نمایید تا مشکل موجود رفع شود و شما همچون روال رزرو به
                        پرداخت خود ادامه دهید و مشکلی نباشد.</p>
                </div>
            </div>
        </div>
    </div>

</div>

