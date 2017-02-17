<?php

namespace App\Http\Controllers\Admin;

use App\Model\NewsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class NewsTypeController extends Controller
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
        $list = NewsType::all();
        //dd($list -> toArray());
        if(!is_null($filtersLength)){
            return response()->json($list -> toArray());
        }else{
            return view('admin.newsTypeList',compact('list'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new NewsType();
        return view('admin.newsType',compact('obj'));
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
        NewsType::create($input);
        return response()->json($input);
       // return redirect('admin/newsType');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $obj = NewsType::find($id);
      //  $list = $obj ->childType;
      //  return response()->json($list);
        $typeList = NewsType::orderBy('pk_id','asc') -> get();
        Log::info($typeList ->toArray());
       $ss= $this::sortMenu($typeList ->toArray(),1);
       dd($typeList);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = NewsType::find($id);
        if($obj == null || empty($obj)){
            $obj = new NewsType();
        }
        return view('admin.newsType',compact('obj'));
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
        NewsType::find($id) ->update($input);
        return response()->json($input);
       // return redirect('admin/newsType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('NewsTypeController删除操作,删除ID='.$id);
        $result = NewsType::destroy($id);
        return response()->json(['id' => $id,'result' => $result]);
    }

    public function sortMenu($menus,$pid = 1)
    {


        $arr = [];

        if (empty($menus)) {
            return '';
        }

        foreach ($menus as $k => $v) {
            if ($v['parent_id'] == $pid) {
                Log::info($k);
                $arr[$k] = $v;
                $arr[$k]['childType'] = self::sortMenu($menus,$v->pk_id);
            }
        }

        return $arr;
    }
}
