<div id="mdl-category-selector" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document" style="height:800px ! important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">دسته ها</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="#" data-toggle="modal" data-target="#mdl-add-category" data-backdrop="true" class="add-parent">
                    <i class="fa fa-plus fa-lg"></i>
                </a>
                <div class="dd" id="nestable3">
                    <ol class='dd-list dd3-list'>
                        <div id="dd-empty-placeholder"></div>
                    </ol>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="" id="nestable-content">
                <button type="button" class="btn btn-secondary">Close</button>
                <button type="button" name="update-property" class="btn btn-danger">Update Categories</button>
                <button type="button" name="send" class="btn btn-primary">Send</button>

            </div>
        </div>
    </div>
</div>


<div id="mdl-add-category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:-30%;outline: none;">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content" style="box-shadow: 0 0 2px 3px #c7d3d0; border: 2px solid gray">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">دسته جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-12">
                        <input class="form-control" id="selected-item" name="selected-item" type="hidden">
                        <div class="form-group">
                            <label for="title-fa">عنوان(فارسی)</label>
                            <input class="form-control" id="title-fa" name="title-fa" type="text">
                        </div>
                        <div class="form-group">
                            <label for="title-en">عنوان(انگلیسی)</label>
                            <input class="form-control" id="title-en" name="title-en" type="text">
                        </div>
                        <div class="form-group">
                            <label for="title-ar">عنوان(عربی)</label>
                            <input class="form-control" id="title-ar" name="title-ar" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-add-new-category" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<div id="mdl-edit-category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:-30%;outline: none;">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content" style="box-shadow: 0 0 2px 3px #c7d3d0; border: 2px solid gray">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-12">
                        <input class="form-control" id="selected-item" name="selected-item" type="hidden">
                        <div class="form-group">
                            <label for="title-fa">عنوان(فارسی)</label>
                            <input class="form-control" id="title-fa" name="title-fa" type="text">
                        </div>
                        <div class="form-group">
                            <label for="title-en">عنوان(انگلیسی)</label>
                            <input class="form-control" id="title-en" name="title-en" type="text">
                        </div>
                        <div class="form-group">
                            <label for="title-ar">عنوان(عربی)</label>
                            <input class="form-control" id="title-ar" name="title-ar" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-edit-category" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>
