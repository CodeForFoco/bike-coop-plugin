<?php 
  $args = [
      'post_type'  => 'event',
      'post_status'=> 'publish',
      'order'       =>  'asc',
      'orderby'     =>  'meta_value_num',
      'meta_key'    =>  'awesome_events_details_timestamp',
  	/*'meta_key'   => 'awesome_events_details_url',
  	'orderby'    => 'meta_value_num',
  	'order'      => 'ASC', */
  	'meta_query' => [
  		[
  			'key'     => 'awesome_events_details_timestamp',
  			'value'   => time(),
  			'compare' => '>',
  		], 
  	],
  ];
  
  $events_query = new WP_Query($args);
?>

<?php if($events_query->have_posts()): ?>
<?php wp_enqueue_style('events-module'); ?>
<section class='awesome-events-wrapper'>
    <h2 class='title'> Upcoming Events</h2>
    <div class='awesome-events'>
      <?php while($events_query->have_posts()): $events_query->the_post(); ?>
      <div class="event-wrapper">
        <div class='event'>
          <?php $url = get_post_meta(get_the_ID(), 'awesome_events_details_url', true); ?>

          <a class="card card-inverse" href="<?php echo $url ? $url : get_the_permalink(); ?>" <?php if( $url && !empty($url) ): ?>target="_blank"<?php endif; ?>>
            <?php if( has_post_thumbnail() ): ?>
            <?php $src = get_the_post_thumbnail_url();
              $src = aq_resize( $src, 400, 440, true, true, true ); ?>

            <img class="card-img" src="<?php echo $src; ?>" alt="Upcoming Event" />
           <?php endif; ?>
            <div class="card-img-overlay">
                <div class="inner">
                  <div class="card-text">
                    <h4 class="card-title"><?php the_title();?></h4>
                  </div>
                </div>
            </div>
          </a>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
</section>

<?php endif;
