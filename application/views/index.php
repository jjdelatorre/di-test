<section class="entries_wrapper container">
	<?php foreach ($articles as $article) { ?>
	<article class="entry span9 offset1">
		<header>
			<h1><?php echo stripslashes($article->title); ?></h1>
				<a href="javascript:void(0);"><span class="glyphicon glyphicon-edit"></span></a> 
			<small>
				<time datetime="<?php echo date('Y-m-d', strtotime($article->timestamp)); ?>" pubdate=""><?php echo date('D, d M Y', strtotime($article->timestamp)); ?></time> by <?php echo $article->author; ?>.
			</small>
		</header>
		<p><?php echo stripslashes($article->body); ?></p>
	</article>
	<?php } ?>
</section>