@extends('client.layout.app')
@section('content')
    <section class="banner-section">
        <div class="banner-bg bg-fixed" style="background:url('img/banner/banner-1.jpg')"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">Tickets Booking</span> for
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Match</b>
                        <b>Competition</b>
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
                            <div class="form-group large input-group">
                                <input type="text" id="searchInput" placeholder="Search for Competitions"
                                    class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"
                                            style="color: #ffffff;"></i></button>
                                </div>
                            </div>
                            <ul id="suggestionList" class="list-group w-100"></ul>
                        </form>
                    </div>

                    <div class="tab-item">
                        <form class="ticket-search-form">
                            <div class="form-group large">
                                <input type="text" placeholder="Search for Events">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #ffffff;"></i></button>
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
                            <h2 class="title">Competition</h2>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach ($competitions as $competition)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{ route('competition.detail', ['id' => $competition->id]) }}">
                                                <img src="{{ $competition->emblem }}" class="img-fluid" alt="movie"
                                                    style="height: 200px;
                                                ">
                                            </a>
                                        </div>
                                        <div class="movie-content">
                                            <h5 class="title m-0">
                                                <a
                                                    href="{{ route('competition.detail', ['id' => $competition->id]) }}">{{ $competition->name_of_competition }}</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <i class="fa-solid fa-cart-shopping" style="color: #ffffff"></i>
                                                    @foreach ($competition->FootballMatch as $footballMatch)
                                                        <span class="content">{{ $footballMatch->seat }}</span>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                            <h2 class="title">Matches</h2>
                        </div>
                        <div class="row mb-30-none justify-content-center">

                            @if (count($matches) > 0)
                                @foreach ($matches as $match)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="event-grid">
                                            <div class="movie-thumb c-thumb">
                                                <a href="#" class="d-flex justify-content-center">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img class="emblem-home img-thumbnail"
                                                                src="{{ $match->emblem_home }}" alt="home-team">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img class="emblem-away img-thumbnail"
                                                                src="{{ $match->emblem_away }}" alt="away-team">
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="event-date">
                                                    @if ($match->competitions->name_of_competition === 'Premier League')
                                                        <h6 class="date-title">hot</h6>
                                                        <span></span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="movie-content">
                                                <h5 class="title m-0">
                                                    <a href="#">{{ $match->home_team }} - {{ $match->away_team }}</a>

                                                </h5>
                                                @php
                                                    $matchTime = \Carbon\Carbon::parse($match->date_time, 'Asia/Ho_Chi_Minh');
                                                @endphp
                                                <span>{{ $matchTime }}</span>
                                                @php
                                                    // Lấy thời gian hiện tại theo múi giờ Việt Nam
                                                    $currentTime = now('Asia/Ho_Chi_Minh');
                                                    $timeRemaining = $currentTime->diff($matchTime->subMinutes(30));

                                                    // Kiểm tra xem thời gian còn lại có làm âm hay không
                                                    $isPastMatch = $timeRemaining->invert == 1;
                                                @endphp

                                                @if ($isPastMatch)
                                                    {{-- Hiển thị thông báo cho việc bán đóng --}}
                                                    <div class="closed-sales">
                                                        <p>đóng cửa</p>
                                                    </div>
                                                @else
                                                    {{-- Hiển thị thời gian còn lại --}}
                                                    <div class="time-remaining" id="countdown">

                                                    </div>
                                                @endif
                                                <div class="movie-rating-percent">
                                                    <div>
                                                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                                        <span>{{ $match->seats_remaining }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p>No matches available</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Bắt đầu bộ đếm ngược khi trang được tải
        var searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', handleInputChange);
        searchInput.addEventListener('change', handleInputChange);

        function handleInputChange() {
            var query = searchInput.value;

            // Chỉ gửi yêu cầu khi giá trị không rỗng
            if (query.trim() !== '') {
                // Sử dụng Ajax để gửi yêu cầu đến máy chủ
                fetch('/search-suggestions?query=' + query)
                    .then(response => response.json())
                    .then(data => {
                        // Kiểm tra nếu không có kết quả
                        if (data.length === 0) {
                            // Hiển thị thông báo trên giao diện
                            showNoResultsMessage();
                        } else {
                            // Cập nhật danh sách gợi ý
                            updateSuggestions(data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                // Nếu giá trị rỗng, xóa danh sách gợi ý
                var suggestionList = document.getElementById('suggestionList');
                suggestionList.innerHTML = '';
            }
        }

        // Hàm cập nhật danh sách gợi ý
        function updateSuggestions(suggestions) {
            var suggestionList = document.getElementById('suggestionList');
            suggestionList.innerHTML = '';

            suggestions.forEach(function(suggestion) {
                if (suggestion) {
                    var listItem = document.createElement('li');
                    listItem.className = 'list-group-item';

                    var link = document.createElement('a');
                    link.href = '/competition/' + suggestion.id;
                    link.textContent = suggestion.name_of_competition;

                    listItem.appendChild(link);
                    suggestionList.appendChild(listItem);
                }
            });
        }

        // Hàm hiển thị thông báo khi không có kết quả
        function showNoResultsMessage() {
            var suggestionList = document.getElementById('suggestionList');
            suggestionList.innerHTML = '<li class="list-group-item">Vui lòng nhập đúng thông tin cuộc thi</li>';
        }
    </script>



@endsection
