<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/clerk.css')); ?>">
</head>
<body>
<form method="POST" enctype="multipart/form-data">
<div class="container">
<div class="row gutters">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<div class="user-avatar">
                            <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="">
						</div>
						<h5 class="user-name"></h5>
						<h6 class="user-email"></h6>
					</div>
					<div class="about">
						<h5 class="mb-2 text-primary">About me</h5>
						<p>I'm neriJ. A Computer Science commit studying at Ho Chi Minh University of Technology.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Full Name</label>
							<input type="text" class="form-control" name="fullName" id="fullName" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" name="email" id="eMail" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="tel" class="form-control" name="phone" id="phone" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" id="username" value="">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Address</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Street">Street</label>
							<input type="text" class="form-control" name="street" id="Street" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="ward">Ward</label>
							<input type="text" class="form-control" name="ward" id="ward" value="">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="district">District</label>
							<input type="text" class="form-control" name="district" id="district" value="">
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="ciTy">City</label>
							<input type="text" class="form-control" name="city"id="ciTy" value="">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<a type="button" href="/clerk" class="btn btn-secondary">Cancel</a>
                            <input type="hidden" name="id" value="">
							<input type="hidden" name="current_image" value="">
							<input type="submit" name="submit" class="btn btn-primary" value="Update">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="text-center">
					<img src="<?php echo e(asset('images/logo.jpg')); ?>"  class="user-image"alt="">
				</div>
				<div class="mb-3">
					<label for="formFile" class="mb-3 text-primary">Update Avatar</label>
					<input type="file" class="form-control" name="image" id="formFile">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</form>
</body>
</html><?php /**PATH C:\Users\loc_m\Documents\GitHub\CNPM-Restaurant\source_code\resources\views/clerk/profile.blade.php ENDPATH**/ ?>