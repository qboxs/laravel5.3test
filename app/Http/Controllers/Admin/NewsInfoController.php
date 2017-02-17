<?php

namespace App\Http\Controllers\Admin;

use App\Model\NewsInfo;
use App\Model\NewsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Psy\Exception\ErrorException;

class NewsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = NewsInfo::paginate(50);
        return view('admin.newsInfoList',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeList = NewsType::all();
        $obj = new NewsInfo();
        return view('admin.newsInfo',compact('obj','typeList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('pic_file');
        $input  = $request -> except('_token','_method','pic_file','editorValue');
        if ($file !=null && $file -> isFile()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            $fileNames = $file->getFilename().'.'.$ext;
            //基于驱动的存储目录，文件名称，驱动（filesystems.php的配置）
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            $path =  $file -> storePubliclyAs('uploadfiles/newsInfo', $filename,'public_uploads');
            $logoPath = $path;
            $input['pic_url']=$logoPath;
        }
       // $input['skim_count']=1;
        NewsInfo::create($input);
        return redirect('admin/newsInfo');
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
    {   $typeList = NewsType::all();
        $obj = NewsInfo::find($id);
        if($obj == null || empty($obj)){
            $obj = new NewsInfo();
        }
        return view('admin.newsInfo',compact('obj','typeList'));
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
        $file = $request->file('pic_file');
        $input  = $request -> except('_token','_method','pic_file','editorValue');
        $obj = NewsInfo::find($id);
        $pic_path = $obj -> pic_url;
        if ($file !=null && $file -> isFile() ) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            $fileNames = $file->getFilename().'.'.$ext;
            //基于驱动的存储目录，文件名称，驱动（filesystems.php的配置）
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            $path =  $file -> storePubliclyAs('uploadfiles/newsInfo', $filename,'public_uploads');
            $picPath = $path;
            $input['pic_url']=$picPath;
            if(!empty($pic_path)){
                try{
                    $delete_result = Storage::disk('public_uploads')->delete($pic_path);//删除需要指定驱动，不指定驱动默认在storage/app目录下
                }catch (ErrorException $e){
                    Log::info($e->getMessage());
                }
            }
        }else{
            $input['pic_url']=null;
            if(!empty($pic_path)){
                try{
                    $delete_result = Storage::disk('public_uploads')->delete($pic_path);//删除需要指定驱动，不指定驱动默认在storage/app目录下
                }catch (ErrorException $e){
                    Log::info($e->getMessage());
                }
            }
        }
        $obj  ->update($input);
        return redirect('admin/newsInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('NewsInfoController删除操作,删除ID='.$id);
        $result = NewsInfo::destroy($id);
        return response()->json(['id' => $id,'result' => $result]);
    }
}
