<?php

namespace App\Http\Controllers\Portal;

use App\Model\ProductInfo;
use App\Model\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Psy\Exception\ErrorException;

class ProductInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type_id = $request ->get('type_id');
        $typeList = ProductType::all();
        $list = null;
        if($type_id==null || empty($type_id)){
            $list = ProductInfo::with('type')->paginate(15) ;
        }else{
            $list =  ProductInfo::where('type_id','=',$type_id)->with('type')->paginate(15) ;
       }
      //  dd($list -> toArray());
        return view('productInfoList',compact('typeList','list','type_id'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $typeList = ProductType::all();
        $obj = ProductInfo::find($id);
        $type_id = $obj->type->pk_id;
       // dd($obj );
        return view('productInfoShow',compact('typeList','obj','type_id'));
    }

}
