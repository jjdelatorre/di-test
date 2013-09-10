<div class="row">	
	<form class="form-horizontal" role="form" action="<?= URL::site('/article/create'); ?>" method="post" accept-charset="utf-8">
	 	<div class="form-group">
	    	<label for="title" class="col-lg-2 control-label">Title</label>
	    	<div class="col-lg-10">
	    		<input type="text" class="form-control" id="title" placeholder="Title">
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="author" class="col-lg-2 control-label">Author</label>
	    	<div class="col-lg-10">
	      		<input type="password" class="form-control" id="author" placeholder="Author">
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label for="content" class="col-lg-2 control-label">Content</label>
	    	<div class="col-lg-10">
	      		<textarea class="form-control" rows="8" placeholder="Content"></textarea>
	    	</div>
	  	</div>

		<div class="form-group">
	    	<div class="col-lg-offset-2 col-lg-10">
	      		<button type="submit" class="btn btn-default btn-block">Save</button>
	    	</div>
	  	</div>
	</form>
</div>