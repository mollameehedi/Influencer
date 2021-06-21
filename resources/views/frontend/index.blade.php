
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Influencer</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/slick-slider/css/slick.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/wow/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
</head>
<body data-spy="scroll" data-target="#header-navbar">
  <!-- Header Section -->
  <header class="header w-100">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand position-relative wow bounceInLeft" href="{{ asset('frontend_asset') }}"><img src="{{ asset('uploads/logo/1.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-navbar" aria-controls="header-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="header-navbar">
          <ul class="navbar-nav text-center ml-auto">
            <li class="nav-item wow bounceInDown" data-wow-delay="0.2s">
              <a class="nav-link text-uppercase position-relative active" href="#banner">Home</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.4s">
              <a class="nav-link text-uppercase position-relative" href="#partners">Partners</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.6s">
              <a class="nav-link text-uppercase position-relative" href="#benefits">BENEFITS</a>
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="0.8s">
                @guest

                <a class="nav-link text-uppercase position-relative" href="#services">Category</a>
                @endguest
                @auth

                <a class="nav-link text-uppercase position-relative" href="{{ route('category') }}">Category</a>
                @endauth
            </li>
            <li class="nav-item wow bounceInDown" data-wow-delay="1s">
                @guest

                <a class="nav-link text-uppercase position-relative" href="{{ route('merchant') }}">MERCHANT</a>
                @endguest

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Banner Section -->
  <section id="banner" class="banner position-relative">
    <div class="banner__slider">
      <div class="banner__slide" style="background-image: url({{ asset('frontend_asset') }}/assets/images/banner-1.jpg);"></div>
      <div class="banner__slide" style="background-image: url({{ asset('frontend_asset') }}/assets/images/banner-2.jpg);"></div>
      <div class="banner__slide" style="background-image: url({{ asset('frontend_asset') }}/assets/images/banner-3.jpg);"></div>
      <div class="banner__slide" style="background-image: url({{ asset('frontend_asset') }}/assets/images/banner-4.jpg);"></div>
    </div>
    <div class="banner__content d-flex align-items-center position-absolute w-100 h-100">
      <div class="container text-center">
        <div class="col-lg-10 mx-auto wow bounceIn">
            @if (session('uer_request'))
                  <div class="alert alert-success">
                      {{ session('uer_request') }}
                  </div>

                  @endif
          <h1 class="banner__title text-uppercase mb-5">WE build meaningful relationships <span class="d-block">between</span> <span class="banner__title__bold d-block">brands and creators</span></h1>
          <a href="#!" class="primary-btn position-relative text-uppercase d-inline-block wow bounceInUp" data-toggle="modal" data-target="#influencerFormModal">
            <span class="position-relative">Become an Influencer</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal influencer-form-modal fade wow bounceIn" id="influencerFormModal" aria-labelledby="influencerFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0">
        <div class="modal-header border-0 p-0">
          <button type="button" class="close text-danger my-0 mr-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pt-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">

                <form class="influencer-form position-relative needs-validation" action="{{ route('become.an.influencer.store') }}" method="post"  enctype="multipart/form-data" novalidate>
                    @csrf
                  <div class="col-12 text-center mb-4">
                    <div class="custom-file w-auto">
                      <input type="file" class="custom-file-input position-absolute" name="profile_photo" id="customFile" required>
                      <label class="custom-file-label shadow-none bg-transparent rounded-0 border-0 p-0 m-0 h-auto text-center position-relative text-white" for="customFile"><i class="far fa-user-circle"></i></label>
                      <div class="invalid-feedback">Please add a profile picture.</div>
                      <h4 class="custom-file__text">Add profile picture</h4>
                    </div>
                  </div>
                  <p class="influencer-form-modal__text text-center">Please enter the following details (Required)</p>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInLeft" data-wow-delay="0.3s">
                    <input id="name" type="text" class="form-control w-100 border-0 rounded-0 shadow-none" name="name" placeholder="Your Full Name" required>
                    <i class="form-group__icon fas fa-user"></i>
                    <div class="invalid-feedback">Please provide your Full Name.</div>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInRight" data-wow-delay="0.5s">
                    <input id="date" type="date" name="birth" class="form-control w-100 border-0 rounded-0 shadow-none" required>
                    <i class="form-group__icon fas fa-birthday-cake"></i>
                    <div class="invalid-feedback">Please provide your Date of Birth.</div>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInLeft" data-wow-delay="0.7s">
                    <select class="custom-select form-control w-100 border-0 rounded-0 shadow-none" id="gender" name="gender" required>
                      <option value="" selected disabled>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                    <div class="invalid-feedback">Please select your Gender</div>
                    <i class="form-group__icon fas fa-venus-mars"></i>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInRight" data-wow-delay="0.9s">
                    <select class="custom-select form-control w-100 border-0 rounded-0 shadow-none" id="state" name="state" required>
                      <option value="" selected disabled>Select Residing State/Province</option>
                      <option value="Abu Dhabi">Abu Dhabi</option>
                      <option value="Dubai">Dubai</option>
                      <option value="Sharjah">Sharjah</option>
                      <option value="Ajman">Ajman</option>
                      <option value="Fujairah">Fujairah</option>
                      <option value="Umm al Quwain">Umm al Quwain</option>
                      <option value="Ras al Khaimah">Ras al Khaimah</option>
                      <option value="Abu Dhabia">Abu Dhabia</option>
                    </select>
                    <div class="invalid-feedback">Please select your Residing State/Province</div>
                    <i class="form-group__icon fas fa-map-marked-alt"></i>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInLeft" data-wow-delay="1.1s">
                    <input id="email" type="email" class="form-control w-100 border-0 rounded-0 shadow-none" name="email" placeholder="Email Address" required>
                    <i class="form-group__icon fas fa-envelope"></i>
                    <div class="invalid-feedback">Please provide your Email Address.</div>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInRight" data-wow-delay="1.3s">
                    <input id="tel" type="tel" class="form-control w-100 border-0 rounded-0 shadow-none" name="whatsapp_number" placeholder="Whatsapp Number" required>
                    <i class="form-group__icon fab fa-whatsapp"></i>
                    <div class="invalid-feedback">Please provide your Whatsapp Number.</div>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInLeft" data-wow-delay="1.5s">
                    <input id="instagram_url" type="text" class="form-control w-100 border-0 rounded-0 shadow-none" name="instagram" placeholder="Instagram Username" required>
                    <i class="form-group__icon fab fa-instagram"></i>
                    <div class="invalid-feedback">Please provide your Instagram Username.</div>
                  </div>
                  <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInRight" data-wow-delay="1.7s">
                    <select class="custom-select selectpicker countrypicker form-control w-100 border-0 rounded-0 shadow-none" id="nationality" name="nationality" data-default="placeholder"></select>
                    <div class="invalid-feedback">Please select your Nationality</div>
                    <i class="form-group__icon fas fa-globe"></i>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="follower_ins" id="customControlAutosizing-1" required>
                    <label class="custom-control-label" for="customControlAutosizing-1">I have above 2k followers in instagram</label>
                    <div class="invalid-feedback">You must agree before continue.</div>
                  </div>
                  <div class="custom-control custom-checkbox my-3">
                    <input type="checkbox" class="custom-control-input" name="My_instagram" id="customControlAutosizing-2" required>
                    <label class="custom-control-label" for="customControlAutosizing-2">My instagram profile is not private</label>
                    <div class="invalid-feedback">You must agree before continue.</div>
                  </div>
                  <div class="col-12 text-center pt-3 wow bounceInUp" data-wow-delay="2s">
                    <button type="submit" class="submit-btn primary-btn position-relative text-uppercase d-inline-block border-0 w-100">
                      <span class="position-relative">Continue</span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Partners Section -->
  <section id="partners" class="partners section-gap">
    <div class="container">
      <div class="row">
        <div class="section-header text-center col-12 mb-5">
          <h1 class="section-header__title">OUR PARTNERS</h1>
        </div>
        <div class="col-12 wow bounceIn" data-wow-delay="0.2s">
          <div class="partners__slider position-relative">
              @foreach ($partners as $partner)


            <div class="partners__slide">
              <img src="{{ asset('uploads') }}/partner_logo/{{ $partner->partner_logo }}" alt="partners" class="w-100">
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Benefits Section -->
  <section id="benefits" class="benefits section-gap">
    <div class="container">
      <div class="row">
        <div class="section-header text-center col-12 mb-5">
          <h1 class="section-header__title text-uppercase">Influencer Benefits</h1>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 wow bounceInLeft">
          <div class="benefits__block text-center">
            <div class="benefits__image d-inline-block mb-3 wow rubberBand" data-wow-iteration="infinite" data-wow-duration="2s" data-wow-delay="1s">
              <img src="{{ asset('uploads') }}/benifit_icon/{{ $benifits1->icon }}" alt="benefits" class="w-100">
            </div>
            <p class="benefits__text">{{ $benifits1->details }}</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 wow bounceInUp mt-lg-5">
          <div class="benefits__block text-center">
            <div class="benefits__image d-inline-block mb-3 wow rubberBand" data-wow-iteration="infinite" data-wow-duration="2s">
              <img src="{{ asset('uploads') }}/benifit_icon/{{ $benifits2->icon }}" alt="benefits" class="w-100">
            </div>
            <p class="benefits__text">{{ $benifits2->details }}</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 wow bounceInRight mx-auto">
          <div class="benefits__block text-center">
            <div class="benefits__image d-inline-block mb-3 wow rubberBand" data-wow-iteration="infinite" data-wow-duration="2s" data-wow-delay="1s">
              <img src="{{ asset('uploads') }}/benifit_icon/{{ $benifits3->icon }}" alt="benefits" class="w-100">
            </div>
            <p class="benefits__text">{{ $benifits3->details }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Partners Section -->
   <section id="services" class="services section-gap">
    <div class="container-fluid">
      <div class="row">
        <div class="section-header text-center col-12 mb-5">
          <h1 class="section-header__title text-uppercase">WHAT WE Offer</h1>
        </div>
        <div class="col-12 wow bounceInRight px-0" data-wow-delay="0.2s">
          <div class="services__slider">
              @foreach ($offers as $offer)


            <div class="services__slide position-relative">
              <div class="services__slide__image position-relative overflow-hidden rounded">
                <img src="{{ asset('uploads/offer_bg') }}/{{ $offer->bg }}" alt="delivery-items" class="w-100">
              </div>
              <div class="services__slide__content position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100">
                <h3 class="services__slide__content__title font-weight-bold">{{ $offer->heading }}</h3>
                <p class="services__slide__content__text">{{ $offer->detail }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer Section -->
  <footer class="footer wow fadeInUp overflow-hidden">
    <div class="footer__top section-gap pb-md-5">
      <div class="section-header text-center col-12 mb-5">
        <h1 class="section-header__title">FOLLOW US</h1>
      </div>
      <div class="col-12">
        <ul class="social list-inline text-center mb-0">
            @foreach ($socials as $social)


          <li class="list-inline-item mb-2 mb-sm-0 wow bounceInUp" data-wow-delay="0.5s">
            <a href="{{ $social->social_link }}" target="_blank" class="social__links d-inline-flex align-items-center justify-content-center rounded-circle"><i class="{{ $social->social_icon }}"></i></a>
          </li>
          @endforeach
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
	<script src="{{ asset('frontend_asset') }}/assets/plugins/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/js/all.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/slick-slider/js/slick.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/wow/js/wow.min.js" defer></script>
	<script src="{{ asset('frontend_asset') }}/assets/js/script.js"></script>
</body>
</html>
