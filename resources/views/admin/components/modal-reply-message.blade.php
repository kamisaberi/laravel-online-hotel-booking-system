<div id="mdl-reply-message" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="reply-message-form" method="post" action="{{route("items.store" , ['type'=>'message'])}}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="reply_to" id="reply_to" value="">
                        <input type="hidden" name="sender" id="sender" value="">
                        <div class="col col-md-12">
                            <div class="form-group">
                                <label for="content">جوابیه:</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                        </div>
                    </div>
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
