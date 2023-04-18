<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Combos;
use App\Models\Commodity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $cashes = Cash::where('user_id',$user_id)
            ->with('combo')
            ->orderBy('created_at','DESC')->get();
        $action = "insert";
        $resource_option = Combos::where('form_name','Cash')->where('select_index','1')->get();
        return view('back.mali.cash',compact('cashes','action','resource_option'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $cash = $request->isMethod("POST") ? new Cash() : Cash::findOrFail($request->id);
        $this->validate($request, [
            "resource" => "required",
            "amount" => "required",
            "date" => 'required',
        ]);
        $user_id =Auth::user()->id;
        $cash->user_id = $user_id;
        $cash->resource = $request->resource;
        $cash->amount = str_replace(',','',$request->amount);
        $cash->date = $request->date;
        $cash->description = $request->description;
        $cash->save();
        return self::redirectWithSuccess(route('mali.cashes.index'), 'ثبت با موفقیت انجام شد.');
    }


    public function show(Cash $cash)
    {
        //
    }


    public function edit(Cash $cash)
    {
        //
    }


    public function update(Request $request, Cash $cash)
    {
        //
    }


    public function destroy(Cash $cash)
    {
        //
    }

    public function edit_cash(Request $request)
    {
        $user_id =Auth::user()->id;
        $cash = Cash::where('user_id',$user_id)->where('id',$request->id)->with('combo')->firstOrFail();
        if ($cash)
        {
            return response()->json($cash);
        }
        else{
            return response()->json(false);
        }
    }
    public function delete_cash (Request $request)
    {
        $user_id =Auth::user()->id;
        $cash = Cash::where('user_id',$user_id)->where('id',$request->id)->firstOrFail();
        if ($cash)
        {
            $cash->delete();
            return response()->json($request->id);
        }
        else{
            return response()->json(false);

        }
    }

}
