<?php
/*
Theme Name: Bounty Bali
Theme URI: http://www.bountybali.com/
Description: Themes Bounty Bali
Version: 4.5.3
Author: Wordpress
Author URI: http://www.bountybali.com/
*/
get_header(); ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
   
		<?php 
			$term = $wp_query->queried_object;
			$slider_pages = get_field('slider_pages');
			$slider_pages02 = get_field('slider_pages02');
			//$slider_cat = the_field('slider_pages', $term->taxonomy . '_' . $term->term_id);
		?>
		<?php //echo the_field('slider_pages', $term->taxonomy . '_' . $term->term_id); ?>
		
		 
        <div class="item active"> 
            <img src="<?php echo the_field('slider_pages', $term->taxonomy . '_' . $term->term_id); ?>" />
        </div>
        
        
        <div class="item"> 
            <img src="<?php echo the_field('slider_pages02', $term->taxonomy . '_' . $term->term_id); ?>" />
        </div>
       
        
     
	</div>
</div>

<div class="text-center listest clearfix">

	<?php $heading = new WP_Query( 'page_id=443' ); ?>
	<?php if ( $heading->have_posts() ) : ?>
	<?php while ( $heading->have_posts() ) : $heading->the_post(); ?>
    <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
        <div class="banner-grey col-lg-3">
            <h3><?php the_title(); ?></h3>
        </div>
    </a>
    <?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
    
    <?php $heading2 = new WP_Query( 'page_id=445' ); ?>
	<?php if ( $heading2->have_posts() ) : ?>
	<?php while ( $heading2->have_posts() ) : $heading2->the_post(); ?>
    <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
    <div class="banner-blue col-lg-3">
        <h3><?php the_title(); ?></h3>
    </div>
    </a>
    <?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
    
    <?php $heading3 = new WP_Query( 'page_id=304' ); ?>
	<?php if ( $heading3->have_posts() ) : ?>
	<?php while ( $heading3->have_posts() ) : $heading3->the_post(); ?>
    <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
    <div class="banner-krem col-lg-3">
        <h3><?php the_title(); ?></h3>
    </div>
    </a>
    <?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
    
    <?php $heading4 = new WP_Query( 'page_id=308' ); ?>
	<?php if ( $heading4->have_posts() ) : ?>
	<?php while ( $heading4->have_posts() ) : $heading4->the_post(); ?>
    <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
    <div class="banner-red col-lg-3">
        <h3><?php the_title(); ?></h3>
    </div>
    </a>
    <?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php endif; ?>
    
</div>

<div class="pad-section">
	<div class="container">
    
		
                 <?php $category = get_the_category(); ?>
                 <h1><?php echo ''.$category[0]->cat_name.'';?></h1>
                 <div class="divider"></div>
                 <?php if (have_posts()) : ?>  
				 <?php while (have_posts()) : the_post(); ?>
                 <div class="col-md-3">            
                    <div class="thumbnail">
                    	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb-category'); ?></a>
                        <div class="caption">
                        	<h2 align="center"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> <?php the_title(); ?></a> </h2>
                        </div>
                    </div>
                 </div>
                 <?php endwhile; ?> 
		
        
<div class="clearfix">
   <?php wp_pagination(); ?>
</div>

	</div>
</div>

<?php get_footer(); ?>
<?php else :
		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();
	endif;
?>