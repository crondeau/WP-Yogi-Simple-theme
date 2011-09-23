<?php get_header(); ?>
<div id="main">
	<div id="content">
	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php if (is_category()) { ?>				
			<h1><?php echo single_cat_title(); ?></h1>
			
		<?php } elseif( is_tag() ) { ?>
			<h1>Posts Tagged: <?php single_tag_title(); ?></h1>
			
		<?php }elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
			
		<?php }elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>
			
		<?php }elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>
			
		<?php } elseif (is_search()) { ?>
			<h1>Search Results</h1>
			
		<?php } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
			
		<?php }elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
			
		<?php } ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p class="date"><?php the_time('F dS, Y'); ?></p>
		 	<?php the_content(__('Read more'));?>
				
			<?php get_template_part('inc/meta'); ?>
		</div>
	
		  <?php comments_template(); // Get wp-comments.php template ?>
		  <?php endwhile; else: ?>
			
		  <p>Sorry, no posts matched your criteria.</p>
		
		  <?php endif; ?>
		  <?php get_template_part('inc/nav'); ?>
		  
		</div>

<?php get_sidebar(); ?>
</div><!-- end of main div -->
<?php get_footer(); ?>