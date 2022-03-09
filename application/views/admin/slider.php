<div id="haha">

	<!-- <script src="<?php echo base_url('assets/test/js-image-slider.js') ?>"></script>
	
		<link href="<?php echo base_url('assets/test/js-image-slider.css') ?>" rel="stylesheet">
		<div id="sliderFrame">
			<div id="slider">
				<a href="" target="_blank">
					<img src="<?php echo base_url('images/sekolah.jpg'); ?>" alt="#cap1" />
				</a>
				  <img src="<?php echo base_url('images/la.jpg'); ?>" class="img-rounded" alt="Laboratory" width="304" height="236"> 

				<img id="image1" src="<?php echo base_url('images/kerusi.jpg'); ?>" alt="Welcome to Our Class."/>
				<img id="image1" src="<?php echo base_url('images/field.jpg'); ?>" alt="Many type of classes."/>
				<img id="image1" src="<?php echo base_url('images/canteen.jpg'); ?>" />
			</div>
			<div style="display: none;">
				<div id="cap1">
					Welcome to <a href="https://cedar.edu.pk/">Cedar</a>.
				</div>
				<div id="cap2">
					<em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
				</div>
			</div>
		</div> -->

	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-primary">
					<div class="inner">
						<h3><?php
							if (isset($student)) {
								echo sizeof($student);
							} else {
								echo 0;
							}
							?></h3>

						<p>Student</p>
					</div>
					<div class="icon">
						<i class="ionicons ion-social-buffer"></i>
					</div>
					<a href="<?php echo base_url(); ?>manage-department" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-maroon">
					<div class="inner">
						<h3><?php
							if (isset($teacher)) {
								echo sizeof($teacher);
							} else {
								echo 0;
							}
							?></h3>

						<p>Teacher</p>
					</div>
					<div class="icon">
						<i class="ionicons ion-android-contacts"></i>
					</div>
					<a href="<?php echo base_url(); ?>manage-staff" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php
							if (isset($leave)) {
								echo sizeof($leave);
							} else {
								echo 0;
							}
							?></h3>

						<p>Leave Requests</p>
					</div>
					<div class="icon">
						<i class="ionicons ion-log-out"></i>
					</div>
					<a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>$<?php
								if (isset($salary)) {
									foreach ($salary as $s) {
										echo $s['total'];
									}
								} else {
									echo 0;
								}
								?></h3>

						<p>Salary Paid</p>
					</div>
					<div class="icon">
						<i class="ionicons ion-social-usd"></i>
					</div>
					<a href="<?php echo base_url(); ?>manage-salary" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</section>
</div>