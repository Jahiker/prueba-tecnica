    <?php define( 'WP_USE_THEMES', true ); get_header(); ?>  

     <!-- fold2 -->
      <div class="container my-5">
        <div class="row">

        <!-- API news -->
        <?php 

          function fecha_actual(){
              return date_default_timezone_set('America/Bogota');
          }

          function API_news(){
              fecha_actual();
              $year = date('Y');
              $month = date('m');
              $day = date('d');

              $url = "https://newsapi.org/v2/everything?q=";
              $tema = "en%20Colombia";
              $fecha = "&from=$year-$month-$day";
              $orden = "&sortBy=popularity";
              $key = "&apiKey=70abb1a6c8f645e88f3c7c8f2485e3ce";

              $resp = $url.$tema.$fecha.$orden.$key;

              return $resp;
          }

          $datos = API_news();
          $json = file_get_contents($datos);
          $arraynews = json_decode($json, true);

        ?>
        <!-- API news -->

          <!-- articulo -->

          <div class='col-12 col-lg-4 col-md-12 col-sm-12' style="position: relative; max-height: 70vh; width: 100vw; overflow: auto;">

            <?php 

              for ($i=0; $i <= 15; $i++) { 
                  $fuente = $arraynews['articles'][$i]['source']['name'];
                  $titulo = $arraynews['articles'][$i]['title'];
                  $descripcion = $arraynews['articles'][$i]['description'];
                  $urlnews = $arraynews['articles'][$i]['url'];
                  $urlimage = $arraynews['articles'][$i]['urlToImage'];
                  $fechapublic = $arraynews['articles'][$i]['publishedAt'];
                  $contenido = $arraynews['articles'][$i]['content'];

                  if ($titulo != '') {
                    
                    echo"
          
                      <div class='card' >
                        <div class='card-body'>
                          <a href='$urlnews'><h5 class='card-title'>$titulo</h5></a>
                          <a href='$urlnews'><h6 class='card-subtitle mb-2 text-muted'>$fuente</h6></a>
                          <a href='$urlnews' class='card-link'>Leer mas...</a>
                        </div>
                      </div>
    
                    ";

                  }

              }

            ?>

          </div>
          
          <!-- articulo -->
 
          <!-- slider -->

          <div class="col-12 col-lg-8 col-md-12 col-sm-12">

          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
              
              <?php 

                // Definiendo el tipo de post
                $loop = new WP_Query(array(
                    'post_type' => 'post'
                ));

                $i = 0;
                

                if ($loop->have_posts()) { 
                  
                  while ($loop->have_posts() && $i < 1 ) : $loop->the_post(); 
                  
                  $imagen = get_field('imagen');
                  $autor = get_post_meta($post -> ID, 'autor', true);
                  $i++;
                  
                  ?>
                  
                    <div class="carousel-item active">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($imagen['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($imagen['alt']); ?>" style="max-height: 70vh; width: auto;"></a>
                        <div class="carousel-caption d-none d-md-block">
                          <a class="text-decoration-none text-light" href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                          <p><?php echo"$autor"; ?></p>
                        </div>
                    </div>
                    
                    <?php 
                    
                  endwhile;

                  while ($loop->have_posts() && $i >= 1 ) : $loop->the_post();
                  
                  $imagen = get_field('imagen');
                  $autor = get_post_meta($post -> ID, 'autor', true);
                  $i++;
                  
                  ?>
                  
                  <div class="carousel-item">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($imagen['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($imagen['alt']); ?>" style="max-height: 70vh; width: auto;"></a>
                    <div class="carousel-caption d-none d-md-block">
                      <a class="text-decoration-none text-light" href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                      <p><?php echo"$autor"; ?></p>
                    </div>
                  </div>
                  
                  <?php 
                  
                endwhile;
                }else{ ?>
                  <h1>No hay imagenes publicadas</h1>
                  <?php wp_reset_postdata();
                }

              ?>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>

          </div>
          
          <!-- slider -->
        </div>
      </div>
     <!-- fold2 -->

    <?php get_footer(); ?>