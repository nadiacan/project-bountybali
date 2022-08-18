<?php
get_header(); ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $slider_pages = get_field('slider_pages'); ?>
        <?php $slider_pages02 = get_field('slider_pages02'); ?>				
        
        <?php if($slider_pages <> "") { ?> 
        <div class="item active"> 
            <img src="<?php the_field('slider_pages'); ?>"/>
        </div>
        <?php } ?>
        <?php if($slider_pages02 <> "") { ?> 
        <div class="item">  
            <img src="<?php the_field('slider_pages02'); ?>"/>
        </div>
        <?php } ?>
    </div>

		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
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
	<div class="container clearfix">
    <h1><?php the_title(); ?></h1>
    <div class="divider"></div>
    <?php if(is_category){ ?>
        <div class="col-lg-8 col-md-8">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            
            
            <?php the_content(); ?>
        	<?php endwhile; endif; ?>  
        </div>
        <div class="col-lg-3 col-md-3">
        	<aside>
            	<?php //get_sidebar_category(); ?>
                <?php
				/*	 $echo = '<ul>' . "\n";
$childcats = get_categories('child_of=' . $cat . '&hide_empty=1&depth=1');
foreach ($childcats as $childcat) {
    if (1 == $childcat->category_parent) {
        $echo .= "\t" . '<li><a href="' . get_category_link($childcat->cat_ID).'" title="' . $childcat->category_description . '">';
        $echo .= $childcat->cat_name . '</a>';
        $echo .= '</li>' . "\n";
    }
}
$echo .= '</ul>' . "\n";
echo $echo;*/
				?>
    <?php $categories = get_categories("child_of=206"); foreach ($categories as $cat) { //local : 1 demo:206?> 
               
	<div class="genre_subcat">
    <?php query_posts("cat=$cat->cat_ID&showposts=-1&order=ASC&orderby=name"); ?>
    	<h3 class="widget-title">Other Hotels in <?php single_cat_title(); ?></h3>
    	<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        
	</div>
	<?php }?> 
            </aside>
        </div>
   <?php } else { ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <div class="divider"></div>
           <?php the_content(); ?>
        <?php endwhile; endif; ?>  
   <?php } ?>      
	</div>
</div>
		
<?php get_footer(); ?>