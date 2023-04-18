<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $sales = Sale::where('user_id',$user_id)->with('commodity')->orderBy('created_at','DESC')->get();
        $action = "insert";
        return view('back.mali.sale',compact('sales', 'action'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $sale = $request->isMethod("POST") ? new Sale() : Sale::findOrFail($request->id);
        $this->validate($request, [
            "commodity_id" => "required",
            "invoices_with_inventory" => "required",
            "count" => "required",
            "unit_price" => "required",
            "total_price" => "required",
            "date" => "required",
        ]);
        if ($request->discount_price == '') $request->discount_price =0;

        $count = str_replace(',','',$request->count);
        $buy = Buy::where('id',$request->invoices_with_inventory)->firstOrFail();
        $inventory_count = $buy->inventory;
        if($inventory_count < (int)$count ){
            $message = 'تعداد کالاهای موجود در انبار(' .$inventory_count.' عدد) کمتر از تعداد درخواست شده می باشد.';
            return self::redirectBackWithError( $message);
        }
        $user_id =Auth::user()->id;
        $sale->user_id = $user_id;
        $sale->commodity_id = $request->commodity_id ;
        $sale->invoices_with_inventory = $request->invoices_with_inventory ;
        $sale->count = $count;
        $sale->unit_price = str_replace(',','',$request->unit_price);
        $sale->total_price = str_replace(',','',$request->unit_price) * $count;
        $sale->discount_price =str_replace(',','',$request->discount_price); ;
        $sale->date = $request->date ;
        $sale->save();
        $buy->inventory = $buy->inventory - (int)str_replace(',','',$request->count);
        $buy->save();
        return self::redirectWithSuccess(route('mali.sales.index'), 'ثبت با موفقیت انجام شد.');



    }


    public function show(Sale $sale)
    {
        //
    }


    public function edit(Sale $sale)
    {
        //
    }


    public function update(Request $request, Sale $sale)
    {
        //
    }


    public function destroy(Sale $sale)
    {
        //
    }

    //API
    public function delete_sale(Request $request)
    {
        $user_id =Auth::user()->id;
        $sale = Sale::where('user_id',$user_id)->where('id',$request->id)->firstOrFail();
        if ($sale)
        {
            $count = $sale->count;
            $buy = Buy::where('id',$sale->invoices_with_inventory)->firstOrFail();
            $buy->inventory = $buy->inventory + $count;
            $buy->save();
            $sale->delete();
            return response()->json($request->id);
        }
        else{
            return response()->json(false);
        }
    }


    public function edit_sale(Request $request)
    {
        $user_id =Auth::user()->id;
        $sale = Sale::where('user_id',$user_id)->where('id',$request->id)->with('commodity')->firstOrFail();
        if ($sale)
        {
            return response()->json($sale);
        }
        else{
            return response()->json(false);
        }
    }

}
