
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Verification | influencer</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/wow/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
</head>
<body>
  <!-- Verification Section -->
  <section class="verification d-flex align-items-center min-vh-100">
    <div class="container">
      <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

        <div class="col-lg-7 mx-auto wow bounceInUp">
          <form id="verification-form" class="verification-form influencer-form position-relative needs-validation" method="post" action="{{ route('verified.login') }}" >
            @csrf
            <div class="col-12">

              <h1 class="verification-form__title text-center mb-4 text-capitalize">Verify your influencer details</h1>
            </div>
            <input type="hidden" value="{{ $user_id }}" name="user_id">
            <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInLeft" data-wow-delay="0.5s">
              <input id="tel" type="tel" name="number" class="form-control w-100 border-0 rounded-0 shadow-none" placeholder="Whatsapp Number"  >
              <i class="form-group__icon fab fa-whatsapp"></i>
              <div class="invalid-feedback">Please provide your Whatsapp Number.</div>
            </div>
            <div class="form-group w-100 d-inline-flex flex-column align-items-center position-relative wow bounceInRight" data-wow-delay="0.6s">
              <input id="instagram_url" type="text" name="instagram" class="form-control w-100 border-0 rounded-0 shadow-none" placeholder="Instagram Username"  >
              <i class="form-group__icon fab fa-instagram"></i>
              <div class="invalid-feedback">Please provide your Instagram Username.</div>
            </div>
            <div class="col-12 text-center pt-3 wow bounceInUp" data-wow-delay="0.9s">
              <button type="submit" class="submit-btn primary-btn position-relative text-uppercase d-inline-block border-0 w-100">
                <span class="position-relative">Submit</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

	<!-- All Scripts -->
	<script src="{{ asset('frontend_asset') }}/assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/js/all.min.js"></script>
	<script src="{{ asset('frontend_asset') }}/assets/plugins/slick-slider/js/slick.js"></script>
  <script src="{{ asset('frontend_asset') }}/assets/plugins/wow/js/wow.min.js" defer></script>
	<script src="{{ asset('frontend_asset') }}/assets/js/script.js"></script>
</body>
</html>
