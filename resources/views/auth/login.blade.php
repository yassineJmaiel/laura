
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Biba Dridi</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4" style="background-color: black;"><a class="app-logo" href="index.html"></a></div>
					<h2 class="auth-heading text-center mb-5">кіру</h2>
			        <div class="auth-form-container text-start">

						<form method="POST" action="{{ route('login')}}">

                    @csrf
                    @method('POST')


                        @if (Session::get('error_msg'))
                          <b style="font-size: 10px; color:red" > {{ session::get('error_msg')}} </b>
                        @endif

							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Электрондық поштаның адресі</label>
								<input id="email" name="email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Құпия сөз</label>
								<input id="password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								
								
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" style="background-color: black;">кіру</button>
							</div>
						</form>
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	   
    </div><!--//row-->


</body>
</html> 

