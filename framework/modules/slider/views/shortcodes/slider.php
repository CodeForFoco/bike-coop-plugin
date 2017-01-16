<?php 
    $args = array(  
        'post_type'     =>  'slide',
        'post_status'   =>  'publish',
        'order'         =>  'ASC',
        'orderby' 			=>  'meta_value',
        'meta_key'      =>  'slider-slide-position'
    );
?>
<div class='fcbc-slider-wrapper'>
  <div class='fcbc-slider'>
    <?php
      $slides = get_posts($args);
      $shortcodes = BC_Slide_Post_Type::get_slides_for_slider();
      foreach($slides as $slide): 
        if ($shortcodes !== '' && strrpos($shortcodes, $slide->post_name) === FALSE){
          continue;
        } 
    ?>        
    <div class='fcbc-slider-wrapper' style="background-image:url(<?php echo get_the_post_thumbnail_url($slide->ID); ?>)">
      <div class="tagline">
        <div class="row">
          <h1><?php echo $slide->post_title; ?></h1>
          <h4 class="subheader"><?php echo get_the_excerpt($slide->ID); ?></h4>
          <a role="button" class="download large button sites-button same-page-link" 
            href="<?php echo get_post_meta($slide->ID, 'slider-button-url', true); ?>">
            <?php echo get_post_meta($slide->ID, 'slider-button-text', true); ?>
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.fcbc-slider').slick({
            infinite: true,
            speed: 300,
            autoplay: true,
            autoplaySpeed: 3200,
            dots: true,
            nextArrow:  "<a class='fcbc-slider-nav right' href='javascript:void(0);'>"+
                          "<i class='fa fa-chevron-circle-right'></i>"+
                        "</a>",
            prevArrow:  "<a class='fcbc-slider-nav left' href='javascript:void(0);'>"+
                          "<i class='fa fa-chevron-circle-left'></i>"+
                        "</a>",
        });
    });
</script>