<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        @include('admin.layouts.widgets.breadcrumbs', ['page_title'=>$page_title , 'breadcrumbs'=> $breadcrumbs])
        <div class="content-body">
            <section id="hover-effects" class="card">
                <div class="card-content collapse show">
                    <div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <div class="grid-hover row">
                            @foreach($datas as $data)
                                @if(isset($widgets[0]->widget))
                                    @include($widgets[0]->widget , ['data'=>$data])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
