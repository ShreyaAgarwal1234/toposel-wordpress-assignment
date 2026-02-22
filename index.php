<?php get_header(); ?>

<?php
$announcement_text = get_field('announcement_text', 'option');
$announcement_link_text = get_field('announcement_link_text', 'option');
$announcement_link_url = get_field('announcement_link_url', 'option');
$hero_image = get_field('hero_image', 'option');
$hero_heading = get_field('hero_heading', 'option');
$hero_subheading = get_field('hero_subheading', 'option');
$hero_button_text = get_field('hero_button_text', 'option');
$hero_button_link = get_field('hero_button_link', 'option');
$brands = get_field('brands', 'option');
$new_arrivals_category = get_field('new_arrivals_category', 'option');
$new_arrivals_count = get_field('new_arrivals_count', 'option') ?: 2;
?>

<!-- ANNOUNCEMENT BAR -->
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

<!-- HERO BANNER -->
<section class="hero-banner">
    <?php if ($hero_image) : ?>
        <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Banner">
    <?php endif; ?>
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
</section>

<!-- STATS BAR -->
<div class="stats-bar">
    <div class="stat-item">
        <div class="number">200+</div>
        <div class="label">International Brands</div>
    </div>
    <div class="stat-item">
        <div class="number">2,000+</div>
        <div class="label">High-Quality Products</div>
    </div>
    <div class="stat-item">
        <div class="number">30,000+</div>
        <div class="label">Happy Customers</div>
    </div>
</div>

<!-- BRAND LOGOS -->
<?php if ($brands) : ?>
<div class="brand-logos">
    <?php foreach ($brands as $brand) : ?>
        <?php if (!empty($brand['brand_logo'])) : ?>
            <img src="<?php echo esc_url($brand['brand_logo']); ?>"
                 alt="<?php echo esc_attr($brand['brand_name']); ?>">
        <?php elseif (!empty($brand['brand_name'])) : ?>
            <span class="brand-text"><?php echo esc_html($brand['brand_name']); ?></span>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- NEW ARRIVALS -->
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