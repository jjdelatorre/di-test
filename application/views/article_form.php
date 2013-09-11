<div class="row">
	<?php 
	$form_uri = '/article/create';
	if (Request::current()->action() == 'edit')
		$form_uri = '/article/edit/'.Arr::get($form_values, 'id');
	?>
	<form class="form-horizontal" role="form" action="<?= URL::site($form_uri); ?>" method="post" accept-charset="utf-8">
		<?php
		$alert_class = '';
		$msg = '';
		if($form_errors != NULL)
		{
			$msg = implode('<p></p>', $form_errors);
			$alert_class = 'alert-danger';
		}
		?>
		<div class="alert <?php echo $alert_class; ?>"><?php echo $msg; ?></div>
	 	<div class="form-group">
	    	<label for="title" class="col-lg-1 control-label">Title</label>
	    	<div class="col-lg-10">
	    		<input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo Arr::get($form_values, 'title'); ?>"/>
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="author" class="col-lg-1 control-label">Author</label>
	    	<div class="col-lg-10">
	      		<input type="text" class="form-control" name="author" placeholder="Author" value="<?php echo Arr::get($form_values, 'author'); ?>"/>
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="content" class="col-lg-1 control-label">Content</label>
	    	<div class="col-lg-10">
	      		<textarea class="form-control" rows="8" name="body" placeholder="Content"><?php echo Arr::get($form_values, 'body'); ?></textarea>
	    	</div>
	  	</div>

		<div class="form-group">
	    	<div class="col-lg-offset-1 col-lg-10">
	      		<button type="submit" class="btn btn-default btn-block">Save</button>
	    	</div>
	  	</div>
	</form>
</div>