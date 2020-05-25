<div class="col s12">
    <h3 dir="rtl" style="text-align: center;">{{$property->title}}</h3>
</div>


<div id="modal-add-array-text-{{$property->title}}" class="modal">
    <div class="modal-content">

        <div class="row">

            <div class="input-field col s12 m10">

                <h4>عنوان:</h4>
                <div class="input-field col s12 m12">
                    <input id="txt-add-title-array-text-{{$property->title}}"
                           name="txt-add-title-text-{{$property->title}}"
                           type="text">
                    <label for="txt-add-title-array-text-{{$property->title}}">
                        عنوان:
                    </label>
                </div>

                <div class="input-field col s12 m12" id="container-locale-{{$property->title}}">
                    @foreach($locales as $locale)
                        <div class="row">
                            <div class="input-field col s12 m2">
                            </div>
                            <div class="input-field col s12 m8">
                                <input id="txt-add-title-array-text-{{$property->title}}-{{$locale}}"
                                       name="txt-add-title-array-text-{{$property->title}}-{{$locale}}"
                                       type="text">
                                <label for="txt-add-title-array-text-{{$property->title}}-{{$locale}}"> {{__('messages.languages')[$locale]}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>


                <h4>متن:</h4>
                <div class="input-field col s12 m12">
                    <input id="txt-add-content-array-text-{{$property->title}}"
                           name="txt-add-content-array-text-{{$property->title}}"
                           type="text">
                    <label for="txt-add-content-array-text-{{$property->title}}">
                        محتوا:
                    </label>
                </div>

                <div class="input-field col s12 m12" id="container-locale-{{$property->title}}">
                    @foreach($locales as $locale)
                        <div class="row">
                            <div class="input-field col s12 m2">
                            </div>
                            <div class="input-field col s12 m8">
                                <input id="txt-add-content-array-text-{{$property->title}}-{{$locale}}"
                                       name="txt-add-content-array-text-{{$property->title}}-{{$locale}}"
                                       type="text">

                                <label for="txt-add-content-array-text-{{$property->title}}-{{$locale}}"> {{__('messages.languages')[$locale]}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>


    </div>
    <div class="modal-fixed-footer">
        <button type="button" class="btn" id="btn-add-array-text-{{$property->title}}">
            {{ __('messages.operations')['insert']}}
        </button>
    </div>
</div>


<div class="input-field col s12 m2">

    <button id="btn-open-modal-for-add-array-text-{{$property->title}}" type="button"
            class="btn-small margin-top modal-trigger btn">
        {{ __('messages.operations')['insert']}}
    </button>
</div>


<div class="input-field col s12 m12">
    <p type="button" class="btn-flat red-text">
        {{ __('messages.operations')['values']}}
    </p>
</div>
<div class="input-field col s12 m6" id="dv-array-text-{{$property->title}}">

    @if(isset($property->assigned ) and  is_array($property->assigned))

        @for($i=0; $i< count($property->assigned['rules-title']) ; $i++)

            <div class="row" style="border: 1px dotted red;margin-bottom: 3px; ">
                <input type="hidden"
                       id="{{$property->title}}-title[]"
                       name="{{$property->title}}-title[]"
                       class="{{$property->title}}-title"
                       value="{{$property->assigned['rules-title'][$i]}}">

                <input type="hidden"
                       id="{{$property->title}}-title-en[]"
                       name="{{$property->title}}-title-en[]"
                       class="{{$property->title}}-title-en"
                       value="{{$property->assigned['rules-title-en'][$i]}}">

                <input type="hidden" id="{{$property->title}}-title-ar[]"
                       name="{{$property->title}}-title-ar[]"
                       class="{{$property->title}}-title-ar"
                       value="{{$property->assigned['rules-title-ar'][$i]}}">

                <input type="hidden" id="{{$property->title}}-content[]"
                       name="{{$property->title}}-content[]"
                       class="{{$property->title}}-content"
                       value="{{$property->assigned['rules-content'][$i]}}">

                <input type="hidden" id="{{$property->title}}-content-en[]"
                       name="{{$property->title}}-content-en[]"
                       class="{{$property->title}}-content-en"
                       value="{{$property->assigned['rules-content-en'][$i]}}">

                <input type="hidden" id="{{$property->title}}-content-ar[]"
                       name="{{$property->title}}-content-ar[]"
                       class="{{$property->title}}-content-ar"
                       value="{{$property->assigned['rules-content-ar'][$i]}}">

                <div class="input-field col s12 m8">
                    <div class="row">
                        <div id="dv-{{$property->title}}-title[]" class="input-field col s12 m12 dv-{{$property->title}}-title">عنوان:
                            {{$property->assigned['rules-title'][$i]}}
                        </div>
                        <div id="dv-{{$property->title}}-content[]" class="input-field col s12 m12 dv-{{$property->title}}-content">متن:
                            {{$property->assigned['rules-content'][$i]}}
                        </div>
                    </div>
                </div>
                <div class="input-field col s12 m2">
                    <button type="button" class="btn button-delete">
                        X
                    </button>
                </div>
                <div class="input-field col s12 m2">
                    <button type="button" class="btn button-edit">
                        E
                    </button>
                </div>

            </div>
        @endfor
    @endif
</div>
{{--@php($property->input_type= 'multi-text')--}}
