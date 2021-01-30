<?php get_header(); ?>
<div class="container">
	<div class="test">
	<?php
	  $results = wp_remote_retrieve_body(wp_remote_get('https://loreleim.github.io/chickenapi/data/flat.json')); //without retrieve body you'll get to much info
	  echo print_r($results);
	?>
	</div>
	<div class="main">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<article class="post">
			<h3>
			<?php the_title(); ?>
			</h3>
			<?php if( has_post_thumbnail()) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>

			</div>
			<?php endif; ?>
			<?php the_content(); ?>

		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<?php echo wpautop('Sorry, No Posts were found'); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
