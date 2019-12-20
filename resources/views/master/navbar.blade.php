<!-- header -->
	<header class="header" style="-webkit-box-shadow: 0 5px 25px 0 rgba(0,0,0,0.3);">
		<div class="header__wrap"> 
			<div class="container"> 
				<div class="row"> 
					<div class="col-12"> 
						<div class="header__content"> 
							<!-- header logo -->
							<a href="{{ url('/') }}" class="header__logo">
								<img src="/img/logo.png" alt="">
	                        </a>
							<!-- end header logo --> 
							<!-- header nav --> 
							<ul class="header__nav"> 
								<!-- nav item --> 
								<li class="header__nav-item"> 
									<a href="{{ url('/') }}" class="header__nav-link"> 
										Home 
									</a> 
								</li> 
							
								<li class="header__nav-item"> 
									<a href="{{ url('movies/') }}" class="header__nav-link"> 
										Movies 
									</a> 
								</li> 

								@if ( !auth()->user() )
								<li class="header__nav-item"> 
									<a href="{{ url('login/') }}" class="header__nav-link"> 
										login 
									</a> 
								</li> 
								@endif
								<!-- nav item end --> 
							</ul> 
							<!-- end header nav -->
							<!-- header auth --> 
							<div class="header__auth">
									<button class="header__search-btn" type="button">
										<i class="fas fa-search"></i>
									</button>
									@guest
									@if (Route::has('register'))

										<a class="header__sign-in" href="{{ route('register') }}">
											<i class="fas fa-sign-in-alt"></i>
										
											<span>
												{{ __('Register') }}
											</span>
										</a>
									@endif
									
									@else
										<li class="header__nav-item">
											<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{ Auth::user()->name }} <span class="caret"></span>
											</a>
										
											<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
												<li>
													<a href="{{ route('logout') }}"
													onclick="event.preventDefault();
																  document.getElementById('logout-form').submit();">
													 {{ __('Logout') }}</a>
												</li>

												<li>
													<a href="{{ url('/user/edit/' . auth()->user()->id) }}">
														Edit Profile
													</a>
												</li>
											
												@if(Auth::user()->isAdmin == 1)
													<li>
														<a href="{{ url('admin') }}">
															{{ __('Dashboard') }}
														</a>
													</li>
												@endif
												
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
											</ul>
										</li>
									@endguest
							</div>
						
							<button class="header__btn" type="button"> 
								<span></span> 
								<span></span> 
								<span></span> 
							</button> 
							<!-- end header menu btn --> 
						</div> 
					</div> 
				</div> 
			</div> 
		</div>

		<form autocomplete="off" action="{{ url('movies/') }}" method="GET" class="header__search" id="header--search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input name="search" type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button onclick="let x = document.getElementById('header--search'); x.submit();" type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</header> 
<!-- end header -->