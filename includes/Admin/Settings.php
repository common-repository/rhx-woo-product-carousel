<?php

/**
 * Setting Handler class
 */

if (!class_exists('Rhxwoo_setting'))
{
    class Rhxwoo_setting
    {
        /**
         * Handles the settings page
         *
         * @return void
         */
        public function settings_page()
        {
        echo '<div class="rhxwoo_warp">';
        echo '<h1>RHX WOO Settings</h1>';

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

        $product_quantity = update_option('rhxwoo_product_quntity', $_POST['rhxwoo_product_quntity']);
        $product_order = update_option('rhxwoo__order', $_POST['rhxwoo__order']);
        $success = $product_quantity + $product_order;

          if($success == '2' || $success == '1'){?>
            <p id="demo" style="background-color:#2271b1;"><?php echo esc_html("New Data Saved"); ?> <span onclick="myFunction()" class="close-btn">&times;</span></p>

        <?php  }
        }
?>


<div id="rhxwoo_left">
  <form method="post" action="">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3><?php echo esc_attr(__('Insert product quantity & order')); ?></h3>
      <table class="form-table">
        <tr>
          <th><label for="rhxwoo_product_quntity"><?php echo esc_attr(__('Number of Products')); ?></label></th>
          <td><input type="text" name="rhxwoo_product_quntity" value="<?php $rhxwoo_product_quntity = get_option('rhxwoo_product_quntity'); if(!empty($rhxwoo_product_quntity)) {echo esc_html($rhxwoo_product_quntity);} else {echo esc_html__("6");}?>"></td>
        </tr>
        <tr>
        <tr>
          <th><label for="rhxwoo__order"><?php echo esc_attr(__('Product Display Order')); ?></label></th>
          <td><select name="rhxwoo__order" id="rhxgrid__order">
              <option value="DESC" <?php if( get_option('rhxwoo__order') == 'DESC'){ echo esc_html__('selected="selected"'); } ?>>Descending</option>
              <option value="ASC" <?php if( get_option('rhxwoo__order') == 'ASC'){ echo esc_html__('selected="selected"'); } ?>>Ascending</option>
            </select></td>
        </tr>
        </tr>
      </table>
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="nhtRight">
  <div class="nhtWidget">
    <h3>
      <?php _e('Donate and support the development.','nht') ?>
    </h3>
    <p>
      <?php _e('With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)','nht') ?>
    </p>
    <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
      <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form> -->
  </div>
  <div class="nhtWidget">
    <h3><?php echo esc_attr(__('About the Plugin')); ?></h3>
    <p>You can make my day by submitting a positive review on <a href="https://wordpress.org/support/view/plugin-reviews/rhx-post-grid/" target="_blank"><strong>WordPress.org!</strong> <img src="<?php bloginfo('url' ); echo"/wp-content/plugins/wp-news-headline-ticker/img/review.png"; ?>" alt="review" class="review"/></a></p>
    <div class="clrFix"></div>
  </div>
  <div class="nhtWidget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>I am a Web Developer, Expert WordPress Developer. I am available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch <a href="https://www.facebook.com/rihan.zihad/" target="_blank">me</a>.<br />
      <strong>Skype:</strong> live:.cid.91dd04c23d43ff47<br />
      <strong>Email:</strong> zihad0008@gmail.com<br />
      <strong>Web:</strong> <a href="https://www.facebook.com/rihan.zihad/" target="_blank">Rihan Habib</a><br />
      <!-- <strong>Hire Me on:</strong> <a href="https://www.upwork.com/freelancers/~01bf79370d989b2033" target="_blank">UpWork</a><br /> -->
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
<?php
    echo '</div>';


        }


    }
}
