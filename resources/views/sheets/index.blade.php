<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>座席表</title>
</head>
<body>
    <h1>スクリーン</h1>
    <table border="1">
      <caption>座席表</caption>
        <tr>
            <th>1列目</th>
            <th>2列目</th>
            <th>3列目</th>
            <th>4列目</th>
            <th>5列目</th>
        </tr>
        @foreach ($sheets as $row => $columns)
            <tr>
                @foreach ($columns as $column)
                    <td>{{ $row }}-{{ $column->column }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>