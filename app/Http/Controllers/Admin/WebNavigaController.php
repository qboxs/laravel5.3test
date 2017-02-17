<?php

namespace App\Http\Controllers\Admin;

use App\Model\WebNaviga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WebNavigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = WebNaviga::all();
        return view('admin.webNavigaList',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new WebNaviga();
        return view('admin.webNaviga',compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = $request -> except('_token','_method');
        WebNaviga::create($obj);
        return redirect('admin/webNaviga');
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
        $obj = WebNaviga::find($id);
        if($obj == null || empty($obj)){
            $obj = new WebNaviga();
        }
        return view('admin.webNaviga',compact('obj'));
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
        $input = $request -> except('_token','_method');
        WebNaviga::find($id) ->update($input);
        return redirect('admin/webNaviga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('WebNavigaController删除操作,删除ID='.$id);
        $result = WebNaviga::destroy($id);
        return response()->json(['id' => $id,'result' => $result, 'state' => 'CA']);
    }
}
