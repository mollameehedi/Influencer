
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Influencer Delivery Offer</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/images/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/plugins/wow/css/animate.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
</head>
<body>
	<!-- Category Individual offer Section -->
	<section class="individual-offer position-relative py-3 min-vh-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="accordion" id="accordionExample">
						<div class="card wow bounceInUp" data-wow-delay="0.1s">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0 d-flex">
									<a href="{{ route('deliveryoffers') }}" class="back-btn d-inline-block rounded-sm"><i class="fas fa-chevron-left"></i></a>
									<button class="btn-block text-left ml-3 border-0 bg-transparent collapse-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Offer</button>
								</h2>

							</div>
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body text-center">
									<figure class="individual-offer__image">
										<img src="{{ asset('frontend_asset') }}/assets/images/delivery-items-1.jpg" alt="delivery-items" class="w-100">
									</figure>
                                    @if (session('request_status'))
                                    <div class="alert alert-success">
                                        {{ session('request_status') }}
                                    </div>
                                @endif
									<h2 class="individual-offer__title mb-3">{{ $offer_details->name }}
										<span class="individual-offer__shop d-block my-2">Hummus Brothers ({{ $offer_details->time_sidule }})</span>
									</h2>
                                    <div>
                                        {{ $offer_details->details }}
                                    </div>
									{{-- <p class="individual-offer__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!</p>
									<p class="individual-offer__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium amet minima necessitatibus illum minus deleniti saepe, officiis enim recusandae voluptatum cupiditate explicabo praesentium nisi ex asperiores iusto alias? Modi magnam illo aut tempore ipsa, dolores fugit cum commodi. Aliquam doloremque dicta libero, ullam sunt tempore aut deleniti dolorem qui exercitationem!</p> --}}
									<a href="" class="primary-btn primary-btn--reversed position-relative text-uppercase d-inline-block w-100" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<span class="position-relative">Yes. I'm in</span>
									</a>
									<a href="{{ route('deliveryoffers') }}" class="primary-btn position-relative text-uppercase d-inline-block w-100 my-3 my-md-0">
										<span class="position-relative">No, thanks</span>
									</a>
								</div>
							</div>
						</div>
						<div class="card wow bounceInUp" data-wow-delay="0.3s">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
								<button class="btn-block text-left border-0 bg-transparent collapse-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fas fa-clipboard-list mr-3 collapse-button__icon"></i>Rules
								</button>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<ul class="rules-list">
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Good behave sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Good behave sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Good behave sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Eat fast Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, reiciendis?</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Good behave sit amet consectetur adipisicing elit.</li>
										<li class="rules-item d-inline-flex"><span class="rules-icon d-inline-block mr-3"><i class="fas fa-crosshairs"></i></span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
									</ul>
									<div class="text-center">
										<a href="#!" class="primary-btn primary-btn--reversed position-relative text-uppercase d-inline-block w-100" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<span class="position-relative">Yes. I'm agree</span>
										</a>
										<a href="#!" class="primary-btn position-relative text-uppercase d-inline-block w-100 my-3 my-md-0">
											<span class="position-relative">I'm not agree</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card wow bounceInUp" data-wow-delay="0.5s">
							<div class="card-header" id="headingThree">
								<h2 class="mb-0">
								<button class="btn-block text-left border-0 bg-transparent collapse-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="fas fa-clipboard-check mr-3 collapse-button__icon"></i>Confirmation
								</button>
								</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="text-center">
										<a href="{{ route('offer.request',$offer_details->id) }}" class="primary-btn primary-btn--reversed position-relative text-uppercase d-inline-block w-100">
											<span class="position-relative">Yes. Confirm</span>
										</a>
										<a href="#!" class="primary-btn position-relative text-uppercase d-inline-block w-100 my-3 my-md-0">
											<span class="position-relative">Cancle</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	<script src="{{ asset('frontend_asset') }}/assets/js/script.js"></script>
</body>
</html>
