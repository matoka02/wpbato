<?php
$show_features = get_field('show_features');
if (!$show_features)
  return;

// Variables
$show_features = get_field('show_features');
$title = get_field('features_title');
$description = get_field('features_description');
$features_list = get_field('features_example');
?>


<section class='features'>
  <div class='container features__wrapper'>
    <h2 class='title'><?php echo esc_html( $title ); ?></h2>
    <p class='title__label'><?php echo esc_html( $description ); ?></p>
    <ul class='features__list'>
      <?php if( $features_list ): ?>
        <?php 
          // Limit the number of elements to 3
          $features_list = array_slice( $features_list, 0, 3 );
          // var_dump( $features_list );
        ?>
        <?php foreach( $features_list as $index => $feature ): ?>
          <li>
            <?php 
              // We get data for each element
              $feature_image = $feature['features_example_image'];
              $feature_image_url = isset($feature_image['url']) ? $feature_image['url'] : '';
              $feature_title = $feature['features_example_title'];
              $feature_description = $feature['features_example_description'];
            ?>
            <?php if( !empty( $feature_image_url ) ): ?>
              <img src='<?php echo esc_url( $feature_image_url ); ?>' alt='symbol' class='features__img'>
            <?php endif; ?>
            <div class='features__descr'>
              <p><?php echo esc_html( $feature_title ); ?></p>
              <p><?php echo esc_html( $feature_description ); ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
</section>
