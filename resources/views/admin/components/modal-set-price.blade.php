<div id="mdl-set-price" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-content" value="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('items.set.property' , ['type'=>'room', 'property'=>'price'])}}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="part_update" value="true">
                    <div class="col col-md-12">
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
                                        <button type="button" class="btn btn-outline-danger add-from-weekdays" id="btn-add-weekday-price">درج</button>
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

                                    <div class="col col-md-5 col-sm-12 " id="start-date-price">
                                        <date-picker @change="onChange" v-model="date" :min="today" label="{{__('layout.public.start')}}"></date-picker>
                                    </div>
                                    <div class="col col-md-5 col-sm-12 " id="end-date-price">
                                        <date-picker @change="onChange1" v-model="date" :disabled="disabled" :min="min" label="{{__('layout.public.end')}}"></date-picker>
                                    </div>
                                    <div class="col col-md-2 col-sm-12">
                                        <button type="button" class="btn btn-outline-danger" id="btn-add-range-price">درج</button>
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
