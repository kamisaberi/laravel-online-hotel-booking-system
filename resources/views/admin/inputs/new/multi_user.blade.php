<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="row">
        <div class="col col-md-12" style="font-family: web-vazir">
            {{isset($property->locales[app()->getLocale()])?$property->locales[app()->getLocale()]:$property->field}}
        </div>
        <div class="col col-md-12">
            <div class="row">
                @foreach($users as $user)
                    <div class="col col-md-3 col-sm-6">
                        <input type="checkbox" id="{{$property->field}}-{{$user->id}}" name="{{$property->field}}[]"
                               value="{{$user->id}}"
                                {{(isset($property->assigned) && is_array($property->assigned) && in_array($user->id,$property->assigned) ? "checked" : "" )}}
                        />
                        <label for="{{$property->field}}-{{$user->id}}">{{$user->properties->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>