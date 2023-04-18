@extends('back.layouts.mali_layout')
@section('page_title','تعریف کالا')
@section('content')
    <x-success></x-success>
    <x-errors></x-errors>
    <div class="row">
        <div class="col-12">
            <form action="{{route('mali.commodity.store')}}"
                  method="post" enctype="multipart/form-data"
                  id="commodity_form">
                @csrf
                {{method_field('POST')}}
                <input id="id" name="id" type="hidden" />
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize pe-3">تعریف کالای جدید</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-3">
                        <div class="row p-4">
                            <div class="col-xs-12 col-sm-6 col-md-2 mb-3">
                                <label for="persian_title">کد کالا :</label>
                                <input id="code" name="code" class="form-control border p-1 " type="number"
                                       aria-label="default input example"
                                       value="{{$new_code}}"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 mb-3">
                                <label for="title">نام کالا :</label>
                                <input id="title" name="title" class="form-control border p-1" type="text"
                                       aria-label="default input example"
                                       autofocus
                                       style="padding-top: 4px;padding-bottom: 4px;">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-2 mb-3">
                                <label for="category">دسته کالا :</label>
                                <input id="category_id" name="category_id" class="form-control border p-1" type="text"
                                       aria-label="default input example"
                                       value="1"
                                       style="padding-top: 4px;padding-bottom: 4px;">

                            </div>

                        </div>
                    </div>
                    <div class="card-footer p-2">
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-xs-12 col-sm-4 col-md-3 text-start float-end">
                                <a class="btn bg-gradient-dark mb-0 w-100 fa-pull-left" id="submit_btn"
                                   href="javascript:;"
                                   onclick="document.getElementById('commodity_form').submit();">
                                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;ذخیره</a>
                            </div>
                            <input type="submit" style="visibility: hidden;"/>
                            {{--                                برای زدن کلید انتر در تکست باکس ها--}}

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(count($commodities))
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-1 pb-1">
                            <h6 class="text-white text-capitalize pe-3 m-1 small">لیست کالاهای ثبت شده</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-3">
                        <div class="row p-4" style="overflow-x: auto; overflow-y: hidden;">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            کد کالا
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            نام کالا
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ویرایش
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            حذف
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($commodities as $item)
                                        <tr id="{{$item->id}}">

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$item->code}}</p>
                                            </td>
                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm">{{$item->title}}</h6>
                                            </td>
                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center; flex-direction: row"
                                                    class="btn icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-xl edit_commodity">
                                                    <i class="material-icons opacity-10" id="edit_i_{{$item->id}}">edit</i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center;"
                                                    class="btn icon-md icon-shape bg-gradient-danger shadow-info text-center border-radius-xl delete_commodity">
                                                    <i class="material-icons opacity-10" id="delete_i_{{$item->id}}">delete</i>
                                                </a>

                                                <!--                                        <a class="icon icon-md icon-shape  bg-gradient-danger shadow-info text-center border-radius-xl ">
                                                                                            <i class="material-icons opacity-10">delete</i>
                                                                                        </a>-->
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
