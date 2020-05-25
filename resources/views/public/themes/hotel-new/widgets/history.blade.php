<div class="container" style="margin-top: 35px; margin-bottom: 35px;">
    <div class="post-single" style=" ">
        <div id="example-basic">
            <h3>{{__('layout.reserve.tracking reserve')}}</h3>
            <section style="padding: 0 !important; width: 100%; margin: 0 !important;">
                <div class="row" style="padding: 30px">
                    <div class="row">
                        <div class="col s12 m6 pay-msg">
                        <span>
                            نام مشتری:
                            {{$customer->properties['name']->value }}
                        </span>
                        </div>
                    </div>
                    <div class="col l1 s12 right-s"></div>
                    <div class="col l10 s12 right-s">

                        <table>
                            <thead>
                                <tr>
                                    <th>تاریخ ورود</th>
                                    <th>تاریخ خروج</th>
                                    <th>هزینه</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reserves as $reserve )
                                    <tr>
                                        <td class="text-truncate">{{$reserve->properties['start-date']->value['ja']}}</td>
                                        <td class="text-truncate">{{$reserve->properties['end-date']->value['ja']}}</td>
                                        <td class="text-truncate">{{number_format($reserve->properties['price']->value)}}</td>
                                        <td class="text-truncate">
                                            <a href="{{route('home.voucher.print', ['code'=>$reserve->properties['code']->value])}}" target="_blank" title="واچر">
                                                واچر
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col l1 s12 right-s"></div>
                </div>
                <div class="row row-sup">
                    <div class="col s12 row-sup-div">
                        <div class="row">
                            <div class=" col l1 s12 img-sup-bg center-on-small-only">
                                <img class="responsive-img img-sup" src="{{asset('images/support.png')}}">
                            </div>
                            <div class=" col l11 s12">
                                <h6 class="sup-title">
                                    {{__('layout.reserve.support for the 3-star hotel patio')}}
                                </h6>
                                <p style="display: inline-block">
                                    {{__('layout.reserve.in case of any questions or problems')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
