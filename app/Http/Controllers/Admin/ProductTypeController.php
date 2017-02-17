<?php

namespace App\Http\Controllers\Admin;

use App\Model\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $uri = $request -> getUri();
        $filtersLength = $request -> get('filterslength');

        Log::info('uri:'.$uri.'---$filtersLength:'.$filtersLength);
        $list = ProductType::all();
        //dd($list -> toArray());
        if(!is_null($filtersLength)){
            return response()->json($list -> toArray());
        }else{
            return view('admin.productTypeList',compact('list'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new ProductType();
        return view('admin.productType',compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request -> except('_token','_method');
        ProductType::create($input);
        return response()->json($input);
        //return redirect('admin/productType');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = ProductType::find($id);
        if($obj == null || empty($obj)){
            $obj = new ProductType();
        }
        return view('admin.productType',compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input  = $request -> except('_token','_method');
        ProductType::find($id) ->update($input);
        return response()->json($input);
       // return redirect('admin/productType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('ProductTypeController删除操作,删除ID='.$id);
        $result = ProductType::destroy($id);
        return response()->json(['id' => $id,'result' => $result]);
    }
}
