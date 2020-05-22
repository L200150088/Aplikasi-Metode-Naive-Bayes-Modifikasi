<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								
								<div class="media-body">
								NAIVE BAYES MODIFIKASI
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								
								<li class="navigation-header"><span>Menu Aplikasi</span> <i class="icon-menu" title="Main pages"></i></li>
								

										<li><a href="<?php echo base_url('data_set') ?>"><i class="fa fa-edit fa-2x"></i> <span>Data Training</span></a></li>

										<li><a href="<?php echo base_url('data_tes') ?>"><i class="fa fa-edit fa-2x"></i> <span>Data Testing</span></a></li>

										<li><a href="<?php echo base_url('coba_dataset') ?>"><i class="fa fa-dashboard fa-2x"></i> <span>Pengujian Algoritma </span></a></li>

										<li><a href="<?php echo base_url('naive_bayes_awal') ?>"><i class="fa fa-dashboard fa-2x"></i> <span>Naive Bayes</span></a></li>

										<li><a href="<?php echo base_url('modifikasi_naive_bayes_awal') ?>"><i class="fa fa-dashboard fa-2x"></i> <span>Modifikasi Naive Bayes</span></a></li>

										<li><a href="<?php echo base_url('laplace_smoothing_awal') ?>"><i class="fa fa-dashboard fa-2x"></i> <span>Laplace Smoothing</span></a></li>
										
										

								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<script type="text/javascript">
				var url = window.location;
				// Will only work if string in href matches with location
				$('ul.navigation a[href="'+ url +'"]').parent().addClass('active');

				// Will also work for relative and absolute hrefs
				$('ul.navigation a').filter(function() {
				    return this.href == url;
				}).parent().addClass('active');
			</script>