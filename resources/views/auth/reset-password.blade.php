

<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from codeigniter.spruko.com/azea/ltr/pages/reset-password-1 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 19:09:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Azea – Codeigniter  Admin & Dashboard Template" name="description">
		<meta content="SPRUKO™" name="author">
		<meta name="keywords" content="admin, dashboard, admin template, codeigniter, codeigniter admin panel, codeigniter admin template, codeigniter dasdhboard, codeigniter dasdhboard template, codeigniter ui template, codeigniter framework, codeigniter admin dashboard, bootstrap, bootstrap 5 admin template, codeigniter bootstrap 5 template, codeigniter bootstrap 5 admin panel template.">

		<!-- Title -->
		<title>Application de gestion de stock</title>

        <!--Favicon -->
<link rel="icon" href="https://codeigniter.spruko.com/azea/ltr/assets/images/brand/favicon.ico" type="image/x-icon"/>

<!--Bootstrap css -->
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        
<!-- Style css -->
<link href="../assets/css/style.css" rel="stylesheet" />
<link href="../assets/css/dark.css" rel="stylesheet" />
<link href="../assets/css/skin-modes.css" rel="stylesheet" />

<!-- Animate css -->
<link href="../assets/css/animated.css" rel="stylesheet" />

<!---Icons css-->
<link href="../assets/css/icons.css" rel="stylesheet" />

<!-- Color Skin css -->
<link id="theme" href="../assets/colors/color1.css" rel="stylesheet" type="text/css"/>

    </head>

	<body class="error-bg h-100vh">

		
            <div class="register1">

        
			<!-- Loader -->
			<!-- <div id="global-loader">
				<img src="https://codeigniter.spruko.com/azea/ltr/assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
			</div> -->
			<!-- /Loader -->

        	
						<div class="page">
							<div class="page-single">
								<div class="container">
									<div class="row">
										<div class="col mx-auto">
											<div class="row justify-content-center">
												<div class="col-xl-7 col-lg-12">
													<div class="row p-0 m-0">
														<div class="col-lg-6 p-0">
															<div class="text-justified text-white p-5 register-1">
																<div class="custom-content">
																	<div class="mb-5 br-7">
																		<img src="../assets/images/brand/gt_1.png" class="header-brand-img desktop-lgo" alt="Azea logo">
                                                                        <br>
                                                                        <hr>
																	</div>
																	<div class="ms-5">
																		<div class="fs-16 mb-6 font-weight-bold text-white">BIENVENUE À VOTRE APPLICATION !</div>
																		<div class="mb-6 text-white-50">
																			
																		</div>
																		
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-8 col-lg-6 p-0 mx-auto">
														<div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
															<div class="card-body">
                                                             <!-- Validation Errors -->
                                                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
																<div class="text-center mb-3">
																	<h1 class="mb-2">Mot de passe</h1>
																	<a href="javascript:void(0);" class="">Créer un nouveau mot de passe</a>
																</div>
																<form method="POST" action="{{ route('password.update') }}">
                                                                @csrf

                                                                <!-- Password Reset Token -->
                                                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                                                    <!-- Email Address -->

																	<div class="input-group mb-4">
																		<div class="input-group" id="Password-toggle">
																			<a href="#" class="input-group-text">
																			<i class="fe fe-mail" aria-hidden="true"></i>
																			</a>
                                                                           
																			<x-input id="email" class="form-control" type="email" placeholder="Password" name="email" :value="old('email', $request->email)" required autofocus />
																		</div>
																	</div>
                                                                    <!-- Password -->

																	<div class="input-group mb-4">
																		<div class="input-group" id="Password-toggle1">
																			<a href="#" class="input-group-text">
																			<i class="fe fe-eye" aria-hidden="true"></i>
																			</a>
																			<x-input id="password" class="form-control" type="password" placeholder="Nouveau mot de passe" name="password" required />
																		</div>
																	</div>
																	<!-- Confirm Password -->
                                                                    <div class="input-group mb-4">
                                                                    
																		<div class="input-group" id="Password-toggle2">
																			<a href="#" class="input-group-text">
																			<i class="fe fe-eye" aria-hidden="true"></i>
																			</a>
																			<x-input id="password_confirmation" class="form-control"
                                                                                type="password"
                                                                                placeholder="Confirmer votre mot de passe"
                                                                                name="password_confirmation"  required />
																		</div>
																	</div>
																	<div class="form-group">
																		<br>
																	</div>
																	<div class="form-group text-center mb-3">
                                                                    <button type="submit" class="btn btn-outline-dark  btn-block d-grid px-4 font-weight-bold">Réinitialiser </button>
																		
																	</div>
																	<div class="text-center pt-4">
																<div >Vous avez déja un compte ?<a class="btn-link " href="{{ url ('/login') }}  ">Se connecter </a></div>
															</div>
																</form>
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
						</div>
						
				
		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

        		<!-- Jquery js-->
		<script src="../assets/js/jquery.min.js"></script>

		<!-- Bootstrap5 js-->
		<script src="../assets/plugins/bootstrap/popper.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Jquery-rating js-->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Othercharts js-->
		<script src="../assets/plugins/othercharts/jquery.sparkline.min.js"></script>		

		
			<!-- Show Password -->
			<script src="../assets/js/bootstrap-show-password.min.js"></script>

		
		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>
    </body>

<!-- Mirrored from codeigniter.spruko.com/azea/ltr/pages/reset-password-1 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 19:09:21 GMT -->
</html>