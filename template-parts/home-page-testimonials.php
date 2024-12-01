<?php
$show_features = get_field('show_testimonials');
if (!$show_features)
  return;

// Variables
$title = get_field('testimonials_title');
$description = get_field('testimonials_descriptions');
$features_list = get_field('testimonials_example');
?>

<section>
  <div class="container testimonials__wrapper">
    <?php if ($title): ?>
      <h2 class="title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($description): ?>
      <p class="title__label"><?php echo esc_html($description); ?></p>
    <?php endif; ?>

    <?php if ($features_list && is_array($features_list)): ?>
      <div class="swiper">
        <ul class="swiper-wrapper reviews__container">
          <?php foreach ($features_list as $feature): ?>
            <li class="swiper-slide review__card">
              <div class="review__wrapper">
                <?php if (!empty($feature['testimonials_text'])): ?>
                  <p class="review__text"><?php echo esc_html($feature['testimonials_text']); ?></p>
                <?php endif; ?>

                <div class="review__descr">
                  <?php if (!empty($feature['testimonials_avatar'])): ?>
                    <img src="<?php echo esc_url($feature['testimonials_avatar']); ?>" alt="user-avatar">
                  <?php endif; ?>

                  <div class="review__user">
                    <?php if (!empty($feature['testimonials_name'])): ?>
                      <p><?php echo esc_html($feature['testimonials_name']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($feature['testimonials_position'])): ?>
                      <p><?php echo esc_html($feature['testimonials_position']); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="swiper-pagination"></div>
      </div>
    <?php endif; ?>
  </div>
</section>