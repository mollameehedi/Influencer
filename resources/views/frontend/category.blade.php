
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Choose Category | influencer</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/wow/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
</head>
<body>
  <!-- Choose Category Section -->
  <section class="category d-flex align-items-center min-vh-100 position-relative">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="category__title text-center mb-5">Choose a Category</h1>
        </div>
        <div class="col-md-4 mb-4 mb-md-0 wow bounceInUp">
          <a href="{{ route('deliveryoffers') }}" class="category__block d-flex flex-md-column align-items-center justify-content-between rounded-sm">
            <div class="category__block__image mr-2 mr-md-0 wow bounce" data-wow-iteration="infinite" data-wow-duration="2s">
              <img src="{{ asset('frontend_asset') }}/assets/images/delivery.png" alt="delivery" class="img-fluid">
            </div>
            <h3 class="category__block__text mt-md-3 mb-0">Delivery</h3>
          </a>
        </div>
        <div class="col-md-4 mb-4 mb-md-0 wow bounceInUp" data-wow-delay="0.4s">
          <a href="{{ route('experienceoffers') }}" class="category__block d-flex flex-md-column align-items-center justify-content-between rounded-sm">
            <div class="category__block__image mr-2 mr-md-0 wow bounce" data-wow-iteration="infinite" data-wow-duration="2s" data-wow-delay="0.5s">
              <img src="{{ asset('frontend_asset') }}/assets/images/experience.png" alt="experience" class="img-fluid">
            </div>
            <h3 class="category__block__text mt-md-3 mb-0">Experience</h3>
          </a>
        </div>
        <div class="col-md-4 mb-4 mb-md-0 wow bounceInUp" data-wow-delay="0.8s">
          <a href="{{ route('dinneroffers') }}" class="category__block d-flex flex-md-column align-items-center justify-content-between rounded-sm">
            <div class="category__block__image mr-2 mr-md-0 wow bounce" data-wow-iteration="infinite" data-wow-duration="2s">
              <img src="{{ asset('frontend_asset') }}/assets/images/benefits-1.png" alt="benefits" class="img-fluid">
            </div>
            <h3 class="category__block__text mt-md-3 mb-0">Dinner Out</h3>
          </a>
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
