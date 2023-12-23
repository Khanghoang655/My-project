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
                    <a href="{{ url('index-1.html') }}">
                        <img src="{{ asset('img/logo/logo.png') }}" alt="footer">
                    </a>
                </div>
                <ul class="social-icons">
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">
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
                            <a href="{{ url('#') }}">About Us</a>
                            <a href="{{ url('#') }}">Contact</a>
                            <a href="{{ url('#') }}">Faq</a>
                            <a href="{{ url('#') }}">Terms & Conditions</a>
                            <a href="{{ url('#') }}">Privacy Policy</a>
                            <a href="{{ url('#') }}">Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="footer-middle-title">Quick Browse</h5>
                        <div class="footer-middle-link">
                            <a href="{{ url('#') }}">Support</a>
                            <a href="{{ url('#') }}">Blog</a>
                            <a href="{{ url('#') }}">Movies</a>
                            <a href="{{ url('#') }}">Events</a>
                            <a href="{{ url('#') }}">Sports</a>
                            <a href="{{ url('#') }}">Feedback</a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="footer-middle-title">Download</h5>
                        <p class="footer-text">There are many variations of passages of Lorem Ipsum</p>
                        <div class="footer-middle-download">
                            <a href="{{ url('#') }}"><img src="{{ asset('img/app/app_store.jpg') }}" alt></a>
                            <a href="{{ url('#') }}"><img src="{{ asset('img/app/google_play.jpg') }}" alt></a>
                            <a href> <img src="{{ asset('img/app/windows.jpg') }}" alt></a>
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
                            href="{{ url('#') }}">Ticket</a>.
                    </p>
                </div>
                <ul class="links">
                    <li>
                        <a href="{{ url('#') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">Terms Of Use</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>