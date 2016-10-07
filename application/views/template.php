<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="/assets/css/default.css" />
	</head>
	<script type="text/javascript" src="/assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class-"navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
									data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/welcome"><img alt="JappaDog" width="30px" height="30px" src="/assets/images/Terimayo.jpg"></a>
				</div>
		  	<div class="collapse navbar-collapse" id="myNavbar">
		  		{menubar}
		    </div>
			</div>
		</nav>
        <div class="container">
        	<h1 class="title">{pagetitle}</h1>
			{content}
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
				{ci_version}</p>
        </div>
	</body>
</html>
