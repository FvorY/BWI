<!DOCTYPE html>
<html lang="en">
@include('layouts_front._head')

@yield('extra_style')
<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="{{asset('assets/images/loading.svg')}}" alt="">
                    <h6>Now Loading</h6>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="main-wrap">
		@include('layouts_front._sidebar')
			<main class="position-relative">
				@yield('content')
			</main>
		@include('layouts_front._footer')
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>

	@include('layouts_front._script')

    @yield('extra_script')
</body>
</html>
