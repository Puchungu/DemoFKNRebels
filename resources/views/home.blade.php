<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKN REBELS</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('header')
        <div class="home-img">
            <img src="https://milfshakes.es/cdn/shop/files/MURDER_tee_chico2_front_WEB.jpg?v=1736519076">
            <a href="{{route('show.manproducts')}}"><h1 class="home-h1-1">Man</h1></a>
            <img src="https://milfshakes.es/cdn/shop/files/MURDER_tee_chica_back_4_WEB.jpg?v=1736519076">
            <a href="{{route('show.Womanproducts')}}"><h1 class="home-h1-2">Woman</h1></a>
        </div>
    @include('footer')
</body>
</html>