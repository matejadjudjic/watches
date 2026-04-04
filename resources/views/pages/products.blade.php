@extends("layouts.app")

@section('title', 'Products')

@section('content')
    <div class="men">
        <div class="container">
            <div class="row">

                <div class="col-md-8 mens_right">
                    <div class="dreamcrub">
                        <ul class="breadcrumbs">
                            <li class="home">
                                <a href="{{ route('home') }}" title="Go to Home Page">Home</a>&nbsp;
                                <span>&gt;</span>
                            </li>
                            <li class="home">&nbsp;
                                Men / Women&nbsp;
                            </li>
                        </ul>
                        <ul class="previous">
                            <li><a href="{{ route('home') }}">Back to Previous Page</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="search-box-products">
                        <input type="text" id="search-input" placeholder="Search watches..." class="form-control">
                    </div>

                    <div class="mens-toolbar">
                        <div class="sort">
                            <div class="sort-by">
                                <label>Sort By</label>
                                <select id="sort-select">
                                    <option value="">Position</option>
                                    <option value="name">Name A-Z</option>
                                    <option value="name_desc">Name Z-A</option>
                                    <option value="price_asc">Price Asc</option>
                                    <option value="price_desc">Price Desc</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                        <div class="clearfix"></div>

                        <div class="row" id="products-grid">
                            @foreach($products as $product)
                                <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                                    <li class="" style="list-style: none;">
                                        <a class="cbp-vm-image" href="{{ route('products.show', $product->id) }}">
                                            <div class="view view-first">
                                                <div class="inner_content clearfix">
                                                    <div class="product_image">
                                                        @php
                                                            $primaryImage = $product->images->firstWhere('is_primary', true);
                                                            $imagePath = $primaryImage->image_path ?? 'images/default.jpg';
                                                        @endphp

                                                        <div class="mask1">
                                                            <img src="{{ asset($imagePath) }}" alt="{{ $product->name }}" class="img-responsive zoom-img" style="height:250px; object-fit:cover; width:100%;">
                                                        </div>

                                                        <div class="mask">
                                                            <div class="info">Quick View</div>
                                                        </div>

                                                        <div class="product_container">
                                                            <h4>{{ $product->name }}</h4>
                                                            <p>{{ $product->brand->name ?? '' }}</p>

                                                            <div class="price mount item_price">
                                                                @if($product->discount)
                                                                    <del>${{ number_format($product->price, 2) }}</del>
                                                                    ${{ number_format($product->discount, 2) }}
                                                                @else
                                                                    ${{ number_format($product->price, 2) }}
                                                                @endif
                                                            </div>

                                                            <button class="button add-to-cart-btn" data-id="{{ $product->id }}">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center" style="margin-top: 20px;">
                        {{ $products->links() }}
                    </div>

                    <script src="{{ asset('js/cbpViewModeSwitch.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('js/classie.js') }}" type="text/javascript"></script>
                </div>


                <div class="col-md-4 sidebar_men">
                    <h3>Categories</h3>
                    <ul class="product-categories color">
                        <li class="cat-item">
                            <a href="#" class="filter-category" data-id="">All</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="cat-item">
                                <a href="#" class="filter-category" data-id="{{ $category->id }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <h3>Price</h3>
                    <ul class="product-categories">
                        <li class="cat-item"><a href="#" class="filter-price" data-min="0" data-max="300">$0-$300</a></li>
                        <li class="cat-item"><a href="#" class="filter-price" data-min="300" data-max="1000">$300-$1000</a></li>
                        <li class="cat-item"><a href="#" class="filter-price" data-min="1000" data-max="5000">$1000-$5000</a></li>
                        <li class="cat-item"><a href="#" class="filter-price" data-min="5000" data-max="99999">$5000+</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="cart-popup" style="display:none; position:fixed; bottom:30px; right:30px; background:#333; color:white; padding:15px 25px; border-radius:5px; z-index:9999;">
        <span id="cart-popup-message">Added To Cart!</span>
    </div>

    <script>
        let activeCategory = null;
        let minPrice = null;
        let maxPrice = null;
        let searchTerm = '';

        // Filter po kategoriji
        $('.filter-category').on('click', function(e) {
            e.preventDefault();
            activeCategory = $(this).data('id') || null;

            if (!activeCategory) {
                minPrice = null;
                maxPrice = null;
                $('.filter-price').removeClass('active-filter');
            }

            $('.filter-category').removeClass('active-filter');
            $(this).addClass('active-filter');

            fetchProducts();
        });


        $('.filter-price').on('click', function(e) {
            e.preventDefault();
            minPrice = $(this).data('min');
            maxPrice = $(this).data('max');

            $('.filter-price').removeClass('active-filter');
            $(this).addClass('active-filter');

            fetchProducts();
        });


        $('#sort-select').on('change', function() {
            fetchProducts();
        });

        // Pretraga
        $('#search-input').on('keyup', function() {
            searchTerm = $(this).val();
            fetchProducts();
        });

        function fetchProducts() {
            $.ajax({
                url: '/products/filter',
                method: 'GET',
                data: {
                    category_id: activeCategory,
                    sort: $('#sort-select').val(),
                    min_price: minPrice,
                    max_price: maxPrice,
                    search: searchTerm
                },
                success: function(products) {
                    let html = '';
                    if (products.length === 0) {
                        html = '<p>Nema proizvoda.</p>';
                    } else {
                        products.forEach(function(product) {
                            let imagePath = 'images/default.jpg';
                            if (product.images && product.images.length > 0) {
                                let primary = product.images.find(img => img.is_primary == 1);
                                imagePath = primary ? primary.image_path : product.images[0].image_path;
                            }
                            html += `
                                <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                                    <li class="" style="list-style: none;">
                                        <div class="view view-first">
                                            <div class="inner_content clearfix">
                                                <div class="product_image">
                                                    <img src="/${imagePath}" alt="${product.name}" class="img-responsive zoom-img" style="height:250px; object-fit:cover; width:100%;">
                                                    <div class="product_container">
                                                        <h4>${product.name}</h4>
                                                        <p>${product.brand ? product.brand.name : ''}</p>
                                                        <div class="price">$${parseFloat(product.price).toFixed(2)}</div>
                                                        <button class="button add-to-cart-btn" data-id="${product.id}">Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            `;
                        });
                    }
                    $('#products-grid').html(html);
                }
            });
        }


        $(document).on('click', '.add-to-cart-btn', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: $(this).data('id')
                },
                success: function(response) {
                    $('#cart-popup-message').text(response.message);
                    $('#cart-popup').fadeIn().delay(2000).fadeOut();
                },
                error: function() {
                    $('#cart-popup-message').text('Morate biti prijavljeni!');
                    $('#cart-popup').fadeIn().delay(2000).fadeOut();
                }
            });
        });
    </script>
@endsection
