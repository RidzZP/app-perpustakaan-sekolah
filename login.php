<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
		<style>
			.card{
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				position: fixed;
			}
			body{
				margin: 0;
				padding: 0;
			}
			.login{
				margin-left: 0px;
				width: 200px;
				
			}
		
		
		</style>
	</head>
	<body>
		<div class="card justify-content-center shadow-lg h-60">
			<section class="flogin d-flex">
				<div class="login-right w-30 h-50 rounded-left ">
					<img src="image/login.jpg" class="img-thumbnail" style="width: 59vh;"> <!--left-->
				</div>
				<div class="gambar-left bg-primary h-60 rounded-right" style="width: 320px;"><!--right-->
					<div class="justify-content-center h-60" style="padding:29px; margin-left: 27px;">
						<form method="POST" action="CekLogin.php" class="login text-white">
							<div class="text-center">
								<img src="image/logoSMP.jpg" class="img-thumbnail mb-5" style="width: 22vh;"> <!--logo-->
							</div>
							<div class="form-group ">
								<label class="form-label">Username :</label><br/>
								<input type="text" name="username" class="form-control mb-3" placeholder="Username" autocomplete="off" autofocus required>
							</div>
							<div class="form-group ">
								<label class="form-label">Password :</label><br/>
								<input type="password" name="password" class="form-control mb-4" placeholder="Password" autocomplete="off" required>
							</div>
							<div class="form-group text-right">
								<button type="submit" name="btl_simpan" class="btn btn-success">Login</button>								
							</div>
						</form>
					</div>
				</div>	
			</section>	
	</body>
</html>