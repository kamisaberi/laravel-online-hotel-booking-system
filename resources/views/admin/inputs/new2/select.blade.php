<div class="col col-md-12">
    <div class="form-group">
        <label for="{{$field}}">
            {{isset(__("fields")[$field]) ? __("fields")[$field] :  $field }} :
        </label>
        <select id="{{$field}}" name="{{$field}}" class="form-control">
            <option value="none" selected="" disabled="">
                {{$field}}
            </option>

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>

        </select>
    </div>
</div>

