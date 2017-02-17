<?php

namespace App\Http\Controllers\Admin;

use App\Model\CooperativeAdver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Psy\Exception\ErrorException;

class CooperativeAdverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = CooperativeAdver::all();
        return view('admin.cooperativeAdverList',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new CooperativeAdver();
        return view('admin.cooperativeAdver',compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('logo_file');
        $input  = $request -> except('_token','_method','logo_file');
        if ($file !=null && $file -> isFile()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            $fileNames = $file->getFilename().'.'.$ext;
            //基于驱动的存储目录，文件名称，驱动（filesystems.php的配置）
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            $path =  $file -> storePubliclyAs('uploadfiles/cooperativeAdver', $filename,'public_uploads');
            $logoPath = $path;
            $input['logo_url']=$logoPath;
        }

        CooperativeAdver::create($input);
        return redirect('admin/cooperativeAdver');
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
        $obj = CooperativeAdver::find($id);
        if($obj == null || empty($obj)){
            $obj = new CooperativeAdver();
        }
        return view('admin.cooperativeAdver',compact('obj'));
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
        $file = $request->file('logo_file');
        $link_type = $request ->input('type');
        $input  = $request -> except('_token','_method','logo_file');
        $obj = CooperativeAdver::find($id);
        $logo_path = $obj -> logo_url;
        if ($file !=null && $file -> isFile() && $link_type==1) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            $fileNames = $file->getFilename().'.'.$ext;
            //基于驱动的存储目录，文件名称，驱动（filesystems.php的配置）
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            $path =  $file -> storePubliclyAs('uploadfiles/cooperativeAdver', $filename,'public_uploads');
            $logoPath = $path;
            $input['logo_url']=$logoPath;
            if(!empty($logo_path)){
                try{
                    $delete_result = Storage::disk('public_uploads')->delete($logo_path);//删除需要指定驱动，不指定驱动默认在storage/app目录下
                }catch (ErrorException $e){
                    Log::info($e->getMessage());
                }
            }
        }else{
            $input['logo_url']=null;
            if(!empty($logo_path)){
                try{
                    $delete_result = Storage::disk('public_uploads')->delete($logo_path);//删除需要指定驱动，不指定驱动默认在storage/app目录下
                }catch (ErrorException $e){
                    Log::info($e->getMessage());
                }
            }
        }
        $obj  ->update($input);
        return redirect('admin/cooperativeAdver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('CooperativeAdverController删除操作,删除ID='.$id);
        $result = CooperativeAdver::destroy($id);
        return response()->json(['id' => $id,'result' => $result]);
    }
}
