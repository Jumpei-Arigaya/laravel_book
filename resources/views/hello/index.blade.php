{{-- <html>

<head>
    <title>Hello/Index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 100pt;
            text-align: right;
            color: #f6f6f6;
            margin: -50px 0px -100px 0px;
        }
    </style>
</head>

<body> --}}
{{-- <div>
        <h1>Index</h1>
        <p>This is a sample page with php-template.</p>
        <p><?php echo $msg1; ?></p>
        <p><?php echo date('Y年n月j日'); ?></p>
        <p><?php echo $id; ?></p>
    </div> --}}
{{-- <p>{{ $msg2 }}</p> --}}
{{-- <div>
        <h1>Blade/Index</h1>
        @isset($msg)
            <p>こんにちは、{{ $msg }}さん</p>
        @else
            <p>なにか書いてください</p>
        @endisset
        <p>&#64;foreachディレクティブの例</p>
        <ol>
            @foreach ($data as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ol>
    </div>
    <div> --}}
{{-- <p>&#64;forディレクティブの例</p>
        <ol>
            @for ($i = 1; $i < 100; $i++)
                @if ($i % 2 == 1)
                    @continue
                @elseif ($i <= 10)
                    <li>No, {{ $i }}</li>
                @else
                    <p>nannde{{ $i }}</p>
                @endif
            @endfor
        </ol> --}}
{{-- </div> --}}
{{-- <div>
        <p>&#64;forディレクティブの例</p>
        <ol>
            @foreach ($data as $item)
                @if ($loop->first)
                    <p>※データ一覧</p>
                    <ul>
                @endif
                <li>No. {{ $loop->iteration }}. {{ $item }}</li>
                @if ($loop->last)
                    </ul>
                    <p>--ここまで</p>
                @endif
            @endforeach
        </ol>
    </div> --}}
{{-- <div>
        <h1>Blade</h1>
        <p>&#64;whileディレクティブの例</p>
        <ol>
            @php
                $counter = 0;
            @endphp
            @while ($counter < count($data))
                <li>{{ $data[$counter] }}</li>
                @php
                    $counter++;
                @endphp
            @endwhile
        </ol>
    </div>
    <div>
        <form method="POST" action="/hello">
            @csrf
            <input type="text" name='msg'>
            <input type="submit">
        </form>
    </div> --}}
{{-- </body>

</html> --}}

@extends('layouts.helloapp')
@section('title', 'Index')
@section('menubar')
    @parent
    インデックスページ
@endsection

{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot
        @slot('msg_content')
            これはメッセージの表示です
        @endslot
    @endcomponent
@endsection
@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot
        @slot('msg_content')
            これはメッセージの表示です
        @endslot
    @endcomponent
@endsection --}}
{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>

    @include('components.message', ['msg_title' => 'ok', 'msg_content' => 'サブビューです'])
@endsection --}}

{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <ul>
        @each ('components.item', $data, 'item')
    </ul>
@endsection

@section('footer')
    copyright 2023 jun.
@endsection --}}

{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <p>Controller value<br>'message' = {{ $message }}</p>
    <p>ViewComposer value<br>'view_message' = {{ $view_message }}</p>
@endsection --}}

{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <table>
        @foreach ($data as $item)
            <tr>
                <th>
                    {{ $item['name'] }}
                </th>
                <td>
                    {{ $item['mail'] }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection --}}

{{-- @section('content')
    <p>ここが本文のコンテンツです</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです</p>
@endsection --}}

{{-- @section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <p>
            入力に問題があります。再入力してください。
        </p>
    @endif
    <form action="/hello" method="post">
        {{-- @csrf --}}
{{-- <table>
    @error('name')
        <tr>
            <th>エラー！</th>
            <td>{{ $message }}</td>
        </tr>
    @enderror
    <tr>
        <th>name:</th>
        <td><input type="text" name="name" value="{{ old('name') }}"></td>
    </tr>
    @error('mail')
        <tr>
            <th>エラー！</th>
            <td>{{ $message }}</td>
        </tr>
    @enderror
    <tr>
        <th>mail:</th>
        <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
    </tr>
    @error('age')
        <tr>
            <th>エラー！</th>
            <td>{{ $message }}</td>
        </tr>
    @enderror
    <tr>
        <th>age:</th>
        <td><input type="text" name="age" value="{{ old('age') }}"></td>
        <th>name:</th>
        <td><input type="submit" value="send"></td>
    </tr>
    </tr>
</table>
</form>
@endsection --}}

{{-- @section('content')
    <p>{{ $msg }}</p>
    {{ $errors->first('msg') }}
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif
    <form action="/hello" method="post">
        <table>
            @csrf
            @if ($errors->has('msg'))
                <tr>
                    <th>ERROR</th>
                    <td>{{ $errors->first('msg') }}</td>
                </tr>
            @endif
            <tr>
                <th>Message: </th>
                <td><input type="text" name="msg" value="{{ old('msg') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection
 --}}

@section('content')
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    @endsection
</table>

@section('footer')
    copyright 2023 jun.
@endsection
