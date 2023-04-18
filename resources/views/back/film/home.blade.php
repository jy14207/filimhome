@extends('back.layouts.film_layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize pe-3">آپلود فیلم</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-3">
                    <div class="row p-4">
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="type_id" >نوع فیلم :</label>
                            <select class="form-control border p-1" id="type_id" name="type_id">
                                <option value="0">فیلم سینمایی</option>
                                <option value="1">انیمیشن</option>
                                <option value="1">سریال</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="type_id" >کشور سازنده :</label>
                            <select class="form-control border p-1" id="type_id" name="type_id">
                                <option value="0">ایرانی</option>
                                <option value="1">امریکایی</option>
                                <option value="1">هندی</option>
                                <option value="1">کره ای</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="persian_title">نام فارسی :</label>
                            <input id="persian_title" class="form-control border " type="text" aria-label="default input example" style="padding-top: 4px;padding-bottom: 4px;">
                        </div>
                        <div class="col col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="type_id" >ژانر :</label>
                            <select class="form-control border p-1" id="type_id" name="type_id">
                                <option value="0">درام</option>
                                <option value="1">رمانتیک</option>
                                <option value="1">اکشن</option>
                                <option value="1">جنگی</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="type_id" >زبان :</label>
                            <select class="form-control border p-1" id="type_id" name="type_id">
                                <option value="0">انگلیسی</option>
                                <option value="1">دوبله فارسی</option>
                                <option value="1">سایر</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="persian_title">سال ساخت :</label>
                            <input id="persian_title" class="form-control border " type="number" aria-label="default input example" style="padding-top: 4px;padding-bottom: 4px;">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-3 ">
                            <label for="persian_title">درباره فیلم :</label>
                            <textarea id="persian_title" class="form-control border " aria-label="default input example" style="padding-top: 4px;padding-bottom: 4px;"></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
                            <label for="persian_title">داستان فیلم :</label>
                            <textarea id="persian_title" class="form-control border " aria-label="default input example" style="padding-top: 4px;padding-bottom: 4px;"></textarea>
                        </div>

                    </div>
                </div>
                <div class="card-footer p-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3 text-start float-end">
                            <a class="btn bg-gradient-dark mb-0 w-100 fa-pull-left" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;ذخیره</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
