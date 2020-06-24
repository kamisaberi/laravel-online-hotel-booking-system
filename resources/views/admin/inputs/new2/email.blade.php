<div class="col col-md-12">
    <div class="form-group">
        <label for="{{$field}}">
            {{isset(__("fields")[$field]) ? __("fields")[$field] :  $field }} :
        </label>
        <input type="email" id="{{$field}}" class="form-control" value="{{$value}}" placeholder="{{$field}}" name="{{$field}}">
    </div>
</div>
