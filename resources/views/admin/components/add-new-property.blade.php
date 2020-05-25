<div id="mdl-add-new-property" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خاصیت جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{$urls['properties.store']}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class=" col m12  alert alert-danger print-error-msg red-text" style="display:none">
                            <ul></ul>
                        </div>
                    </div>
                    <fieldset class="form-group floating-label-form-group">
                        <input type="hidden" id="group" name="group" value="">
                        <label for="title">{{ __('messages.input_titles')['title']}}</label>
                        <input class="form-control" id="title" name="title" type="text">
                        <div class="locales" style="margin-right: 3rem;">
                            <a href="#">
                                <input type="hidden" id="title-fa" name="title-fa" value="">
                                <span class="flag-icon flag-icon-ir"></span>
                            </a>
                            <a href="#">
                                <input type="hidden" id="title-en" name="title-en" value="">
                                <span class="flag-icon flag-icon-gb flag-icon-grayed"></span>
                            </a>
                            <a href="#">
                                <input type="hidden" id="title-ar" name="title-ar" value="">
                                <span class="flag-icon flag-icon-sa flag-icon-grayed"></span>
                            </a>
                        </div>
                    </fieldset>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-image">Send</button>
                    <input type="hidden" value="" id="property-title">
                </div>
            </form>
        </div>
    </div>
</div>
