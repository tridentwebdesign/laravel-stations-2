<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>座席表</title>
</head>
<body>
    <h1>座席表</h1>
    <table border="1">
        <tr>
            <td></td>
            <td></td>
            <td>スクリーン</td>
            <td></td>
            <td></td>
        </tr>
        @foreach (['a', 'b', 'c'] as $row)
            <tr>
                @foreach (range(1, 5) as $column)
                    <td>{{ $row . '-' . $column }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>