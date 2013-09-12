<!-- <section class="entries_wrapper container">
	<?php foreach ($articles as $article) { ?>
	<article class="entry span9 offset1">
		<header>
			<h1><?php echo stripslashes($article->title); ?></h1>
				<a href="<?php echo URL::site('article/edit/'.$article->id); ?>"><span class="glyphicon glyphicon-edit"></span></a> 
			<small>
				<time datetime="<?php echo date('Y-m-d', strtotime($article->timestamp)); ?>" pubdate=""><?php echo date('D, d M Y', strtotime($article->timestamp)); ?></time> by <?php echo $article->author; ?>.
			</small>
		</header>
		<p><?php echo stripslashes($article->body); ?></p>
	</article>
	<?php } ?>
</section> -->
<section class="entries_wrapper container">
	<article class="entry span9 offset1" data-bind="foreach: articles, visible: articles().length > 0">
		<header>
			<h1 data-bind="text: title"></h1>
				<a href="#"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
				<a href="#" data-bind="click: $parent.deleteArticle"><span class="glyphicon glyphicon-remove"></span></a>
				<small>
					<time data-bind="text: date"></time> by <span data-bind="text: author"></span>.
				</small>
		</header>
		<p data-bind="text: body"></p>
	</article>
</section>