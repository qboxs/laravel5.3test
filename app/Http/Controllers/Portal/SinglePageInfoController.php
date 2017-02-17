<?php

namespace App\Http\Controllers\Portal;

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
        return view('singlePageInfoList',compact('list'));
    }


    /**
     * 单页显示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $obj = SinglePageInfo::find($id);
        if($obj == null || empty($obj)){
            $obj = new SinglePageInfo();
        }
        return view('singlePageInfo',compact('obj'));
    }


}
