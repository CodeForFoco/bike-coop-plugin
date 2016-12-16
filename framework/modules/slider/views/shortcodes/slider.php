<?php 
    $args = array(  
        'post_type'     =>  'slide',
        'post_status'   =>  'publish'
    );
?>
<div class='fcbc-slider-wrapper'>
    <div class='fcbc-slider'>
        <?php $slides = get_posts($args); ?>
        <?php foreach($slides as $slide): ?>
            <div class='fcbc-slider-wrapper' style="background-image:url(<?php echo get_the_post_thumbnail_url($slide->ID); ?>)">
                <?php echo $slide->post_title; ?>
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
            nextArrow:  "<a class='fcbc-slider-nav right' href='javascript:void(0);'>"+
                          "<i class='fa fa-chevron-circle-right'></i>"+
                        "</a>",
            prevArrow:  "<a class='fcbc-slider-nav left' href='javascript:void(0);'>"+
                          "<i class='fa fa-chevron-circle-left'></i>"+
                        "</a>",
        });
    });
</script>

<style>
    .fcbc-slider{
        position: relative;
    }
    
    .fcbc-slider-wrapper{
        positio: relative; min-height: 680px; background-repeat: no-repeat; background-size: cover;
    }
    
    .fcbc-slider-nav{
        position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;
    }
    
    .fcbc-slider-nav.left{
        left: 15px; 
    }
    
    .fcbc-slider-nav.right{
        right: 15px;
    }
</style>