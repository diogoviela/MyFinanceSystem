			<div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
				<div class="sidebar-logo d-flex justify-content-center align-items-center">
					<a href="/dashboard" class="d-inline-flex align-items-center py-2">
						<img src="{!! asset('theme/global/assets/images/logo_icon.svg') !!}" class="sidebar-logo-icon" alt="">
						<img src="{!! asset('theme/global/assets/images/logo_text_light.svg') !!}" class="sidebar-resize-hide ms-3" height="14" alt="">
					</a>

					<div class="sidebar-resize-hide ms-auto">
						<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
							<i class="ph-arrows-left-right"></i>
						</button>

						<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
							<i class="ph-x"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="sidebar-content">
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<li class="nav-item-header">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item">
							<a href="/dashboard" class="nav-link active">
								<i class="ph-house"></i>
								<span>
									Dashboard
									<span class="d-block fw-normal opacity-50">Nothing pending</span>
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-layout"></i>
								<span>MENU</span>
							</a>
							<ul class="nav-group-sub collapse">
								<li class="nav-item"><a href="#" class="nav-link">Financial</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>


			<div class="alert bg-secondary bg-opacity-20 sidebar-resize-hide rounded p-3 m-3">
				<div class="d-flex mb-2">
					<div class="d-inline-flex bg-white bg-opacity-10 lh-1 rounded-pill p-2">
						<i class="ph-lock-key-open"></i>
					</div>
					<button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"></button>
				</div>
				<div class="mb-2">
					Alert <span class="fw-bold">XXXXXXX</span> xXxXX
				</div>
				<a href="#" class="d-inline-flex align-items-center mt-1" data-color-theme="dark">
					See
					<i class="ph-arrow-circle-right ms-2"></i>
				</a>
			</div>
