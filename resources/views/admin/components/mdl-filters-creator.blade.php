<div id="mdl-filters-creator" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="hidden" name="data-properties" value="">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="height:800px ! important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ایجاد فیلتر ها</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label for="properties">خاصیت</label>
                        <select class="form-control" id="properties" name="properties">
                            <option value="" disabled selected>انتخاب خاصیت</option>
                        </select>
                    </div>
                    <div class="col col-md-6 form-group">
                        <label for="operators">عملگر</label>
                        <select class="form-control" id="operators" name="operators">
                            <option value="" disabled selected>انتخاب عملگر</option>
                            @foreach(config('filter.operators') as $f_o)
                                <option value="{{$f_o}}">{{__('messages.filter_operators.'.$f_o) . '  (' . $f_o . ')' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-12 form-group">
                        <label for="values">مقادیر فیلتر</label>
                        <input type="text" id="values" name="values" class="form-control">
                    </div>

                    <div class="col col-md-12 form-group">
                        <button type="button" name="add-filter" class="btn btn-danger">اضافه کردن</button>
                    </div>


                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>خاصیت</th>
                                    <th>عملگر</th>
                                    <th>مقادیر</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>category</td>
                                    <td>in</td>
                                    <td>1,5,8</td>
                                    <td><a href="#"><i class="fa fa-remove"></i> </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Close</button>
                <button type="button" name="send" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>


