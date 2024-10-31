<?php

/**
 * Shortcode handler class
 */
if (!class_exists('Rhxwoo_shortcode')){
class Rhxwoo_shortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'rhxwoo-carousel', [ $this, 'rhxwoo_render_shortcode' ] );

    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function rhxwoo_render_shortcode( $atts, $content = '' ) {

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'owl-carousel-js' );
        wp_enqueue_script( 'rhxwoo-script' );
        wp_enqueue_style( 'rhxwoo-frontend-style' );
        wp_enqueue_style( 'owl-theme-default' );
        wp_enqueue_style( 'owl-carousel-min' );
        ?>
        <?php ob_start(); ?>


                <?php

                //Get post data.
                $total_products = get_option('rhxwoo_product_quntity');
                $product_order = get_option('rhxroducts__order');
                if(!$total_products){$total_products=6;}
                // list post display here
                $args = array(
                   'post_type'      => 'product',
                   'post_status'    => 'publish',
                   'posts_per_page' => $total_products,
                   'order'          => $product_order
                );
                $my_result = new WP_Query($args);?>
               <!-- Set up your HTML -->
                <div class="owl-carousel"><?php

                if($my_result-> have_posts()){
                   while($my_result->have_posts()) : $my_result -> the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                      <main role="main">
                      <div class="product">
                        <a href="<?php the_permalink(); ?>">
                        <figure class="thumb-figure">
                        <img src="<?php the_post_thumbnail_url('woo-thumb', array('class'=>'woo-imgclass')); ?>" alt="<?php echo 'Product Thumb Image'; ?>">
                            </figure>
                            </a>

                          <div class="product-description">
                            <div class="info">
                              <a href="<?php the_permalink(); ?>"><h1><?php the_title();?></h1></a>
                            </div>
                          <div class="cartbtn"><?php echo do_shortcode('[add_to_cart id="'.get_the_ID().'"]') ?></div>
                          </div>
                          </div>
                        </main>
                       
                <?php endwhile;};?>
                <?php wp_reset_query();?>
              </div>
        <!--====== Grid End ======-->
        <?php $woo_carousel = ob_get_clean();
        return $woo_carousel;
    }

}

}
