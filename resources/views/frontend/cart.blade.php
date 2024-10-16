<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Contrail+One&family=Ga+Maamli&family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Jersey+25&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

    <!-- Css -->
    @yield('style')
    @vite(['resources/css/cart.css'])
</head>
<body>

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
    </div>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('index') }}">Home</a>
                            <a href="{{ route('frontend.products') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cart_data as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset($item->product->image) }}" style="width: 100px; height: 100px" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->product->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ $item->product->price }}₮</td>
                                    <td class="cart__price">{{ $item->product->sale_percent }}%</td>

                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="number" name="quantity" class="quantity-input"
                                                       value="{{ $item->quantity }}"
                                                       min="1"
                                                       max="{{ $item->product->quantity }}">
                                            </div>
                                        </div>
                                    </td>

                                    <td class="cart__price total-price">{{ $item->quantity * $item->product->price * (1 - $item->product->sale_percent / 100) }}₮</td>
                                    <td class="cart__close">
                                        <i class="fa fa-close remove-item"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h4>Total: <span id="cart-total">{{ $total_price }}₮</span></h4>
                            <a href="{{ route('checkout') }}" class="primary-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@section('script')
    <script>
        var proQty = $('.pro-qty-2');
        proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
        proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');

        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var $input = $button.parent().find('input');
            var oldValue = parseInt($input.val());
            var maxVal = parseInt($input.attr('max'));
            var newVal;

            if ($button.hasClass('inc')) {
                newVal = oldValue < maxVal ? oldValue + 1 : maxVal;
            } else {
                newVal = oldValue > 1 ? oldValue - 1 : 1;
            }

            $input.val(newVal).trigger('change');
        });

        $('.quantity-input').on('change', function() {
            var $row = $(this).closest('tr');
            var id = $row.data('id');
            var quantity = $(this).val();

            $.ajax({
                url: '{{ route('frontend.update-cart') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    if(response.success) {
                        $row.find('.total-price').text(response.totalPrice + '₮');
                    }
                }
            });
        });

        $('.remove-item').on('click', function() {
            var $row = $(this).closest('tr');
            var id = $row.data('id');

            $.ajax({
                url: '{{ route('remove-cart') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    if(response.success) {
                        $row.remove();
                        calculateCartTotal();
                    }
                }
            });
        });
        calculateCartTotal();
    </script>
@endsection





<!-- Scripts -->
<script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}"></script>
{{--<script src="{{ asset('assets\js\jquery-3.7.1.js') }}"></script>--}}
<script
        src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js">
    </script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" rel="stylesheet"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@yield('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
    <script>
        Swal.fire({
            title: "Good job!",
            text: "{{session('success')}}",
            icon: "success"
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{session('error')}}!",
        });
    </script>
@endif

@if(session('message'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{session('message')}}",
            icon: "success"
        });
    </script>
@endif



</body>
</html>
