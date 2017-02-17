<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Support\Facades\Log;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Feedback::all();
        return view('admin.feedbackList',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new Feedback();
        return view('admin.feedback',compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = $request -> except('_method','_token');
        //Log::info(dd($obj));
        Feedback::create($obj);
        return redirect('admin/feedback');
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
        $obj = Feedback::find($id);
        if($obj == null || empty($obj)){
            $obj = new Feedback();
        }
        return view('admin.feedback',compact('obj'));
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
        Feedback::find($id) ->update($input);
        return redirect('admin/feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Log::info('FeedbackController删除操作,删除ID='.$id);
        $result = Feedback::destroy($id);
        return response()->json(['id' => $id,'result' => $result, 'state' => 'CA']);
    }
}
