<div class="col {{isset($property->fillation_rules['width'] ) ? $property->fillation_rules['width'] : 'col-md-12'}}">
    <div class="row">
        <div class="col col-md-12">
            <h4 class="form-section">
                {{__('layout.public.select week days')}}
            </h4>
        </div>
        <div class="col col-md-12 col-sm-12">
            <div class="row">
                <div class="col col-md-10 col-sm-10">
                    <div class="form-group">
                        <select name="weekdays" class="form-control">
                            <option value="" selected="" disabled="">none</option>
                            @foreach(__('messages.weekdays') as $k =>$v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-2 col-sm-12">
                    <button type="button" class="btn btn-outline-danger add-from-weekdays" id="btn-add-weekday-{{$property->title}}">درج</button>
                </div>
            </div>
        </div>
        <div class="col col-md-12">
            <h4 class="form-section">
                {{__('layout.public.select date range')}}
            </h4>
        </div>
        <div class="col col-md-12">
            <div class="row">

                <div class="col col-md-5 col-sm-12 " id="start-date-{{$property->field}}">
                    <date-picker @change="onChange" v-model="date" :min="today" label="{{__('layout.public.start')}}"></date-picker>
                </div>
                <div class="col col-md-5 col-sm-12 " id="end-date-{{$property->field}}">
                    <date-picker @change="onChange1" v-model="date" :disabled="disabled" :min="min" label="{{__('layout.public.end')}}"></date-picker>
                </div>
                <div class="col col-md-2 col-sm-12">
                    <button type="button" class="btn btn-outline-danger" id="btn-add-range-{{$property->field}}">درج</button>
                </div>

            </div>
        </div>
        <div class="col col-md-12">
            <br>
            <br>

            <h4 class="form-section">
                {{__('layout.public.data to be saved')}}
            </h4>
        </div>

        <div class="col col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>زمان</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>


    </div>
</div>
