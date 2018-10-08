<?php
	ob_start();
	$query = $this->posts_query();
	if ( ! $query->have_posts() ) {
		echo 'Posts Not Found!';
	}
	while ( $query->have_posts() ) {
		$query->the_post();
		/*==============================================================*/
		$date         = get_the_date('d / F / Y');
		$permalink    = get_the_permalink();
		$image_url    = $this->get_image_url();
		$thumb_id     = get_post_thumbnail_id();
		$image        = wp_get_attachment_image_url( $thumb_id, 'team-thumbnail' );
		$title        = $this->get_posts_title();
		$content      = $this->get_posts_content();
		$category     = $this->get_settings('post_cat');
		$comments     = wp_count_comments(get_the_ID())->total_comments;
		$author       = get_the_author();
		$author_email = get_the_author_meta('email');
		$author_img   = get_avatar_url($author_email, 69);
		$custom_field = get_post_meta(get_the_ID(), 'value', true);
		$columns      = $this->get_classes(array(
			'desk' => $this->get_settings('columns'),
			'tab'  => $this->get_settings('columns_tablet'),
			'mob'  => $this->get_settings('columns_mobile'),
		));
		/*==============================================================*/
		?>
		<div class="advanced_posts_item <?php echo $columns; ?>">

			<div class="box3 __modify1">
				<a class="popup" href="<?php echo $image_url; ?>">
					<img class="first" src="<?php echo $image_url; ?>" alt=""/>
					<span class="overlay-gallery"></span>
				</a>
				<h6 class="color_11">
					<a href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
				</h6>
				<p><?php echo $content; ?></p>
			</div>

		</div>
		<?php
	}
	wp_reset_postdata();
	return ob_get_clean();