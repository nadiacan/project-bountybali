<?php
/* Template Name: Front Page */
get_header();
?>
<!--<div id="slider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
        $i=0;
        while(has_sub_field('slider')):
        $image = get_sub_field('image');   
        $caption = get_sub_field('caption');         
    ?>
    <div class="item <?php if($i==0){ ?>active<?php } else{ ?> <?php } ?>">
      <img class="d-block w-100" src="<?php echo $image['url']; ?>">
	  <div class="container">
          <div class="carousel-caption">
              <?php echo $caption; ?>
          </div>
      </div>
    </div>
    <?php $i++; ?>
    <?php endwhile; ?>
  </div>
  <a class="left carousel-control" href="#slider" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#slider" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>-->
 
	<div class="container clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
			
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>