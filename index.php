<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blue Pearl Admin - Login</title>
  <link rel ="icon" href="img/logo2.png" type="image/x-icon">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">
<div class="main-content container-login100">
  <div class="container">
  <!-- Header -->
    <div class="header bg-gradient-primarys py-lg-4">
	     <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-51 col-md-6">
              <h1 class="text-primary">Welcome!</h1>
              <p class="text-lead text-primary">To Blue Pearl Operational System.</p>
            </div>
          </div>
        </div>
      </div>
	  </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img height="100" width="210" src="img/logo1.png"></h1>
                  </div>
                  <form class="user" action=""  method="POST" onsubmit="return login();">
                    <div class="form-group" data-validate = "Valid email is required: ex@abc.xyz">
                      <input type="email" class="form-control form-control-user" id="emailAddress" aria-describedby="emailHelp" placeholder="Email Address" required autofocus>
                    </div>
                    <div class="form-group" data-validate = "Password is required">
                      <input type="password" class="form-control form-control-user" id="idPass" placeholder="Password" required autofocus>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <p id="Perror"> </p>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	 function login(){
	  var vEmail=$("#emailAddress").val();
		var vPass=$("#idPass").val();

		if(vEmail!="" && vPass!="")
		{
			$.ajax({
					type:"POST",
					url:"login.php",
					data:{"email":vEmail,"password":vPass},
					success:function(result){
					//alert(result);
					if(result=="fail"){
					//alert("invalid");
					$("#Perror").html("Incorrect email or password!");
					$("#Perror").css("color", "red").css("text-align","center");
					}
					else{
					window.location.href = 'admin.php';
					}
				}

			});
		}
		return false;
	 }
	</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
