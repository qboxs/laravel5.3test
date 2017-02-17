<?php

namespace App\Http\Controllers\Admin;

use App\Model\SinglePageInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Psy\Exception\ErrorException;

class SinglePageInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = SinglePageInfo::all();
        return view('admin.singlePageInfoList',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new SinglePageInfo();
        return view('admin.singlePageInfo',compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input  = $request -> except('_token','_method','logo_file','editorValue');
        SinglePageInfo::create($input);
        return redirect('admin/singlePageInfo');
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
        $obj = SinglePageInfo::find($id);
        if($obj == null || empty($obj)){
            $obj = new SinglePageInfo();
        }
        return view('admin.singlePageInfo',compact('obj'));
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
        $input  = $request -> except('_token','_method','logo_file','editorValue');
        $obj = SinglePageInfo::find($id)  ->update($input);
        return redirect('admin/singlePageInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('SinglePageInfoController删除操作,删除ID='.$id);
        $result = SinglePageInfo::destroy($id);
        return response()->json(['id' => $id,'result' => $result]);
    }
}
