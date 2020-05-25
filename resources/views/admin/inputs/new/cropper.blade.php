<label title="Upload image file" for="inputImage" class="btn btn-primary" style="display: block">
    <input type="file" accept="image/*" name="file" id="inputImage"
           class="hide">
    انتخاب تصویر
</label>

<input type="hidden" id="path" name="path" value="">

<div class="file-field input-field">
    <div class="featured_image">
        @if( isset($property->assigned)==true)
            <img src="{{$property->assigned}}" alt="" height="500"/>
        @else
            <img src="{{asset('uploads/630df7303da006129bd6d2349daf99b7f5da3397.png')}}" alt="" height="500"/>
        @endif
    </div>
    <br>

</div>



