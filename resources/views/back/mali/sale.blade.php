@extends('back.layouts.mali_layout')
@section('page_title','ثبت فروش روزانه')
@section('content')
    <x-success></x-success>
    <x-errors></x-errors>
    <div class="row" id="card_main" >
        <div class="col-12" id="insert_form">

            <form action="{{route('mali.sale.store')}}"
                  method="post" enctype="multipart/form-data"
                  id="buy_form">
                @csrf
                {{method_field('POST')}}
                <input id="id" name="id" type="hidden" />
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize pe-3">ثبت فروش روزانه</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-3">

                        <div class="row p-4">
                            <div class="col-xs-12 col-sm-6 col-md-6 mb-3">
                                <label for="commodity_id" >نام یا کد کالا : </label>
                                    <select class="border p-1 select2-search-madadjoo form-control sale-commodity-select2"
                                            name="commodity_id"
                                            id="commodity_id"
                                            style="padding-top: 4px;padding-bottom: 4px;">
                                        @if($action=='edit')
                                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                        @endif
                                    </select>
                                        <small class="text-xxs">کد کالا یا نام آن را وارد کنید</small>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 mb-3">
                                <label for="invoices_with_inventory" >فاکتور های دارای موجودی : </label>
                                <select class="form-select border form-control" aria-label="Default select example"
                                        style="padding-top: 4px;padding-bottom: 4px;"
                                name="invoices_with_inventory" id="invoices_with_inventory">
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="count">تعداد کالا :</label>
                                <input id="sale_count" name="count" class="form-control border p-1 number " type="text"
                                       aria-label="default input example"
                                       style="padding-top: 4px;padding-bottom: 4px;" value="{{old("count")}}">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="unit_sale_price">قیمت واحد - فروش :</label>
                                <input id="unit_sale_price_in_sale" name="unit_price" value="{{old('unit_sale_price')}}" class=" form-control border p-1 number" type="text"
                                       aria-label="default input example"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                                <small class="text-xxs" id="unit_sale_price_profit"></small>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="total_sale_price">قیمت کل - فروش :</label>
                                <input tabindex="-1" readonly id="total_price" name="total_price" value="{{old('total_sale_price')}}" class=" form-control border p-1 number" type="text"
                                       aria-label="default input example"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                                <small class="text-xxs" id="total_price"></small>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="profit_percent">مبلغ تخفیف کل :</label>
                                <input  id="discount_price" name="discount_price" value="{{old('discount_price')}}" class=" form-control border p-1 number " type="text"
                                       aria-label="default input example" autocomplete="off"
                                       style="padding-top: 4px;padding-bottom: 4px; direction: ltr">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                                <label for="date">تاریخ :</label>
                                <input data-jdp id="date" name="date" class="form-control border p-1 " type="text"
                                       aria-label="default input example" value="{{old('date')}}" autocomplete="off"
                                       style="padding-top: 4px;padding-bottom: 4px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-2">
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-xs-12 col-sm-4 col-md-3 text-start float-end">
                                <a class="btn bg-gradient-dark mb-0 w-100 fa-pull-left" id="sale_submit_btn"
                                   href="javascript:;"
                                   onclick="document.getElementById('buy_form').submit();"><i
                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;ذخیره</a>
                            </div>
                            <input id="sale_submit_btn_hidden" type="submit" style="visibility: hidden;"/>
                            {{--                                برای زدن کلید انتر در تکست باکس ها--}}

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(count($sales))
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
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ردیف
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            نام کالا
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            تعداد
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            قیمت واحد - فروش
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            قیمت کل - فروش
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            تاریخ
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ویرایش
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            حذف
                                        </th>
<!--                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                             بیشتر
                                        </th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $item)
                                        <tr id="{{$item->id}}">
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">{{$loop->index}}</p>
                                            </td>
                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm">{{$item->commodity->title}}</h6>
                                            </td>
                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm text-center">{{$item->count}}</h6>
                                            </td>

                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm text-center">
                                                    {{number_format($item->unit_price, 0, '.', ',')}}
                                                </h6>
                                            </td>
                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm text-center">
                                                    {{number_format($item->total_price, 0, '.', ',')}}
                                                </h6>
                                            </td>
                                            <td class="align-middle ">
                                                <h6 class="mb-0 text-sm text-center">{{$item->date}}</h6>
                                            </td>

                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center; flex-direction: row"
                                                    target="card_main"
                                                    class="btn icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-xl edit_sale">
                                                    <i class="material-icons opacity-10" id="edit_sale_{{$item->id}}">edit</i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center;"
                                                    class="btn icon-md icon-shape bg-gradient-danger shadow-info text-center border-radius-xl delete_sale">
                                                    <i class="material-icons opacity-10" id="delete_sale_{{$item->id}}">delete</i>
                                                </a>
                                            </td>
<!--                                            <td class="align-middle text-center" id="{{$item->id}}">
                                                <a
                                                    style="display: inline-flex;align-items: center; justify-content: center;"
                                                    class="btn icon-md icon-shape bg-gradient-dark shadow-info text-center border-radius-xl more_sale">
                                                    <i class="material-icons opacity-10" id="more_sale_{{$item->id}}">more_horiz</i>
                                                </a>
                                            </td>-->

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
