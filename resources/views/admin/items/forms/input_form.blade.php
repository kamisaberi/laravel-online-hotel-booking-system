{{--@php($br_after_checks= false)--}}

@foreach($groups as  $title=>$group)
    <div class="row">
        @foreach($group->properties as $property)
            @if ($loop->first)
                <div class="col col-md-12">
                    <h4 class="form-section"><i class="ft-user"></i>{{$title }}</h4>
                </div>
            @endif

            @if($property->rules['type']== "text")
                @include('admin.inputs.new.text',['property'=>$property])
            @elseif($property->rules['type']== "select")
                @include('admin.inputs.new.select',['property'=>$property])
            @elseif($property->rules['type'] == "select2")
                @include('admin.inputs.new.select2',['property'=>$property])
            @elseif($property->rules['type'] == "nestable")
                @include('admin.inputs.new.nestable',['property'=>$property])
            @elseif($property->rules['type'] == "check")
                @php($br_after_checks =true)
                @include('admin.inputs.new.check',['property'=>$property])
            @elseif($property->rules['type'] == "tinymce")
                @include('admin.inputs.new.tinymce',['property'=>$property])
            @elseif($property->rules['type'] == "select-image")
                @include("admin.inputs.new.select_image", ['property'=>$property])
            @elseif($property->rules['type'] == "select-video")
                @include("admin.inputs.new.select_video", ['property'=>$property])
            @elseif($property->rules['type'] == "select-flash")
                @include("admin.inputs.new.select_flash", ['property'=>$property])
            @elseif($property->rules['type'] == "single-relation-price")
                @include("admin.inputs.new.currency", ['property'=>$property])
            @elseif($property->rules['type'] == "textarea")
                @include("admin.inputs.new.textarea", ['property'=>$property])
            @elseif($property->rules['type'] == "code")
                @include("admin.inputs.new.code", ['property'=>$property])
            @elseif($property->rules['type']== "url")
                @include("admin.inputs.new.url", ['property'=>$property])
            @elseif($property->rules['type'] == "email")
                @include("admin.inputs.new.email", ['property'=>$property])
            @elseif($property->rules['type'] == "file")
                @include("admin.inputs.new.file", ['property'=>$property])
            @elseif($property->rules['type'] == "cropper")
                @include("admin.inputs.new.cropper", ['property'=>$property])
            @elseif($property->rules['type'] == "phone")
                @include("admin.inputs.new.phone", ['property'=>$property])
            @elseif($property->rules['type'] == "number")
                @include("admin.inputs.new.number", ['property'=>$property])
            @elseif($property->rules['type'] == "password")
                @include("admin.inputs.new.password", ['property'=>$property])
            @elseif($property->rules['type'] == "dates")
                @include("admin.inputs.new.expert-datepicker", ['property'=>$property])

            @elseif($property->rules['type'] == "multi-user")
                @include("admin.inputs.new.multi_user", ['property'=>$property, 'users'=>$users])

            @elseif($property->rules['type'] == "array-text")
                @foreach($properties as $prop)
                    @php($subs = [])
                    @if($prop->parent == $property->id)
                        @php($subs[] = $prop )
                    @endif
                @endforeach
                @include("admin.inputs.new.array_text", ['property'=>$property, 'subs'=>$subs])

            @elseif($property->rules['type'] == "multi-text")
                @include("admin.inputs.new.multi_text", ['property'=>$property])
            @endif

            @if($loop->last)
                @if(isset($property->fillation_rules['can_add_same']))
                    <div class="col col-md-3">
                        <a data-toggle="modal" class="{{$property->input_type == 'text' ? 'btn btn-primary' : '' }}" data-target="#mdl-add-new-property"
                           data-backdrop="true"><i class="ft-plus"></i></a>

                        <input type="hidden" id="group" name="group" value="{{$property->fillation_rules['group']}}">
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endforeach
