<div id="mdl-file-manager" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" id="multi_selection" value="1">
    <input type="hidden" id="property-title" value="">
    <input type="hidden" id="document-type" value="">
    <input type="hidden" id="attributes-to-display" value="">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document" style="height:800px ! important;">
        <div class="modal-content" style="height: 100%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">مدیریت تصاویر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-x: hidden !important; ">
                {{--                <button class="btn btn-danger" onclick='$("#file-1").fileinput("refresh",{allowedFileExtensions:["jpg"]}).fileinput("refresh");'>test</button>--}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
                                               aria-selected="true">تصاویر</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
                                               aria-selected="false">آپلود</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content card pt-5" id="myTabContentJust">

                                        <div class="tab-pane show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">

                                            <div class="row">
                                                <div class="col col-md-12">
                                                    <div class="row" id="rw-images">
                                                        <div class="col col-md-10">

                                                            {{--                                                            --}}{{--                                                            <div class="row">--}}
                                                            {{--                                                            @foreach($images as $image)--}}
                                                            {{--                                                                --}}{{--                                                                    <div class="col col-md-1 col-sm-3">--}}
                                                            {{--                                                                @if(isset($image->properties['path']->thumbs['300x250']) == true &&--}}
                                                            {{--                                                                isset($image->properties['path']->value) == true )--}}
                                                            {{--                                                                    <img class="se-image"--}}
                                                            {{--                                                                         src="{{$image->properties['path']->thumbs['300x250']}}"--}}
                                                            {{--                                                                         data-src="{{$image->properties['path']->value}}"--}}
                                                            {{--                                                                         style="width: 128px" data-content="0" alt="">--}}
                                                            {{--                                                                @endif--}}
                                                            {{--                                                                --}}{{--                                                                    </div>--}}
                                                            {{--                                                            @endforeach--}}
                                                            {{--                                                            --}}{{--                                                            </div>--}}


                                                        </div>
                                                        <div class="col col-md-2 attributes">
                                                            <div class="form-group">
                                                                <label for="attr-width">طول:</label>
                                                                <input id="attr-width" name="width" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="attr-height">ارتفاع:</label>
                                                                <input id="attr-height" name="height" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-11 main-section">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <div class="file-loading">
                                                            <input id="file-1" type="file"
                                                                   name="path" multiple class="file" data-overwrite-initial="false"
                                                                   data-min-file-count="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-add-image" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
