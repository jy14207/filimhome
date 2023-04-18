@extends('back.layouts.mali_layout')
@section('page_title','ثبت دخل روزانه')
@section('content')
    <x-success></x-success>
    <x-errors></x-errors>
    <div class="row">
        <div class="col-12">
            <form action="{{route('mali.cash.store')}}"
                  method="post" enctype="multipart/form-data"
                  id="cash_form">
                @csrf
                {{method_field('POST')}}
                <input id="id" name="id" type="hidden"/>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize pe-3">ثبت دخل روزانه</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-3">
                        <div class="row p-4">
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="resource">منبع :</label>
                                <select class="form-select border form-control" aria-label="Default select example"
                                        style="padding-top: 4px;padding-bottom: 4px;"
                                        name="resource" id="resource">
                                    @foreach($resource_option as $item)
                                        <option @if(old('resource') == $item->value) selected
                                                @endif value="{{$item->value}}">{{$item->text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="cost_amount">مبلغ :</label>
                                <input id="cash_amount" name="amount" class="form-control border p-1 number" type="text"
                                       aria-label="default input example"
                                       value="{{old('amount')}}"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="cost_date">تاریخ :</label>
                                <input data-jdp id="cash_date" name="date" class="form-control border p-1" type="text"
                                       aria-label="default input example"
                                       value="{{old('date')}}"
                                       style="padding-top: 4px;padding-bottom: 4px;">

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3 d-none" id="description_div">
                                <label for="description">توضیحات بیشتر :</label>
                                <input id="description" name="description" class="form-control border p-1" type="text"
                                       aria-label="default input example"
                                       value="{{old('description')}}"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-2">
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-xs-12 col-sm-4 col-md-3 text-start float-end">
                                <a class="btn bg-gradient-dark mb-0 w-100 fa-pull-left" id="submit_btn"
                                   href="javascript:;"
                                   onclick="document.getElementById('cash_form').submit();">
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
    @if(count($cashes))
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-1 pb-1">
                            <h6 class="text-white text-capitalize pe-3 m-1 small">لیست مبالغ ثبت شده</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-3">
                        <div class="row p-4" style="overflow-x: auto; overflow-y: hidden;">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class=" align-middle text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            عنوان هزینه
                                        </th>
                                        <th class="align-middle text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            مبلغ
                                        </th>
                                        <th class="align-middle text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            تاریخ
                                        </th>

                                        <th class="align-middle text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ویرایش
                                        </th>
                                        <th class=" align-middle text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            حذف
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cashes as $item)
                                        <tr id="{{$item->id}}">
                                            <td class="align-middle text-center ">
                                                @if($item->combo->value == 5 )
                                                    <h6 class="mb-0 text-sm">{{$item->combo->text}}</h6>
                                                    <small class="text-xxs">{{$item->description}}</small>
                                                @else
                                                    <h6 class="mb-0 text-sm">{{$item->combo->text}}</h6>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center ">
                                                {{number_format($item->amount, 0, '.', ',')}}
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm text-center">{{$item->date}}</h6>
                                            </td>
                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center; flex-direction: row"
                                                    class="btn icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-xl edit_cash">
                                                    <i class="material-icons opacity-10"
                                                       id="edit_i_{{$item->id}}">edit</i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center;"
                                                    class="btn icon-md icon-shape bg-gradient-danger shadow-info text-center border-radius-xl delete_cash">
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
