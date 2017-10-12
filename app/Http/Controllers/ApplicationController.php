<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Application;
use DB;

class ApplicationController extends Controller
{
  /*
  * 报名保存
  *
  * @param Request $request post请求
  * @return code message
  */

  public function create (Request $request)
  {
      $this->validate($request,[
        'avatar' => 'mimes:jpeg,png,gif'
      ]);

      $input = $request->except('avatar');

      $file = $request->file('avatar');
      if($file){
        $name = $request->input('name');
        $file->move( public_path().'/upload/image/', $name.".".$file->getClientOriginalExtension());
        $input['avatar'] = "image/".$name.".".$file->getClientOriginalExtension();
      }

      if(DB::table('application')->where('phone', $input['phone'])->value('id'))
      {
        return response()->json([
               'code' => '5000',
               'message' => '已报名'
        ]);
      } else {
        $result = Application::create($input);
        if($result){
              return response()->json([
               'code' => '200',
               'message' => 'apply successfully'
              ]);
          } else {
              return response()->json([
               'code' => '5001',
               'message' => 'apply fail'
              ]);
          }
      }
  }
}
