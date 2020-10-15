<?php
/*
Template Name: Tidings Page
Template Post Type: post, page
*/
?>
<?php get_header(); ?>
    <div class="contain__head">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site__breadcrumb">
						<?php if ( function_exists( 'inp_breadcrumbs' ) ) {
							inp_breadcrumbs( '/' );
						} ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="page__head">
                        <h1><?php echo esc_html( get_the_title() ); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contain-tidings">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tidings">
						<?php
						global $post;
						$args    = array( 'numberposts' => 4, 'category' => 1, 'orderby' => 'date' );
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) {
							setup_postdata( $post );
							?>
                            <a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-color: #2644a6; ">
                            <span class="tidings__links">
                                <span class="tidings__links_date">
                                    <?php echo get_the_date( 'j F Y' ); ?>
                                </span>
                                <span class="tidings__links_head">
                                    <?php the_title(); ?>
                                </span>
                            </span>
                            </a>
							<?php
						}
						wp_reset_postdata();
						?>
                    </div>
                    <div class="contain-pagination">

						<?php
						// Define page_id
						$page_ID = get_the_ID();

						// Define paginated posts
						$page = get_query_var( 'page' );

						// Define custom query parameters
						$args = array(
							'post_type'      => array( 'post', 'book', 'movie' ), // post types
							'posts_per_page' => 5,
							'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
						);

						// If is_front_page "paged" parameters as $page number
						if ( is_front_page() ) {
							$args['paged'] = $page;
						}

						// Instantiate custom query
						$custom_query = new WP_Query( $args );

						// Custom loop
						if ( $custom_query->have_posts() ) :
							while ( $custom_query->have_posts() ) :
								$custom_query->the_post();

								/**
								 * Displaying content
								 *
								 * the_title(), the_permalink(), the_content() etc
								 * Or see Twentysixteen theme page.php
								 * get_template_part( 'template-parts/content', 'page' );
								 *
								 */
							endwhile;

							/**
							 * Pagination parameters of the_posts_pagination() since: 4.1.0
							 *
							 * @see the_posts_pagination
							 * https://codex.wordpress.org/Function_Reference/the_posts_pagination
							 *
							 */
							$pagination_args = array(
								'prev_text'          => __( '', 'theme-domain' ),
								'next_text'          => __( '', 'theme-domain' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'theme-domain' ) . ' </span>'
							);

							/**
							 * Fix pagination link base
							 *
							 * If in paginated posts w/o multiple loop
							 *
							 */

							if ( ! is_front_page() && 0 < intval( $page ) ) {
								$pagination_args['base'] = user_trailingslashit(
									untrailingslashit( get_page_link( $page_ID ) ) . '/page/%#%'
								);
							}
							/**
							 * Fix Pagination with $GLOBALS['wp_query'] = {custom_query}
							 *
							 * @see get_the_posts_pagination use $GLOBALS['wp_query']
							 * https://developer.wordpress.org/reference/functions/get_the_posts_pagination/#source-code
							 *
							 */
							$GLOBALS['wp_query'] = $custom_query;
							the_posts_pagination( $pagination_args );
						else :
							/**
							 * Empty Post
							 *
							 * Run your stuff here if posts empty
							 * Or see Twentysixteen theme page.php
							 * get_template_part( 'template-parts/content', 'none' );
							 */
						endif;
						wp_reset_query(); // Restore the $wp_query and global post data to the original main query.
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>