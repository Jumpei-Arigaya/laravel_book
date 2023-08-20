<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            // 'msg1' => 'これはコントローラから渡されたメッセージです',
            // 'msg2' => 'これはコントローラから渡されてBladeを使用して表示しているメッセージです',
            // 'msg' => '名前を入力してください',
            // 'id' => $request->id
        ];

        $data2 = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.index', ['data' => $data2]);
    }

    public function post(Request $request)
    {
        // $msg = $request->msg;
        // $data = [
        //     'msg' => 'こんにちは' . $msg . 'さん！！'
        // ];
        return view('hello.index', ['msg' => $request->msg]);
    }
}
