
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Merchant Sign Up</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/wow/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
</head>
<body>
  <!-- Header Section -->
  <header class="header header--active w-100">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand position-relative wow bounceInLeft" href="{{ asset('frontend_asset') }}/index.html">influencer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-navbar" aria-controls="header-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="header-navbar">
          <ul class="navbar-nav text-center ml-auto">
            <li class="nav-item wow bounceInDown" data-wow-delay="0.2s">
              <a class="nav-link text-uppercase position-relative" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.4s">
              <a class="nav-link text-uppercase position-relative" href="{{ route('index') }}#partners">Partners</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.6s">
              <a class="nav-link text-uppercase position-relative" href="{{ route('index') }}#benefits">BENEFITS</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.8s">
              <a class="nav-link text-uppercase position-relative" href="{{ route('index') }}#services">Category</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="1s">
              <a class="nav-link text-uppercase position-relative active" href="{{ route('merchant') }}">MERCHANT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Merchant Form Section -->
  <section class="sub-banner parallax-window" data-parallax="scroll" data-android-fix="false" data-ios-fix="false" data-speed="0.1" data-image-src="{{ asset('frontend_asset') }}/assets/images/banner-4.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto wow bounceInDown">

          <form class="merchant-form position-relative needs-validation" method="post" action="{{ route('verification') }}" novalidate>
            @csrf
            <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            </div>
              <div class="col-12 mb-4 text-center">
                <h1 class="merchant-form__title mb-4">Merchant Sign In</h1>
                <p class="merchant-form__text">Fill in the details below and one of our members will be in touch with you shortly.</p>
              </div>

              <div class="col-12 wow bounceInLeft" data-wow-delay="0.5s">
                <div class="form-group w-100 position-relative">
                    <input id="name" type="text" name="name" class="form-control w-100 h-100 border-top-0 border-left-0 border-right-0 rounded-0 shadow-none" placeholder="Enter Your Name *" required>
                    <span class="form-line position-absolute w-100"></span>
                    <div class="invalid-tooltip">Please provide your Name.</div>
                </div>
              </div>
              <div class="col-12 wow bounceInRight" data-wow-delay="0.7s">
                <div class="form-group w-100 position-relative">
                  <input id="number" type="tel" name="number" class="form-control w-100 h-100 border-top-0 border-left-0 border-right-0 rounded-0 shadow-none" placeholder="Enter Your Number *" required>
                  <span class="form-line position-absolute w-100"></span>
                  <div class="invalid-tooltip">Please provide your Number.</div>
                </div>
              </div>
              <div class="col-12 wow bounceInLeft" data-wow-delay="0.9s">
                <div class="form-group w-100 position-relative">
                  <input id="email" type="email" name="email" class="form-control w-100 h-100 border-top-0 border-left-0 border-right-0 rounded-0 shadow-none" placeholder="Enter Your Email Address *" required>
                  <span class="form-line position-absolute w-100"></span>
                  <div class="invalid-tooltip">Please provide a valid Email Address.</div>
                </div>
              </div>
              {{-- <div class="col-12 wow bounceInRight" data-wow-delay="1.1s">
                <div class="form-group w-100 position-relative">
                  <input id="merchant" type="text" class="form-control w-100 h-100 border-top-0 border-left-0 border-right-0 rounded-0 shadow-none" placeholder="Merchant Name *" required>
                  <span class="form-line position-absolute w-100"></span>
                  <div class="invalid-tooltip">Please provide your Merchant Name.</div>
                </div>
              </div> --}}
              <div class="col-12 wow bounceInLeft" data-wow-delay="1.3s">
                <div class="form-group w-100 position-relative">
                  <input id="instagram_url" type="text" name="instagram" class="form-control w-100 h-100 border-top-0 border-left-0 border-right-0 rounded-0 shadow-none" placeholder=" Enter Your Merchant Instagram URL *" required>
                  <span class="form-line position-absolute w-100"></span>
                  <div class="invalid-tooltip">Please provide Merchant Instagram URL.</div>
                </div>
              </div>
              <div class="col-12 text-center wow bounceIn" data-wow-delay="0.5s">
                <button type="submit" class="submit-btn primary-btn position-relative text-uppercase d-inline-block border-0">
                  <span class="position-relative">Submit</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer Section -->
  <footer class="footer overflow-hidden">
    <div class="footer__top section-gap pb-md-5">
      <div class="section-header text-center col-12 mb-5">
        <h1 class="section-header__title">FOLLOW US</h1>
      </div>
      <div class="col-12">
        <ul class="social list-inline text-center mb-0">
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="0.5s">
            <a href="#!" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="0.7s">
            <a href="#!" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fab fa-twitter"></i></a>
          </li>
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="0.9s">
            <a href="https://www.facebook.com/coderexpertzahid/" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="1.1s">
            <a href="#!" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fab fa-tiktok"></i></a>
          </li>
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="1.3s">
            <a href="#!" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="fab fa-youtube"></i></a>
          </li>
          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="1.5s">
            <a href="mailto:coderexpertzahid@gmail.com" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="far fa-envelope"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer__bottom col-12 text-center py-3">
      <p class="copyright mb-0">Copyright © Influencer | Designed by <a href="https://developer-zahid-portfolio.netlify.app/" target="_blank" class="copyright__link">Developer-Zahid</a></p>
    </div>
  </footer>
  <!-- Scroll To Top Button -->
  <div class="scroll-top position-fixed wow bounce" data-wow-iteration="infinite" data-wow-duration="2s">
    <span class="scroll-top__btn d-inline-flex align-items-center justify-content-center"><i class="fas fa-chevron-up"></i></span>
  </div>

	<!-- All Scripts -->
	<script src="{{ asset('frontend_asset') }}/assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/js/all.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/slick-slider/js/slick.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/wow/js/wow.min.js" defer></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/parallax/js/parallax.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/js/script.js"></script>
</body>
</html>
