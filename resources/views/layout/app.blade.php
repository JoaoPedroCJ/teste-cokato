<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teste COKATO</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/skins/skin-blue.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">

    @yield('cokatoContent')

    <script src="{{ URL::to('/') }}/js/cokato.js"></script>

</body>
</html>