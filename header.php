<!doctype html>
<?php  $options=get_option('new_theme_option'); ?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی - index</title>
    <?php wp_head(); ?>
</head>

<body>
<!-- Start Header -->
<header class="bg-navbar">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark px-md-0">
            <a class="navbar-brand d-md-none" href="#">
                <?php var_dump($options['header_logo']); ?>
                <h4 class="mb-0"><img  width="50" height="50" src="<?php if (isset($options['header_logo'],$options['header_logo']['url'])) echo $options['header_logo']['url'] ?>" alt=""> </h4>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#amir">
                <span class="navbar-toggler-icon"></span>
            </button>


                <?php wp_nav_menu(array(
                    'theme_location' => 'header',
                    'container_class'=>'collapse navbar-collapse',
                    'container_id'=>'amir',
                    'menu_class'=>'navbar-nav ml-auto menu pr-0 text-center',
                    'fallback_cb'     => 'new_theme_WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new new_theme_WP_Bootstrap_Navwalker(),
                ));

                ?>
            <a class="navbar-brand d-none d-md-block" href="#">
                <h4 class="mb-0"><img width="50" height="50" src="<?php if (isset($options['header_logo'],$options['header_logo']['url'])) echo $options['header_logo']['url'] ?>" alt=""> </h4>
            </a>
        </nav>
    </div>
</header>
