<!DOCTYPE html>
<html>
<head>
	<title>QuizTastic!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

	<!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>

<body>
	<div class="container">
	  <div class="header">
		<ul class="nav nav-pills pull-right">
		  <li><a href="/">Home</a></li>
		  <!-- Menu for users who are logged in -->
			<?php if($user): ?>
				<li><a href='/users/logout'>Logout</a></li>
			<!-- Menu options for users who are not logged in -->
			<?php else: ?>
				<li><a href='/users/signup'>Sign up</a></li>
				<li><a href='/users/login'>Log in</a></li>
			<?php endif; ?>
		</ul>
		<h3 class="text-muted">Quizes!!</h3>
	  </div>
	  <div class="content_options">
	  	<ul class="nav nav-pills">
	  		<li id="nav_posts"><a href="/quizes">Available Quizes</a></li>
	  		<li id="nav_posts_add"><a href="/quizes/add">Add A New Quiz</a></li>
	  		<li id="nav_posts_users"><a href="/quizes/myquizes">My Quiz History</a></li>
	  	</ul>
	  </div>
	  <div class="jumbotron">
		 <!-- Content! -->
		 <?php if(isset($content)) echo $content; ?>
		 <!-- Error section if need be -->
		 <div class="error"></div>
	  </div>

	  <div class="footer">
		<p>&copy; QuizTastic! 2013</p>
	  </div>

    </div> <!-- /container -->

    <br>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>


</body>
</html>