<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add cart</title>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Contrail+One&family=Ga+Maamli&family=Permanent+Marker&display=swap" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Jersey+25&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <!-- Css -->
        @vite(['resources/css/upcoming.css'])
    </head>
    <body>
        <div class="nav">
            <ul class="nav-links">
                <li class="nav-link services">
                    <a href="{{route('index')}}">HOME</a>
                </li>
                <li class="nav-link services">
                    <a href="{{route('frontend.products')}}">APPAREL</a>
                </li>
                <li class="nav-link services">
                    <a href="{{url('frontend/music')}}">MUSIC</a>
                </li>
                <li class="nav-link services">
                    <a href="">TICKETS
                        <span class="material-icons dropdown-icon">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="drop-down">
                        <li><a id="a" href="#">Metro Boomin</a></li>
                        <li><a id="a" href="#">Billie Eilish</a></li>
                        <li><a id="a" href="#">CAS</a></li>
                        <li><a id="a" href="#">Eminem</a></li>
                        <li><a id="a" href="#">Russ</a></li>
                        <li><a id="a" href="#">Joji</a></li>
                    </ul>
                </li>
            </ul>
            <div class="icons">
                <a href="#"><i class="bi bi-person"></i></a>
                <a href="{{route('frontend.carts')}}"><i class="bi bi-cart2"></i></a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach($upcomings as $item)
                <div class="col-md-6">
                    <div class="shows__container">
                        <a href="{{ url('upcoming/' . $item->slug) }}">
                            <h2>Upcoming Shows</h2>
                            <h3>2024</h3>
                            <p>
                                <a href="#"><span>{{$item->show_date}}</span> {{$item->show_date}}  {{$item->venue}}</a>
                            </p>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="col-md-6">
                    <div class="right">
                        <img src="{{asset('assets/image/cas-image/cas-slide2.jpg')}}" alt="">
                        <div class="title">
                            <h1>Cigarettes after sex</h1>
                        </div>
                        <div class="text">
                            <div class="hov"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>











        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
