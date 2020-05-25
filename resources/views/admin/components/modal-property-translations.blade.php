<div id="mdl-property-translations" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Translations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{$urls['update']}}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="translations" value="true">
                    <div class="row">
                        @foreach(config('base.all_locales') as $locale)
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label for="title-{{$locale}}">
                                        {{__('messages.languages.' . $locale)}}
                                    </label>
                                    <input type="text" id="title-{{$locale}}" class="form-control" value="" name="title-{{$locale}}">
                                </div>
                            </div>
                        @endforeach
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
