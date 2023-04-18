<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $purchases = Buy::where('user_id',$user_id)->with('commodity')->orderBy('created_at','DESC')->get();
//        dd($purchases);
//        $last_row=Buy::latest('created_at')->first();
//        $last_row ? $new_code = $last_row->code +1 : $new_code=10001;
        $action = "insert";
        return view('back.mali.buy',compact('purchases','action'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $buy = $request->isMethod("POST") ? new Buy() : Buy::findOrFail($request->id);
        $this->validate($request, [
            "commodity_id" => "required",
            "count" => "required",
            "inventory" => "required",
            "unit_price" => "required",
            "total_price" => "required",
            "date" => "required",
            "unit_sale_price" => "required",
            "total_sale_price" => 'required',
        ]);
        $user_id =Auth::user()->id;
        $buy->user_id = $user_id;
        $buy->commodity_id = $request->commodity_id;
        $buy->count = str_replace(',','',$request->count);
        $buy->inventory = $request->inventory;
        $buy->unit_price = str_replace(',','',$request->unit_price);
        $buy->total_price = str_replace(',','',$request->total_price);
        $buy->date = $request->date;
        $buy->description = $request->description;
        $buy->unit_sale_price = str_replace(',','',$request->unit_sale_price);
        $buy->total_sale_price = str_replace(',','',$request->total_sale_price);
        $buy->save();
        return self::redirectWithSuccess(route('mali.purchases.index'), 'ثبت با موفقیت انجام شد.');
    }


    public function show(Buy $buy)
    {
        //
    }


    public function edit(Buy $buy)
    {
        //
    }


    public function update(Request $request, Buy $buy)
    {
        //
    }


    public function destroy(Buy $buy)
    {
        //
    }

        //API

    public function delete_buy(Request $request)
    {
        $user_id =Auth::user()->id;
        $buy = Buy::where('user_id',$user_id)->where('id',$request->id)->firstOrFail();
        if ($buy)
        {
            $buy->delete();
            return response()->json($request->id);
        }
        else{
            return response()->json(false);

        }
    }


    public function edit_buy(Request $request)
    {
        $user_id =Auth::user()->id;
        $buy = Buy::where('user_id',$user_id)->where('id',$request->id)->with('commodity')->firstOrFail();
        if ($buy)
        {
            return response()->json($buy);
        }
        else{
            return response()->json(false);
        }
    }

    public function get_available_factors(Request $request)
    {
        $user_id =Auth::user()->id;
        $buy = Buy::where('user_id',$user_id)->where('commodity_id',$request->id)->where('inventory','>',0)->get();
        return response()->json($buy);
    }

    public function select2_get_commodity_id(Request $request)
    {
        // مبلغ تسهیم یافته به تفکیک شهرستان
        $search = $request->q;
        $data = Buy::where(function($query) use ($search){
            $query->where('title', 'LIKE', '%'.$search.'%')
                ->orwhere('code', 'LIKE', "%$search%");
        })
            ->limit(20)
            ->get();
        return response()->json($data);
    }


}
