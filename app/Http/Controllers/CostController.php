<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $costs = Cost::where('user_id',$user_id)->orderBy('created_at','DESC')->get();
        $action = "insert";
        return view('back.mali.cost',compact('costs','action'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $cost = $request->isMethod("POST") ? new Cost() : Cost::findOrFail($request->id);
        $this->validate($request, [
            "subject" => "required",
            "amount" => "required",
            "date" => 'required',
        ]);
        $user_id =Auth::user()->id;
        $cost->user_id = $user_id;
        $cost->amount =str_replace(',','',$request->amount);
        $cost->subject = $request->subject;
        $cost->date = $request->date;
        $cost->save();
        return self::redirectWithSuccess(route('mali.costs.index'), 'ثبت با موفقیت انجام شد.');

    }


    public function show(Cost $cost)
    {
        //
    }


    public function edit(Cost $cost)
    {
        //
    }


    public function update(Request $request, Cost $cost)
    {
        //
    }


    public function destroy(Cost $cost)
    {
        //
    }

    //API
    public function edit_cost(Request $request)
    {
        $cost = Cost::where('id',$request->id)->firstOrFail();
        if ($cost)
        {
            return response()->json($cost);
        }
        else{
            return response()->json(false);
        }
    }

    public function delete_cost(Request $request)
    {
        $cost = Cost::where('id',$request->id)->firstOrFail();
        if ($cost)
        {
            $cost->delete();
            return response()->json($request->id);
        }
        else{
            return response()->json(false);
        }
    }

}
