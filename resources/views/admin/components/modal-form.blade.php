<div id="mdl-{{$modal->title}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$modal->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{$modal->url}}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="part_update" value="true">
                    @include('admin.items.forms.input_form',['groups'=>$modal->properties] )
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
