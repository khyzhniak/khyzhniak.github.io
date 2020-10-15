<?php /* Template Name: accessories */

get_header();
?>


	<div id="middle">

		<div class="banner-catalog banner-catalog_wrapp-bg"
				style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner4.jpg);">
			<div class="container">
				<div class="banner-catalog-content">
					<div class="banner-catalog-content__right show-animation bounce-in-left">
						<div class="title-site text_uppercase title-site_big title-site_bodoni title-site_h1">Аксессуары</div>
					</div>
					<div class="banner-catalog-content__left show-animation bounce-in-right">
						<div class="title-site title-site_lg text_shadow text_gradient title-site_h1">Аксессуары</div>
						<ul class="bread-crumbs">
							<li><a href="#">Главная</a></li>
							<li>Аксессуары</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="inner-grid inner-grid_one-col inner-grid_push">
				<div class="inner-grid__content">

					<div class="filter-cap filter-cap_grid filter-cap_push-sm">
						<div class="filter-cap__name-bl">Аксессуары к реклайнерам</div>
						<div class="filter-cap__select">
							<span class="filter-cap__name">Сортировать по:</span>
							<select>
								<option value="v1">Популярности</option>
								<option value="v2">Цене от мин.</option>
								<option value="v3">Цене от макс.</option>
								<option value="v4">Lorem 1</option>
								<option value="v5">Lorem 2</option>
							</select>
						</div>
					</div>
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>




							<?php
							if (get_query_var('paged')) {
								$paged = get_query_var('paged');
							} elseif (get_query_var('page')) { // 'page' is used instead of 'paged' on Static Front Page
								$paged = get_query_var('page');
							} else {
								$paged = 1;
							}
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$loop = new WP_Query(
								 array(
//				'posts_per_page' => get_option('posts_per_page'),
										'product_cat' => 'aksessuary',
										'post_type' => 'product',
										'posts_per_page' => 4,
										'paged' => $paged,
								 )
							);
							?>

							<?php if ($loop->have_posts()):
								?>
							<ul class="prod-cards">

							<?php while ($loop->have_posts()) : $loop->the_post();

								$currency_symbol = html_entity_decode(get_woocommerce_currency_symbol());
								//получаем цены
								$price = get_post_meta(get_the_ID(), '_regular_price', true);
								$sale = get_post_meta(get_the_ID(), '_price', true);
								?>
								<li class="prod-cards__item show-animation prod_st">
									<div class="prod__icon">
										<a href="<?php echo do_shortcode('[add_to_cart_url id="' . get_the_ID() . '"]'); ?>"
												class="icon icon-basket-prod"></a></div>
									<a href="<? the_permalink(); ?>" class="prod__img">
										<?php the_post_thumbnail() ?>
									</a>
									<a href="<? the_permalink(); ?>" class="prod__tt"><? the_title(); ?></a>
									<div class="prod__text"> Ширина - 90 см; глубина - 95 см; высота - 98 см</div>

									<div class="prod__price">
										<?php if ($sale < $price) { ?>
											<span class="regular-price">
											<span><?php echo $sale; ?></span>
											<span><?php echo $currency_symbol; ?></span>
										</span>
											<del class="discount-price">
												<span><?php echo $price; ?></span>
												<span><?php echo $currency_symbol; ?></span>
											</del>
										<?php } elseif ($price == '') { ?>
											<span class="regular-price"><?php echo $price; ?></span>
										<?php } else { ?>
											<span class="regular-price">
											<span><?php echo $price; ?></span>
											<span><?php echo $currency_symbol; ?></span>
										</span>
										<?php } ?>
									</div>
								</li>
							<?php endwhile; ?>
							</ul>

								<?php if ($loop->max_num_pages > 1) : // custom pagination  ?>
									<?php
									$orig_query = $wp_query; // fix for pagination to work
									$wp_query = $loop;
									$big = 999999999;
									echo paginate_links(array(
										 'base' => str_replace($big, '%#%', get_pagenum_link($big)),
										 'format' => '?paged=%#%',
										 'current' => max(1, get_query_var('paged')),
										 'total' => $wp_query->max_num_pages
									));
									$wp_query = $orig_query; // fix for pagination to work
									?>
								<?php endif; ?>

								<?php wp_reset_postdata(); else: echo '<p>' . __('Sorry, no posts matched your criteria.') . '</p>'; endif; ?>




					<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>


	</div>



<?php
get_footer();
