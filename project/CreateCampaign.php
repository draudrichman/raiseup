<?php 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 	<style type="text/css">
        form{
          height: 620px;
          max-width: 760px;
          margin: 20px auto;
          padding: 20px;
        }
    </style>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body class="grey lighten-5">
 	<br>
 	<h1 class="container deep-purple-text text-accent-3 center">Raise UP</h1>
 	<br>
 	<nav class="deep-purple lighten-2">
    	<div class="nav-wrapper">
      	<ul id="nav-mobile" class="left hide-on-med-and-down">
      		<li><a href="">Home</a></li>
      		<li><a href="">Explore</a></li>
        	<li><a href="">Campaigns</a></li>
        	<li><a href="">Profile</a></li>
        	<li><a href="">Help & Support</a></li>
        	<li><a href="logout.php">Log Out</a></li>
      	</ul>
    	</div>
  	</nav>
 	<br> 
    <h4 class="container grey-text text-accent-3 center">Create New Campaign</h4>
    <form class="white" action="">
		<label for="title">Title : </label>
      	<input type="text" id = "title" required value=""> <br>
      	<label for="description">Description : </label>
      	<input type="text" id = "description" required value=""> <br>
      	<label for="goalAmount">Goal Amount : </label>
      	<input type="text" id = "goalAmount" required value=""> <br>
      	<label for="category">Category : </label>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Animal Welfare</span>
      		</label>
      	</p>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Education</span>
      		</label>
      	</p>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Environment</span>
      		</label>
      	</p>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Medical</span>
      		</label>
      	</p>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Art & Culture</span>
      		</label>
      	</p>
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Sports</span>
      		</label>
      	</p>	
      	<p>
      		<label>
        	<input name="group1" type="radio" checked />
        	<span>Others</span>
      		</label>
      	</p>
      	<div class="center">
        	<a href="login.php" class="btn brand z-depth-1">Create Campaign</a>
      	</div> 
    </form>
 	
 </body>
 </html>