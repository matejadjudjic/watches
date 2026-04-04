@extends("layouts/app")

@section('title', 'Home')

@section('content')
<div class="main">
    <div class="container">
        <ul class="content-home">
            <li class="col-sm-4">
                <a href="single.html" class="item-link" title="">
                    <div class="bannerBox">
                        <img src="images/w1.jpg" class="item-img" title="" alt="" width="100%" height="100%">
                        <div class="item-html">
                            <h3>Men's<span>Watches</span></h3>
                            <p>Precision, durability, and style for every moment of your life.</p>
                            <button>Shop now!</button>
                        </div>
                    </div>
                </a>
            </li>
            <li class="col-sm-4">
                <a href="single.html" class="item-link" title="">
                    <div class="bannerBox">
                        <img src="images/w3.jpg" class="item-img" title="" alt="" width="100%" height="100%">
                        <div class="item-html">
                            <h3>Kid's<span>Watches</span></h3>
                            <p>First watches that make learning time an adventure.</p>
                            <button>Shop now!</button>
                        </div>
                    </div>
                </a>
            </li>
            <li class="col-sm-4">
                <a href="single.html" class="item-link" title="">
                    <div class="bannerBox">
                        <img src="images/w2.jpg" class="item-img" title="" alt="" width="100%" height="100%">
                        <div class="item-html">
                            <h3>Women's<span>Watches</span></h3>
                            <p>From casual days to special nights, find your perfect match.</p>
                            <button>Shop now!</button>
                        </div>
                    </div>
                </a>
            </li>
            <div class="clearfix"> </div>
        </ul>
    </div>
    <div class="middle_content">
        <div class="container">
            <h2>Welcome</h2>
            <p>Watches are not just for telling time – they are part of your identity. The watch you wear to a business meeting is not the same as the one that accompanies you on a hike or a summer vacation. That's why we've curated a collection that covers all aspects of your life. From classic leather straps to modern metal bracelets, from subtle dials to eye-catching designs – choose a watch that tells your story.</p>
        </div>
    </div>
    <div class="content_middle_bottom">
        <div class="header-left" id="home">
            <section>
                <ul class="lb-album" >




                    @foreach($gallery as $slika)
                        <li>
                            <a href="#image-{{ $slika->id }}">
                                <img src="{{ asset($slika->path) }}" class="img-responsive" alt="{{ $slika->title }}"/>
                                <span>{{ $slika->title }}</span>
                            </a>
                        </li>
                    @endforeach





                    <div class="clearfix"></div>
                </ul>
            </section>
        </div>
    </div>
</div>
@endsection
