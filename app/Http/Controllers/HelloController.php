<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

        // if ($request->hasCookie('msg')) {
        //     $msg = 'Cookie' . $request->cookie('msg');
        // } else {
        //     $msg = 'クッキーはありません';
        // }

        // if (isset($request->id)) {
        //     $params = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $params);
        // } else {
        //     $items = DB::select('select * from people');
        // }

        $items = DB::select('select * from people');

        return view('hello.index', ['items' => $items]);
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

        // $validate_rule = [
        //     'msg' => 'required',
        // ];

        // $this->validate($request, $validate_rule);

        // $msg = $request->msg;
        // $response = response()->view('hello.index', ['msg' => '{' . $msg . '}をクッキーに保存しました']);
        // $response->cookie('msg', $msg, 100);
        // return $response;

        $items = DB::table('people')->get();

        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert(
            'insert into people (name, mail, age) values (:name, :mail, :age)',
            $params
        );
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $params = ['id' => $request->id];
        $items = DB::select('select * from people where id = :id', $params);
        return view('hello.edit', ['form' => $items[0]]);
    }

    public function update(Request $request)
    {
        $params = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $params);
        return redirect('/hello');
    }

    public function delete(Request $request)
    {
        $params = ['id' => $request->id];
        $items = DB::select('select * from people where id = :id', $params);
        return view('hello.del', ['form' => $items[0]]);
    }

    public function remove(Request $request)
    {
        $params = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $params);
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        // $name = $request->name;
        // $items = DB::table('people')->where('name', 'like', '%' . $name . '%')->orWhere('mail', 'like', '%' . $name . '%')->get();
        $min = $request->min;
        $max = $request->max;
        // $items = DB::table('people')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        $items = DB::table('people')->orderBy('age', 'desc')->get();
        return view('hello.show', ['items' => $items]);
    }
}
