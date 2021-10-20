<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/slick/slick.css">

    <title>PeppePizza</title>
</head>
<body>
    @if(Auth::check())
    <script>
      window.Laravel = {!!json_encode([
        'isAuthorized' => true,
        'user' => Auth::user(),
        'csrf_token' => csrf_token(),
      ])!!}
    </script>
    @else
    <script>
      window.Laravel = {!!json_encode([
        'isAuthorized' => false,
        'csrf_token' => csrf_token(),
      ])!!}
    </script>
    @endif
    <div id="app">
        <v-auth-token></v-auth-token>
        <router-view></router-view>

    </div>

    <script src="./js/app.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
</body>
</html>
