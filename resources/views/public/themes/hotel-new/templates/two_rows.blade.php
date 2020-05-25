<div class="container" style="margin-top: 35px; margin-bottom: 35px;">
    <div class="post-single" style="min-height: 1000px">

        @for($i=0;$i< count($datas->properties['rules']->sub_properties['rules-title']->title);$i++)
            <div class="row" style="padding-top: 50px ">
                <div class="col s12 cream-box ">
                    <h6 style="line-height: 40px; margin: 0 30px 0 0 !important;">
                        {{$datas->properties['rules']->sub_properties['rules-title']->title[$i]}}
                    </h6>
                </div>
            </div>
            <div class="row row-rules">
                <div class="col s12 row-rules-div">
                    <p>
                        {{$datas->properties['rules']->sub_properties['rules-content']->title[$i]}}
                    </p>
                </div>
            </div>
        @endfor


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


</div>
