<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="HTML, CSS, JS, Laravel">
    <meta name="author" content="Wiriya Moondee">
    <meta name="Plugins Name" content="BillDataPlugins">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>BillData Plugins</title>

    @yield('cdn')

    @yield('external-files')

</head>
<body>
    @yield('content')
</body>
</html>