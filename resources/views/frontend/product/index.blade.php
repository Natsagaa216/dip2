<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apparel</title>
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
    @vite(['resources/css/apparel.css'])
</head>
<body>

    <div class="container">
        <div class="nav-container">
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
                    @foreach($products as $item)
                    <div class="col-md-3">
                        <div class="img-cont">
                            <a href="{{ url('product/' . $item->slug) }}" id="neg">
                                <img src="{{asset($item->image)}}" alt="">
                                <div class="text">
                                    <h3>{{$item->name}}</h3>
                                </div>
                            </a>
                            <h5>${{$item->price}}.00</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="carousel">
                <div class="left__carousel"></div>
                <div class="right__carousel"></div>
                <div class="carousel__inner">
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/1.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/2.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/3.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/4.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/5.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/6.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/5.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/4.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/3.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/2.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/1.png')}}" alt="">
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/image/carousel/4.png')}}" alt="">
                  </div>
                </div>
            </div>


        </div>
    </div>
















    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
