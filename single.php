<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

    <title>Prueba Técnica</title>
  </head>
  <body>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #000; opacity: 0.6;">

        <p class="navbar-brand text-light font-weight-bold text-uppercase">Prueba Técnica</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <?php wp_nav_menu(array(
        'theme_location' => 'superior',
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id' => 'navbarSupportedContent',
        'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul>',
        'menu_class' => 'nav-item'
        )); ?>

    </nav>

    <!-- navbar -->

     <!-- contenido -->

     <?php 

        if ( have_posts() ) : while ( have_posts() ) : the_post();

            $resumen = get_post_meta($post -> ID, 'resumen', true);
            $contenido = get_post_meta($post -> ID, 'contenido_full', true);
            $imagen = get_field('imagen');
        ?>

        <div class="container my-5">
            <h1 class="my-3"><?php the_title(); ?></h1>
            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid my-3" style="max-height: 50vh; width: auto;">
            <div class="text-justify my-3">
                <?php echo"$contenido"; ?>
            </div>
        </div>

        <?php endwhile; else: ?>
        <h1>No se encontro el post!</h1>
        <?php endif;
        wp_reset_postdata();?>

     <!-- contenido -->

     <?php get_footer(); ?>