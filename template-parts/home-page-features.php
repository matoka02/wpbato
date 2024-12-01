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


<section class="features">
  <div class="container features__wrapper">
    <!-- Title -->
    <?php if ($title): ?>
      <h2 class="title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <!-- Description -->
    <?php if ($description): ?>
      <p class="title__label"><?php echo esc_html($description); ?></p>
    <?php endif; ?>

    <!-- Features List -->
    <?php if ($features_list): ?>
      <ul class="features__list">
        <?php foreach ($features_list as $feature): ?>
          <li>
            <!-- Feature Image -->
            <?php if (!empty($feature['icon'])): ?>
              <img src="<?php echo esc_url($feature['icon']); ?>" alt="symbol" class="features__img">
            <?php endif; ?>

            <!-- Feature Description -->
            <div class="features__descr">
              <?php if (!empty($feature['title'])): ?>
                <p><?php echo esc_html($feature['title']); ?></p>
              <?php endif; ?>
              <?php if (!empty($feature['description'])): ?>
                <p><?php echo esc_html($feature['description']); ?></p>
              <?php endif; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>