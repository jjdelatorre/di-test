<!DOCTYPE html>
<html>
  <head>
	<title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <?php echo HTML::style('application/assets/css/bootstrap.css');  ?>
    <?php echo HTML::style('application/assets/css/bootstrap-theme.css');  ?>
    <?php echo HTML::style('application/assets/css/app.css');  ?>
  </head>
  <body>
  	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DI TEST</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL::site(); ?>">Home</a></li>
            <li><a href="<?php echo URL::site('article/create');?>">Create Article</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
    	<?php include Kohana::find_file('views', $sub_view); ?>
    </div>
	<?php echo HTML::script('application/assets/js/jquery-2.0.3.min.js'); ?>
	<?php echo HTML::script('application/assets/js/bootstrap.js');  ?>
  <?php echo HTML::script('application/assets/js/knockout-2.3.0.js');?>
  </body>
</html>