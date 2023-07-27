@extends('client.masterClientHome1')
@section('contentMain')
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Tất cả danh mục</span>
                            </div>
                            <ul>
                                @foreach ( $category as $item)
                                    <li><a href="#">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        Tất cả sản phẩm
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">Tìm kiếm</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>0853736682</h5>
                                    <span>Hỗ trợ 24/7 thời gian</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero__item set-bg" data-setbg="{{ asset('ogani-master/img/hero/banner.jpg')}}">
                            <div class="hero__text">
                                <span>Trái cây tươi</span>
                                <h2>Rau <br />100% hữu cơ</h2>
                                <p>Giao hàng miễn phí</p>
                                <a href="#" class="primary-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach ( $banner as $item )
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="{{ asset($item->img_banner)}}">
                                    <h5><a href="#">Hoa quả tươi</a></h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
    
        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Sản phẩm nổi bật</h2>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    @foreach ( $product as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                            <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ asset($item['img']) }}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{ $item['name_pr'] }}</a></h6>
                                        <h5>{{ $item['promotional_price'] }}</h5>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Featured Section End -->
    
        <!-- Banner Begin -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset('ogani-master/img/banner/banner-1.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset('ogani-master/img/banner/banner-2.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->
    
        <!-- Latest Product Section Begin -->
        <section class="latest-product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới nhất</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ( $product_new as $item)
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ( $product_new as $item)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset($item['img']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['name_pr'] }}</h6>
                                                    <span>{{ $item['promotional_price'] }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                                {{-- <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('ogani-master/img/latest-product/lp-1.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('ogani-master/img/latest-product/lp-2.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('ogani-master/img/latest-product/lp-3.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Sản phẩm Hot</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ( $product_new as $item)
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ( $product_new as $item)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset($item['img']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['name_pr'] }}</h6>
                                                    <span>{{ $item['promotional_price'] }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Đánh giá sản phẩm</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ( $product_view as $item)
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ( $product_view as $item)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset($item['img']) }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $item['name_pr'] }}</h6>
                                                    <span>{{ $item['promotional_price'] }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Product Section End -->
    
        <!-- Blog Section Begin -->
        <section class="from-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>Tin Tức</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $blogs as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset($item['img']) }}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{ date('d-m-Y',strtoTime($item['created_at'])) }}</li>
                                        {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
                                    </ul>
                                    <h5><a href="#">{{ $item['title']}}</a></h5>
                                    <p>{{ $item['summary'] }}...</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
@endsection