<?php
/*
 * Template Name: Homepage
 */
get_header();

$announcement_text      = get_field('announcement_text');
$announcement_link_text = get_field('announcement_link_text');
$announcement_link_url  = get_field('announcement_link_url');
$hero_image             = get_field('hero_image');
$hero_heading           = get_field('hero_heading');
$hero_subheading        = get_field('hero_subheading');
$hero_button_text       = get_field('hero_button_text');
$hero_button_link       = get_field('hero_button_link');
$new_arrivals_category  = get_field('new_arrivals_category');
$new_arrivals_count     = get_field('new_arrivals_count') ?: 2;

$brand_names = array_filter(array(
    get_field('brand_1_name'),
    get_field('brand_2_name'),
    get_field('brand_3_name'),
    get_field('brand_4_name'),
    get_field('brand_5_name'),
));
?>

<?php if ($announcement_text) : ?>
<div class="announcement-bar">
    <?php echo esc_html($announcement_text); ?>
    <?php if ($announcement_link_text && $announcement_link_url) : ?>
        <a href="<?php echo esc_url($announcement_link_url); ?>">
            <?php echo esc_html($announcement_link_text); ?>
        </a>
    <?php endif; ?>
</div>
<?php endif; ?>

<section class="hero-banner">
    <div class="hero-content">
        <?php if ($hero_heading) : ?>
            <h1><?php echo nl2br(esc_html($hero_heading)); ?></h1>
        <?php endif; ?>
        <?php if ($hero_subheading) : ?>
            <p><?php echo esc_html($hero_subheading); ?></p>
        <?php endif; ?>
        <?php if ($hero_button_text) : ?>
            <a href="<?php echo esc_url($hero_button_link ?: '#'); ?>" class="hero-btn">
                <?php echo esc_html($hero_button_text); ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="stats-bar">
        <div class="stat-item">
            <span class="number">200+</span>
            <span class="label">International Brands</span>
        </div>
        <div class="stat-item">
            <span class="number">2,000+</span>
            <span class="label">High-Quality Products</span>
        </div>
        <div class="stat-item">
            <span class="number">30,000+</span>
            <span class="label">Happy Customers</span>
        </div>
    </div>

    <?php if ($hero_image) : ?>
    <div class="hero-image-wrap">
        <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Banner">
    </div>
    <?php endif; ?>
</section>

<?php if ($brand_names) : ?>
<div class="brand-logos">
    <?php foreach ($brand_names as $brand) : ?>
        <span class="brand-text"><?php echo esc_html($brand); ?></span>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<section class="new-arrivals">
    <h2>New Arrivals</h2>
    <div class="products-grid">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $new_arrivals_count,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        if ($new_arrivals_category) {
            $args['tax_query'] = array(array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $new_arrivals_category,
            ));
        }
        $products = new WP_Query($args);
        if ($products->have_posts()) :
            while ($products->have_posts()) : $products->the_post();
                global $product;
        ?>
        <div class="product-card">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php endif; ?>
                <div class="product-name"><?php the_title(); ?></div>
                <div class="product-rating">★★★★★ <span>4.5/5</span></div>
                <div class="product-price">
                    <?php
                    if ($product->is_on_sale()) {
                        echo '<span>$' . $product->get_sale_price() . '</span>';
                        echo '<span class="price-old">$' . $product->get_regular_price() . '</span>';
                        $discount = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
                        echo '<span class="price-badge">-' . $discount . '%</span>';
                    } else {
                        echo '<span>$' . $product->get_price() . '</span>';
                    }
                    ?>
                </div>
            </a>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="view-all">View All</a>
</section>

<?php get_footer(); ?>