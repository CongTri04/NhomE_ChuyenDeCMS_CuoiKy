<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */

get_header(); ?>
<!-- Task-5 - CSS -->
<style>
	#primary .site-main {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
	}

	#primary .site-main article {
		flex: 1 1 calc(50% - 20px);
		box-sizing: border-box;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: #fff;
		padding: 15px;
	}

	#primary .site-main article img {
		height: 180px;
		min-width: 180px;
		object-fit: cover;
	}

	#secondary {
		float: right;
		width: 25%;
		margin-top: 50px;
	}

	#primary {
		float: left;
		width: 70%;
	}

	.list-view .site-main article {
		box-shadow: none;
		border-radius: 0;
		margin-bottom: 20px;
	}

	.bg-for-task-5 {
		background-color: #f2f2f2;
	}

	.header-title-for-task-5 {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 40px;
		margin-bottom: 30px;
	}

	.site-content {
		margin-top: 0;
		margin-bottom: 0;
	}
	.list-view .site-main article .content-wrap {
		padding: 0 0 0 30px;
	}
	.list-view .site-main article .entry-meta {
		margin-bottom: 0;
	}
	.site-main article .entry-header .entry-title {
		margin-bottom: 12px;
	}
	.site-main article .entry-content {
		margin-bottom: 12px;
	}
	a.readmore-link {
		font-weight: bold;
	}
</style>

<div id="primary" class="content-area">
	<!-- Task-5 - Main -->
	<h2 class="header-title-for-task-5">Newest Blog Entries</h2>
	<?php
	/**
	 * Before Posts hook
	 */
	do_action('jobscout_before_posts_content');
	?>

	<main id="main" class="site-main">
		<?php
		if (have_posts()):

			/* Start the Loop */
			while (have_posts()):
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_format());

			endwhile;

		else:

			get_template_part('template-parts/content', 'none');

		endif; ?>

	</main><!-- #main -->

	<?php
	/**
	 * After Posts hook
	 * @hooked jobscout_navigation - 15
	 */
	do_action('jobscout_after_posts_content');
	?>

</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
