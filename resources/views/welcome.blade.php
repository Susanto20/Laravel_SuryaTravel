<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hi</h1>
    @foreach ($syarat as $syt )
    <img src="{{asset('/syarat').'/'.$syt->file}}" alt="{{asset('/syarat/').$syt->file}}"/>

    @endforeach
</body>

</html>