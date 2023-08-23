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

        $data3 = [
            ['name' => 'yamada', 'mail' => 'yamada@test.com'],
            ['name' => 'tanaka', 'mail' => 'tanaka@test.com'],
            ['name' => 'suzuki', 'mail' => 'suzuki@test.com'],
        ];

        $data4 = "Hello!!!!";

        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    public function post(Request $request)
    {
        // $msg = $request->msg;
        // $data = [
        //     'msg' => 'こんにちは' . $msg . 'さん！！'
        // ];

        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request, $validate_rule);

        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
