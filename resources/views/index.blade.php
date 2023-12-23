@extends('layouts.app')
@section('content')

        <section class="banner-section">
            <div class="banner-bg bg-fixed" style="background:url('img/banner/banner-1.jpg')"></div>
            <div class="container">
                <div class="banner-content">
                    <h1 class="title  cd-headline clip"><span class="d-block">Tickets Booking</span> for
                        <span class="color-theme cd-words-wrapper p-0 m-0">
                            <b class="is-visible">Movie</b>
                            <b>Event</b>
                            <b>Sport</b>
                        </span>
                    </h1>
                    <p>Buy Your Tickets Online And Enjoy Your Live Entertainment!</p>
                </div>
            </div>
        </section>


        <section class="search-ticket-section padding-top pt-lg-0">
            <div class="container">
                <div class="search-tab">
                    <div class="row align-items-center mb--20">
                        <div class="col-lg-6 mb-20">
                            <div class="search-ticket-header">
                                <h6 class="category">search tickets </h6>
                                <h3 class="title">find your tickets now</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-20">
                            <ul class="tab-menu ticket-tab-menu">
                                <li class="active">
                                    <div class="tab-thumb">
                                        <img src="img/ticket/movie.png" alt="ticket">
                                    </div>
                                    <span>movie</span>
                                </li>
                                <li>
                                    <div class="tab-thumb">
                                        <img src="img/ticket/event.png" alt="ticket">
                                    </div>
                                    <span>events</span>
                                </li>
                                <li>
                                    <div class="tab-thumb">
                                        <img src="img/ticket/sport.png" alt="ticket">
                                    </div>
                                    <span>sports</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-area">

                        <div class="tab-item active">
                            <form class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search for Movies">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"
                                            style="color: #ffffff;"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/city.png" alt="ticket">
                                    </div>
                                    <span class="type">city</span>
                                    <select class="select-bar">
                                        <option value="london">New York</option>
                                        <option value="dhaka">California</option>
                                        <option value="rosario">Texas</option>
                                        <option value="madrid">Florida</option>
                                        <option value="koltaka">Nevada</option>
                                        <option value="rome">Oregon</option>
                                        <option value="khoksa">Ohio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/date.png" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar">
                                        <option value="11/04/2023">11/04/2023</option>
                                        <option value="10/04/2023">10/04/2023</option>
                                        <option value="09/04/2023">09/04/2023</option>
                                        <option value="08/04/2023">08/04/2023</option>
                                        <option value="07/04/2023">07/04/2023</option>
                                        <option value="06/04/2023">06/04/2023</option>
                                        <option value="05/04/2023">05/04/2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/cinema.png" alt="ticket">
                                    </div>
                                    <span class="type">movie</span>
                                    <select class="select-bar">
                                        <option value="Avatar">Avatar</option>
                                        <option value="Inception">Inception</option>
                                        <option value="Parasite">Parasite</option>
                                        <option value="Joker">Joker</option>
                                        <option value="Searching">Searching</option>
                                        <option value="Coco">Coco</option>
                                        <option value="Lion">Lion</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <button type="submit" class="filter-btn"><i class="fa-solid fa-magnifying-glass"
                                                style="color: #ffffff;"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-item">
                            <form class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search for Events">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"
                                            style="color: #ffffff;"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/city.png" alt="ticket">
                                    </div>
                                    <span class="type">city</span>
                                    <select class="select-bar">
                                        <option value="london">New York</option>
                                        <option value="dhaka">California</option>
                                        <option value="rosario">Texas</option>
                                        <option value="madrid">Florida</option>
                                        <option value="koltaka">Nevada</option>
                                        <option value="rome">Oregon</option>
                                        <option value="khoksa">Ohio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/date.png" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar">
                                        <option value="11/04/2023">11/04/2023</option>
                                        <option value="10/04/2023">10/04/2023</option>
                                        <option value="09/04/2023">09/04/2023</option>
                                        <option value="08/04/2023">08/04/2023</option>
                                        <option value="07/04/2023">07/04/2023</option>
                                        <option value="06/04/2023">06/04/2023</option>
                                        <option value="05/04/2023">05/04/2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/event-2.png" alt="ticket">
                                    </div>
                                    <span class="type">event</span>
                                    <select class="select-bar">
                                        <option value="Design">Design</option>
                                        <option value="Development">Development</option>
                                        <option value="Software">Software</option>
                                        <option value="Digital">Digital</option>
                                        <option value="Festival">Festival</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Seo">Seo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <button type="submit" class="filter-btn"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-item">
                            <form class="ticket-search-form">
                                <div class="form-group large">
                                    <input type="text" placeholder="Search fo Sports">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"
                                            style="color: #ffffff;"></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/city.png" alt="ticket">
                                    </div>
                                    <span class="type">city</span>
                                    <select class="select-bar">
                                        <option value="london">New York</option>
                                        <option value="dhaka">California</option>
                                        <option value="rosario">Texas</option>
                                        <option value="madrid">Florida</option>
                                        <option value="koltaka">Nevada</option>
                                        <option value="rome">Oregon</option>
                                        <option value="khoksa">Ohio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/date.png" alt="ticket">
                                    </div>
                                    <span class="type">date</span>
                                    <select class="select-bar">
                                        <option value="11/04/2023">11/04/2023</option>
                                        <option value="10/04/2023">10/04/2023</option>
                                        <option value="09/04/2023">09/04/2023</option>
                                        <option value="08/04/2023">08/04/2023</option>
                                        <option value="07/04/2023">07/04/2023</option>
                                        <option value="06/04/2023">06/04/2023</option>
                                        <option value="05/04/2023">05/04/2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <img src="img/ticket/sport-2.png" alt="ticket">
                                    </div>
                                    <span class="type">sport</span>
                                    <select class="select-bar">
                                        <option value="Cricket">Cricket</option>
                                        <option value="Football">Football</option>
                                        <option value="Basketball">Basketball</option>
                                        <option value="Baseball">Baseball</option>
                                        <option value="Golf">Golf</option>
                                        <option value="Running">Running</option>
                                        <option value="Badminton">Badminton</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="thumb">
                                        <button type="submit" class="filter-btn"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="movie-section padding-top bg-two">
            <div class="container">
                <div class="row flex-wrap-reverse justify-content-center">
                    <div class="col-lg-12">
                        <div class="article-section padding-bottom">
                            <div class="section-header-1">
                                <h2 class="title">movies</h2>
                                <a class="view-more" href="movie-grid.html">View More <i
                                        class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-1.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Avatar Special Edition</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-2.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Avengers Endgame</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-3.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Terminator 2</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-4.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">The Salesman</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-5.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">La La Land</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/movie/movie-6.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">First Man</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span class="content">88.8k</span>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                                    <span class="content">5.0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="movie-section bg-two">
            <div class="container">
                <div class="row flex-wrap-reverse justify-content-center">
                    <div class="col-lg-12">
                        <div class="article-section padding-bottom">
                            <div class="section-header-1">
                                <h2 class="title">events</h2>
                                <a class="view-more" href="events.html">View More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-1.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Digital Conference 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-2.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Learn Conference 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-3.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Business World 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-4.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Building New Community</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-5.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">User Interface 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="event-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/event/event-6.jpg" alt="event">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Freedom Music Fest 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="movie-section bg-two">
            <div class="container">
                <div class="row flex-wrap-reverse justify-content-center">
                    <div class="col-lg-12">
                        <div class="article-section padding-bottom">
                            <div class="section-header-1">
                                <h2 class="title">sports</h2>
                                <a class="view-more" href="sports.html">View More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-1.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">World Cricket League 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-2.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Football League 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-3.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Badminton League 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-4.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">International Golf 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-5.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">Baseball League 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="sports-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/sports/sport-6.jpg" alt="sports">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a href="#">World Basketball 2023</a>
                                            </h5>
                                            <div class="movie-rating-percent">
                                                <div>
                                                    <i class="fa-solid fa-location-dot" style="color: #fcfcfc;"></i>
                                                    <span>290 Private Lane</span>
                                                </div>
                                                <div>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                    <span>10k</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="movie-section padding-bottom bg-two">
            <div class="container">
                <div class="row flex-wrap-reverse justify-content-center">
                    <div class="col-lg-12">
                        <div class="article-section">
                            <div class="section-header-1">
                                <h2 class="title">Blog</h2>
                                <a class="view-more" href="blog.html">View More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="blog-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/blog/blog-1.jpg" alt="blog">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h5 class="title">There are many variations of passages</h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the
                                                readable
                                                content of a page
                                            </p>
                                            <a href>Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="blog-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/blog/blog-2.jpg" alt="blog">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h5 class="title">Contrary to popular belief distracted</h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the
                                                readable
                                                content of a page
                                            </p>
                                            <a href>Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="blog-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#">
                                                <img src="img/blog/blog-3.jpg" alt="blog">
                                            </a>
                                            <div class="event-date">
                                                <h6 class="date-title">11</h6>
                                                <span>Feb</span>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h5 class="title">Sed ut perspiciatis unde omnis iste</h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the
                                                readable
                                                content of a page
                                            </p>
                                            <a href>Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="footer-section">

            <div class="newsletter-section">
                <div class="container">
                    <div class="newsletter-container">
                        <div class="newsletter-wrapper">
                            <h5 class="cate">subscribe now</h5>
                            <h3 class="title">to get latest update</h3>
                            <form class="newsletter-form">
                                <input type="text" placeholder="Your Email Address">
                                <button type="submit">subscribe</button>
                            </form>
                            <p>We send you latest update and news to your email</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-section-box">
                <div class="container">
                    <div class="footer-top">
                        <div class="logo">
                            <a href="index-1.html">
                                <img src="img/logo/logo.png" alt="footer">
                            </a>
                        </div>
                        <ul class="social-icons">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="active">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="footer-middle">
                        <div class="row">
                            <div class="col-lg-3">
                                <h5 class="footer-middle-title">Company</h5>
                                <p class="pb-4 footer-text">
                                    There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour.
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <h5 class="footer-middle-title">Important Link</h5>
                                <div class="footer-middle-link">
                                    <a href="#">About Us</a>
                                    <a href="#">Contact</a>
                                    <a href="#">Faq</a>
                                    <a href="#">Terms & Conditions</a>
                                    <a href="#">Privacy Policy</a>
                                    <a href="#">Help</a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h5 class="footer-middle-title">Quick Browse</h5>
                                <div class="footer-middle-link">
                                    <a href="#">Support</a>
                                    <a href="#">Blog</a>
                                    <a href="#">Movies</a>
                                    <a href="#">Events</a>
                                    <a href="#">Sports</a>
                                    <a href="#">Feedback</a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h5 class="footer-middle-title">Download</h5>
                                <p class="footer-text">There are many variations of passages of Lorem Ipsum</p>
                                <div class="footer-middle-download">
                                    <a href="#"><img src="img/app/app_store.jpg" alt></a>
                                    <a href="#"><img src="img/app/google_play.jpg" alt></a>
                                    <a href> <img src="img/app/windows.jpg" alt></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-bottom">
                    <div class="footer-bottom-area">
                        <div class="left">
                            <p>Copyright © <span id="date"></span>.All Rights Reserved By <a
                                    href="#">Ticket</a>.
                            </p>
                        </div>
                        <ul class="links">
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Terms Of Use</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                            <li>
                                <a href="#">Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
@endsection



