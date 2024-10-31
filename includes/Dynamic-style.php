<?php function rhxwoo_dynamic_css()
{ ?>
<style type="text/css">
.portfolio-item-hover {
    background: <?php $rhxgrid_hover_color = get_option('rhxgrid_hover_color');
    if(!empty($rhxgrid_hover_color)) {
    echo esc_html($rhxgrid_hover_color);
    }
    else {
    echo esc_html__("#ff000087");
    }
    ?>;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    color: #fff;
    position: absolute;
    z-index: 1;
    align-items: center;
    display: flex;
    justify-content: center;
    transition: .3s;
    opacity: 0;
    visibility: hidden;
}

button.mixitup-control-active {
color:<?php $rhxgrid_button_activecolor = get_option('rhxgrid_button_activecolor');
if(!empty($rhxgrid_button_activecolor)) {
echo esc_html($rhxgrid_button_activecolor);
}
else {
echo esc_html__("#ff0000");
}
?>;
}

.portfolio-menu button:hover {
color:<?php $rhxgrid_button_hovercolor = get_option('rhxgrid_button_hovercolor');
if(!empty($rhxgrid_button_hovercolor)) {
echo esc_html($rhxgrid_button_hovercolor);
}
else {
echo esc_html__("#ff0000");
}?>;
}

.post-title {
  color:<?php $rhxgrid_post_titlecolor = get_option('rhxgrid_post_titlecolor');
  if(!empty($rhxgrid_post_titlecolor)) {echo esc_html($rhxgrid_post_titlecolor);} else {echo esc_html__("#FFF");}?>;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.post-content {
  position: absolute;
  top: 25%;
  left: 5px;
  color:<?php $post_description_color = get_option('post_description_color');
    if(!empty($post_description_color)) {echo esc_html($post_description_color);} else {echo esc_html__("#a4afb7");}?>;
}

</style>
<?php
}
add_action('wp_footer','rhxwoo_dynamic_css', 100);
?>
