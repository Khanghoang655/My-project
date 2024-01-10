@extends('client.layout.app')
@section('content')

    <section class="details-banner" style="background:url('assets/img/banner/banner-movie-details.jpg')">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="{{ $competition['emblem'] }}" style="height: 200px;" alt="movie">
                    <a href="https://www.youtube.com/watch?v=bdldULTM6Ck" class="video-button video-popup">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
                <div class="details-banner-content offset-lg-4">
                    <h3 class="title">{{ $competition['name_of_competition'] }}</h3>
                    <div class="tags">
                        <p>{{ $competition['short_name'] }}</p>
                    </div>
                    <div class="social-and-duration">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fa-solid fa-calendar"></i>
                                <span>start at:{{ date('Y-m-d', strtotime($competition['start_date'])) }}, end
                                    at:{{ date('Y-m-d', strtotime($competition['end_date'])) }}</span>
                            </div>
                            <div class="item">
                                <i class="fa-solid fa-clock"></i><span>Current matchday:
                                    {{ $competition['current_matchday'] }} day</span>
                            </div>
                        </div>
                        <ul class="social-share">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="book-section">
        <div class="container">
            <div class="book-wrapper offset-lg-4">
                <div class="left-side">
                    <div class="item">
                        <div class="item-header">
                            <div class="thumb">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div class="counter-area">
                                @foreach ($competition->FootballMatch as $footballMatch)
                                    <span class="counter-item odometer"
                                        data-odometer-final="{{ $footballMatch->seat }}">0</span>
                                @endforeach
                                <span>k+</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-header">
                            <div class="thumb">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                            <div class="counter-area">
                                <span class="counter-item odometer" data-odometer-final="80">0</span>
                                <span>k+</span>
                            </div>
                        </div>
                    </div>


                </div>
                <a href="#" class="custom-button">book tickets</a>
            </div>
        </div>
    </section>

    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                    <div class="widget-1 widget-offer">
                        <h3 class="title">TODAY OFFER</h3>
                        <div class="offer-body">
                            @forelse ($competition as $data)
                                <div class="offer-item">
                                    <div class="thumb">
                                        @foreach ($competition->FootballMatch as $footballMatch)
                                            <img src="{{ $footballMatch->emblem_home }}" alt="home_team_emblem">
                                            <img src="{{ $footballMatch->emblem_away }}" alt="away_team_emblem">
                                        @endforeach
                                    </div>
                                    <div class="content">
                                        <h6>
                                            @foreach ($competition->FootballMatch as $footballMatch)
                                                <a href="#">{{ $footballMatch->home_team }} -
                                                    {{ $footballMatch->away_team }}</a>
                                            @endforeach
                                        </h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
                                    </div>
                                </div>
                            @empty
                                <!-- Handle case where $competition is empty -->
                            @endforelse

                        </div>
                    </div>
                    {{-- <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="#">
                                <img src="assets/img/sidebar/banner/banner-1.jpg" alt="banner">
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-9 mb-50">
                    <div class="movie-details">
                        <h3 class="title">photos</h3>
                        <div class="details-photos owl-carousel">
                            @php
                                $imageArray = json_decode($competition['images'], true);
                            @endphp
                            @foreach ($imageArray as $image)
                                <div class="thumb">
                                    <a href="{{ asset("img/Competitions/{$competition['competition_id']}/$image") }}"
                                        class="img-pop">
                                        <img src="{{ asset("img/Competitions/{$competition['competition_id']}/$image") }}"
                                            alt="movie">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab summery-review">
                            <ul class="tab-menu">
                                <li class="active">
                                    description
                                </li>
                                <li>
                                    review <span>10</span>
                                </li>
                            </ul>
                            <div class="tab-area">
                                <div class="tab-item active">
                                    <div class="item">
                                        <h5 class="sub-title">There are many
                                            variations of passages</h5>
                                        <p>There are many variations of
                                            passages of Lorem Ipsum
                                            available, but the majority have
                                            suffered alteration in some
                                            form, by injected humour, or
                                            randomised words which don't
                                            look even slightly believable.
                                            If you are going to use a
                                            passage of Lorem Ipsum, you need
                                            to be sure there isn't anything
                                            embarrassing hidden in the
                                            middle of text. </p>
                                        <p>There are many variations of
                                            passages of Lorem Ipsum
                                            available, but the majority have
                                            suffered alteration in some
                                            form, by injected humour, or
                                            randomised words which don't
                                            look even slightly believable.
                                            If you are going to use a
                                            passage of Lorem Ipsum, you need
                                            to be sure there isn't anything
                                            embarrassing hidden in the
                                            middle of text. </p>
                                        {{-- <div class="widget-tags mt-5">
                                            <p>Tags : </p>
                                            <ul>
                                                <li>
                                                    <a href="#">2D</a>
                                                </li>
                                                <li>
                                                    <a href="#">3D</a>
                                                </li>
                                                <li>
                                                    <a href="#">MOVIE</a>
                                                </li>
                                                <li>
                                                    <a href="#">2023</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="item">
                                        <div class="header">
                                            <h5 class="sub-title">Clubs</h5>
                                            <div class="navigation">
                                                <div class="cast-prev"><i class="flaticon-double-right-arrows-angles"></i>
                                                </div>
                                                <div class="cast-next"><i class="flaticon-double-right-arrows-angles"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="casting-slider owl-carousel">
                                            @foreach ($competition->clubs as $club)
                                                <div class="cast-item">
                                                    <div class="cast-thumb">
                                                        <a href="#">
                                                            <img src="{{ $club->crest }}" alt="club crest">
                                                        </a>
                                                    </div>
                                                    <div class="cast-content">
                                                        <h6 class="cast-title"><a href="#">{{ $club->name }}</a>
                                                        </h6>
                                                        <span class="cate">{{ $club->founder }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="header">
                                            <h5 class="sub-title">movie
                                                crew</h5>
                                            <div class="navigation">
                                                <div class="cast-prev-2"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                                <div class="cast-next-2"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                            </div>
                                        </div>
                                        <div class="casting-slider-two owl-carousel">
                                            @foreach ($competitions as $data)
                                                <div class="cast-item">
                                                    <div class="cast-thumb">
                                                        <a href="{{route('competition.detail',['id' =>$data->id])}}">
                                                            <img src="{{$data->emblem}}" alt="cast">
                                                        </a>
                                                    </div>
                                                    <div class="cast-content">
                                                        <h6 class="cast-title"><a href="#">{{$data->name_of_competition}}</a></h6>
                                                        <span class="cate">{{$data->short_name}}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item">
                                    <div class="movie-review-item">
                                        <div class="author">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/cast/cast-2.jpg" alt="cast">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="movie-review-content">
                                            <div class="movie-review-info">
                                                <h6 class="subtitle">
                                                    <a href="#">Thomas E
                                                        Criswell</a>
                                                </h6>
                                                <span class="reply-date"><i class="fal fa-clock"></i>
                                                    1 hour ago </span>
                                                <div class="review">
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </div>
                                            </div>
                                            <p>It is a long established fact
                                                that a reader will be
                                                distracted by the readable
                                                content of a page when
                                                looking at its layout. </p>
                                            <div class="review-meta">
                                                <a href="#">
                                                    <i class="fal fa-thumbs-up"></i><span>10</span>
                                                </a>
                                                <a href="#" class="dislike">
                                                    <i class="fal fa-thumbs-down"></i><span>02</span>
                                                </a>
                                                <a href="#">
                                                    <i class="fal fa-flag"></i>
                                                    <span>Report
                                                        Review</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="movie-review-item">
                                        <div class="author">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/cast/cast-1.jpg" alt="cast">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="movie-review-content">
                                            <div class="movie-review-info">
                                                <h6 class="subtitle">
                                                    <a href="#">Thomas E
                                                        Criswell</a>
                                                </h6>
                                                <span class="reply-date"><i class="fal fa-clock"></i>
                                                    1 hour ago </span>
                                                <div class="review">
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </div>
                                            </div>
                                            <p>It is a long established fact
                                                that a reader will be
                                                distracted by the readable
                                                content of a page when
                                                looking at its layout. </p>
                                            <div class="review-meta">
                                                <a href="#">
                                                    <i class="fal fa-thumbs-up"></i><span>10</span>
                                                </a>
                                                <a href="#" class="dislike">
                                                    <i class="fal fa-thumbs-down"></i><span>02</span>
                                                </a>
                                                <a href="#">
                                                    <i class="fal fa-flag"></i>
                                                    <span>Report
                                                        Review</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="movie-review-item">
                                        <div class="author">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/cast/cast-2.jpg" alt="cast">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="movie-review-content">
                                            <div class="movie-review-info">
                                                <h6 class="subtitle">
                                                    <a href="#">Thomas E
                                                        Criswell</a>
                                                </h6>
                                                <span class="reply-date"><i class="fal fa-clock"></i>
                                                    1 hour ago </span>
                                                <div class="review">
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </div>
                                            </div>
                                            <p>It is a long established fact
                                                that a reader will be
                                                distracted by the readable
                                                content of a page when
                                                looking at its layout. </p>
                                            <div class="review-meta">
                                                <a href="#">
                                                    <i class="fal fa-thumbs-up"></i><span>10</span>
                                                </a>
                                                <a href="#" class="dislike">
                                                    <i class="fal fa-thumbs-down"></i><span>02</span>
                                                </a>
                                                <a href="#">
                                                    <i class="fal fa-flag"></i>
                                                    <span>Report
                                                        Review</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="movie-review-item">
                                        <div class="author">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/cast/cast-3.jpg" alt="cast">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="movie-review-content">
                                            <div class="movie-review-info">
                                                <h6 class="subtitle">
                                                    <a href="#">Thomas E
                                                        Criswell</a>
                                                </h6>
                                                <span class="reply-date"><i class="fal fa-clock"></i>
                                                    1 hour ago </span>
                                                <div class="review">
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </div>
                                            </div>
                                            <p>It is a long established fact
                                                that a reader will be
                                                distracted by the readable
                                                content of a page when
                                                looking at its layout. </p>
                                            <div class="review-meta">
                                                <a href="#">
                                                    <i class="fal fa-thumbs-up"></i><span>10</span>
                                                </a>
                                                <a href="#" class="dislike">
                                                    <i class="fal fa-thumbs-down"></i><span>02</span>
                                                </a>
                                                <a href="#">
                                                    <i class="fal fa-flag"></i>
                                                    <span>Report
                                                        Review</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="load-more text-center">
                                        <a href="#" class="custom-button transparent">load
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
