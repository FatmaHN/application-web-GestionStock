

<!DOCTYPE html>
<html lang="en" dir="ltr">
	
<!-- Mirrored from codeigniter.spruko.com/azea/ltr/pages/register-1 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 19:09:20 GMT -->
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
															<div class="text-justified text-white p-5 register-1 overflow-hidden">
																<div class="custom-content">
																	<div class="mb-5 br-7">
																		<img src="../assets/images/brand/gt_1.png" class="header-brand-img desktop-lgo" alt="Azea logo">
                                                                        <br>
                                                                        <hr>
																	</div>
																	<div class="ms-5">
																		<div class="fs-16 mb-6 font-weight-bold text-white">BIENVENUE À VOTRE APPLICATION !</div>
																		<div class="mb-6 text-white-50">
																			<br><br>
																		</div>
                                                                        <div>
																		<h6 class="text-white-50">Déjà membre ?</h6>
                                                                        <a href="{{ url ('/login') }}" class="btn btn-white text-primary text-transparent font-weight-bold ">Se connecter</a>
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
																	<h1 class="mb-2">S'inscrire</h1>
                                                                    <hr>
																	<a>Créer un nouveau compte</a>
																</div>
																<form method="POST" action="{{ route('register') }}">
                                                                @csrf
                                                                 <!-- Name -->
            
																	<div class="input-group mb-4">
																			<div class="input-group-text">
																				<i class="fe fe-user"></i>
																			</div>
																		    <x-input id="name" class="form-control" type="text" placeholder="Nom d'utilisateur" name="name" :value="old('name')" required autofocus />
																	</div>

                                                                    <!-- Email Address -->
            
																	<div class="input-group mb-4">
																			<div class="input-group-text">
																				<i class="fe fe-mail"></i>
																			</div>
																		<x-input id="email" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required />
																	</div>

                                                                    <!-- Password -->

																	<div class="input-group mb-4">
																		<div class="input-group" id="Password-toggle">
																				<a href="#" class="input-group-text">
																				<i class="fe fe-eye" aria-hidden="true"></i>
																				</a>
																			<x-input id="password" class="form-control"
                                                                                placeholder="Mot de passe"
                                                                                type="password"
                                                                                name="password"
                                                                                required autocomplete="new-password" />
																		</div>
																	</div>
                                                                    <!-- Confirm Password -->
            
																	<div class="input-group mb-4">
																		<div class="input-group" id="Password-toggle1">
																			<a href="#" class="input-group-text">
																			<i class="fe fe-eye" aria-hidden="true"></i>
																			</a>
																			<x-input id="password_confirmation" class="form-control"
                                                                                placeholder="Confirmer votre mot de passe"
                                                                                type="password"
                                                                                name="password_confirmation" required />
																		</div>
																	</div>
																	<div class="form-group">
																		
																	</div>
                                                                    
																	<div class="form-group text-center mb-3">
                                                                    <br>
																		<button type="submit" class="btn btn-outline-dark  btn-block d-grid px-4 font-weight-bold">S'inscrire</button>
																	</div>
																	<div class="form-group fs-12 text-center">
                                                                    <br> 
                                                                    <hr>   
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

<!-- Mirrored from codeigniter.spruko.com/azea/ltr/pages/register-1 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jan 2022 19:09:21 GMT -->
</html>



















<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
