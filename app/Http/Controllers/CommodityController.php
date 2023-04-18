<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommodityController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $commodities = Commodity::where('user_id',$user_id)->orderBy('code','DESC')->get();
        $last_row=Commodity::latest('created_at')->first();
        $last_row ? $new_code = $last_row->code +1 : $new_code=10001;
        $action = "insert";
        return view('back.mali.commodity',compact('commodities','action','new_code'));
    }


    public function create()
    {
        dd("create");
        //
    }


    public function store(Request $request)
    {
        $commodity = $request->isMethod("POST") ? new Commodity() : Commodity::findOrFail($request->id);
        $this->validate($request, [
            "code" => "required",
            "category_id" => "required",
            "title" => 'required',
        ]);
        $user_id =Auth::user()->id;
        $commodity->user_id = $user_id;
        $commodity->code = $request->code;
        $commodity->title = $request->title;
        $commodity->category_id = $request->category_id;
        $commodity->save();
        return self::redirectWithSuccess(route('mali.commodities.index'), 'ثبت با موفقیت انجام شد.');

    }


    public function show(Commodity $commodity)
    {
        //
    }


    public function edit(Commodity $commodity)
    {
        dd("edit");

    }


    public function update(Request $request, Commodity $commodity)
    {
        //
    }


    public function destroy(Commodity $commodity)
    {
        dd("destroy");

    }
    // API
    public function delete_commodity(Request $request)
    {
        $commodity = Commodity::where('id',$request->id)->firstOrFail();
        if ($commodity)
        {
            $commodity->delete();
            return response()->json($request->id);
        }
        else{
            return response()->json(false);
        }
    }

    public function edit_commodity(Request $request)
    {
        $commodity = Commodity::where('id',$request->id)->firstOrFail();
        if ($commodity)
        {
            return response()->json($commodity);
        }
        else{
            return response()->json(false);
        }
    }

    public function get_commodity(Request $request)
    {
        $commodity = Commodity::where('id',$request->id)->firstOrFail();
        if ($commodity)
        {
            return response()->json($commodity);
        }
        else{
            return response()->json(false);
        }
    }





// مبلغ تسهیم  یافته بر اساس فعالیت ها شهرستان خاص
    public function select2_get_commodity_id(Request $request)
    {
        // مبلغ تسهیم یافته به تفکیک شهرستان
        $search = $request->q;
        $data = Commodity::where(function($query) use ($search){
                $query->where('title', 'LIKE', '%'.$search.'%')
                    ->orwhere('code', 'LIKE', "%$search%");
            })
            ->limit(20)
            ->get();
        return response()->json($data);
    }


}
