<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <span class="hamburger"><i class="fas fa-bars"></i></span>
    <a href="<?php echo home_url(); ?>" class="logo">SHOP.CO</a>
    <div class="header-icons">
        <span><i class="fas fa-search"></i></span>
        <span><i class="fas fa-shopping-cart"></i></span>
        <span><i class="fas fa-user-circle"></i></span>
    </div>
</header>