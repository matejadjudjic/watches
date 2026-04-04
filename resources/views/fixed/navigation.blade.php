<body>
<div class="banner">
    <div class="container">
        <div class="header_top">
            <div class="header_top_left">
                <div class="box_11"><a href="{{route('cart.index')}}">
                        <h4><p>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
                    </a></div>

                <div class="clearfix"> </div>
            </div>
            <div class="header_top_right">
                <ul class="header_user_info">

                    <a class="login" href="{{ route('login') }}">
                        <i class="user"> </i>
                        <li class="user_desc">Login</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <ul class="header_user_info">
                    <a class="login" href="{{ route('register') }}">
                        <i class="user"> </i>
                        <li class="user_desc">Register</li>
                    </a>


                    <div class="clearfix"> </div>
                </ul>

                @auth
                    <form class="poz" method="POST" action="/logout">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth

                <script src="{{ asset('js/classie1.js') }}"></script>
                <script src="{{ asset('js/uisearch.js') }}"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>

                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="header_bottom">
            <div class="logo">
                <h1><a href="{{ route('home') }}"><span class="m_1">W</span>atches</a></h1>
            </div>


            <div class="menu">
                <ul class="megamenu skyblue">
                    @foreach($menus as $menu)
                        <li>
                            <a href="{{ $menu->path }}" class="color2">{{ $menu->title }}</a>
                        </li>
                    @endforeach
                    <div class="clearfix"> </div>
                </ul>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>



