<?php

namespace App\Http\Controllers\Portal;

use App\Model\FriendshipLink;
use App\Model\ProductInfo;
use App\Model\WebDomainConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortalHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productList =   ProductInfo::where('status', '1')-> where('type_id','<>','12')
            ->orderBy('sorts', 'desc')
            ->take(8)
            ->get();
        $productByTypeList =   ProductInfo::where('status', '1')-> where('type_id','=','12')
            ->orderBy('sorts', 'desc')
            ->take(4)
            ->get();
        //友情链接
        $friendshipLinkList =   FriendshipLink::where('status', '1')
            ->orderBy('sorts', 'desc')
            ->take(8)
            ->get();
        $domainConfig = WebDomainConfig::find(1);
      //dd($productList -> toArray());

        return view('home',compact('productList','productByTypeList','friendshipLinkList','domainConfig'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
