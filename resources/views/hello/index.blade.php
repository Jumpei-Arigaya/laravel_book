<html>

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

<body>
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
    <div>
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
    </div>
</body>

</html>
