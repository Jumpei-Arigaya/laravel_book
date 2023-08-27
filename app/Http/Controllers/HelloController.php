<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // $data = [
        //     'msg1' => 'これはコントローラから渡されたメッセージです',
        //     'msg2' => 'これはコントローラから渡されてBladeを使用して表示しているメッセージです',
        //     'msg' => '名前を入力してください',
        //     'id' => $request->id
        // ];

        // $data2 = ['one', 'two', 'three', 'four', 'five'];

        // $data3 = [
        //     ['name' => 'yamada', 'mail' => 'yamada@test.com'],
        //     ['name' => 'tanaka', 'mail' => 'tanaka@test.com'],
        //     ['name' => 'suzuki', 'mail' => 'suzuki@test.com'],
        // ];

        // $data4 = "Hello!!!!";

        // $validator = Validator::make($request->query(), [
        //     'id' => 'required',
        //     'pass' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     $msg = 'クエリに問題があります';
        // } else {
        //     $msg = 'ID/PASSを受け付けました。フォームを入力してください';
        // }

        if ($request->hasCookie('msg')) {
            $msg = 'Cookie' . $request->cookie('msg');
        } else {
            $msg = 'クッキーはありません';
        }

        return view('hello.index', ['msg' => $msg]);
    }

    public function post(Request $request)
    {
        // $msg = $request->msg;
        // $data = [
        //     'msg' => 'こんにちは' . $msg . 'さん！！'
        // ];

        // $validate_rule = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];
        // $this->validate($request, $validate_rule);

        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];

        // $messages = [
        //     'name.required' => '名前は必ず入力してください',
        //     'mail.email' => 'メールアドレスが必要です',
        //     'age.between' => '年齢は0から150の間で入力してください',
        //     'age.numeric' => '年齢は整数で入力してください',
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // $validator->sometimes('age', 'min:0', function ($input) {
        //     return is_numeric($input->age);
        // });

        // $validator->sometimes('age', 'max:200', function ($input) {
        //     return is_numeric($input->age);
        // });

        // if ($validator->fails()) {
        //     return redirect('/hello')->withErrors($validator)->withInput();
        // }

        $validate_rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $validate_rule);

        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '{' . $msg . '}をクッキーに保存しました']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}
