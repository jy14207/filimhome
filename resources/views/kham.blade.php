@extends('back.layouts.mali_layout')
@section('page_title','تعریف کالا')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize pe-3">تعریف کالای جدید</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-3">
                    <div class="row p-4">
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                            <label for="persian_title">کد کالا :</label>
                            <input id="persian_title" class="form-control border p-1 " type="number" aria-label="default input example" style="padding-top: 4px;padding-bottom: 4px;">
                        </div>
                    </div>

                </div>
                <div class="card-footer p-2">
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-xs-12 col-sm-4 col-md-3 text-start float-end">
                            <a class="btn bg-gradient-dark mb-0 w-100 fa-pull-left" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;ذخیره</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
