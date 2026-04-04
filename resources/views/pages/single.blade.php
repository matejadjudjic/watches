@extends("layouts.app")

@section('title', 'Single Product')

@section('content')
    <div class="men">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="dreamcrub">
                        <ul class="breadcrumbs">
                            <li class="home">
                                <a href="{{ route('home') }}">Home</a>&nbsp;<span>&gt;</span>
                            </li>
                            <li class="home">&nbsp;
                                <a href="{{ route('products.list') }}">Products</a>&nbsp;<span>&gt;</span>
                            </li>
                            <li class="home">&nbsp;{{ $product->name }}</li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row" style="margin-top: 30px;">

                        <div class="col-md-6 text-center">
                            <div class="product-slider">
                                <div id="slider-images">
                                    <div class="slider-loading">Loading images...</div>
                                </div>
                                <div class="slider-controls">
                                    <button id="prev-btn">&#8592;</button>
                                    <span id="slide-counter">1 / 3</span>
                                    <button id="next-btn">&#8594;</button>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6" style="padding-left: 30px;">
                            <h2 style="margin-bottom: 20px;">{{ $product->name }}</h2>

                            <table class="table">
                                <tr>
                                    <td><strong>Brand</strong></td>
                                    <td>{{ $product->brand->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Category</strong></td>
                                    <td>{{ $product->category->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Reference</strong></td>
                                    <td>{{ $product->reference_number }}</td>
                                </tr>
                            </table>

                            <div class="price mount" style="font-size: 22px; margin: 15px 0;">
                                @if($product->discount)
                                    <del>${{ number_format($product->discount, 2) }}</del>
                                    ${{ number_format($product->price, 2) }}
                                @else
                                    ${{ number_format($product->price, 2) }}
                                @endif
                            </div>

                            <p style="color: #666;">{{ $product->short_description }}</p>
                            <p>{{ $product->description }}</p>

                            <button class="button item_add" id="add-to-cart" data-id="{{ $product->id }}">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        let images = [];

        $.ajax({
            url: '/products/{{ $product->id }}/images',
            method: 'GET',
            success: function(data) {
                images = data;
                renderSlider();
            }
        });

        function renderSlider() {
            let html = '';
            images.forEach(function(img, index) {
                html += `<img src="/${img.image_path}"
                      alt="Product image"
                      class="slider-img"
                      style="display: ${index === 0 ? 'block' : 'none'};">`;
            });
            $('#slider-images').html(html);
            updateCounter();
        }

        function updateCounter() {
            $('#slide-counter').text((currentSlide + 1) + ' / ' + images.length);
        }

        $('#next-btn').on('click', function() {
            $('.slider-img').eq(currentSlide).hide();
            currentSlide = (currentSlide + 1) % images.length;
            $('.slider-img').eq(currentSlide).show();
            updateCounter();
        });

        $('#prev-btn').on('click', function() {
            $('.slider-img').eq(currentSlide).hide();
            currentSlide = (currentSlide - 1 + images.length) % images.length;
            $('.slider-img').eq(currentSlide).show();
            updateCounter();
        });

        $('#add-to-cart').on('click', function() {
            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: $(this).data('id')
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function() {
                    alert('LOGIN!!');
                }
            });
        });
    </script>
@endsection
