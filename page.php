<?php define( 'WP_USE_THEMES', true ); get_header(); ?>

    <!-- fold Noticias -->
        <div class="container section my-5">
            <div class="row">
            <!-- Noticia -->

            <?php 
                // Definiendo el tipo de post
                $loop = new WP_Query(array(
                    'post_type' => 'noticias_post_type'
                ));

                // Arrancando el loop
                if ($loop->have_posts() ) : while ($loop->have_posts() ) : $loop->the_post();
                
                // Definiendo los custom fields del CPT
                $resumen = get_post_meta($post -> ID, 'resumen', true);
                $contenido = get_post_meta($post -> ID, 'contenido_full', true);
                $imagen = get_field('imagen');
                ?>
                    
                    <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12 my-auto mx-auto" style="height: 70vh;">

                        <img class="card-img-top mx-auto" src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" style="height: 25vh; width: auto; ">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo "$resumen"; ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark btn-block">Leer mas...</a>
                        </div>
                    </div>

            <?php endwhile; else: ?>
                <h1>No hay nuevas Noticias!</h1>
            <?php endif;
                wp_reset_postdata();   
            ?>
            
            <!-- Noticia -->
            </div>
        </div>
    <!-- fold Noticias -->

    <?php get_footer(); ?>