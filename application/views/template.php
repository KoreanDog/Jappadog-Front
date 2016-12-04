<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {caboose_styles}
        <link rel="stylesheet" href="/assets/css/default.css" />
	</head>
	<body>
  		{menubar}
        <div class="container">
        	<h1 class="title">{pagetitle}</h1>
			{content}
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
				{ci_version}</p>
        </div>
        {caboose_scripts}
        {caboose_trailings}
	</body>
</html>
