<?php

    include 'inc/header.php';

?>
        
        <!-- Add Carousel here -->
        <style type="text/css">
        #carouselExampleIndicators{
            margin:0 auto;        
            text-align:center;
            
        }
        </style>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-50" src="img/alex.jpg" alt="Alex">
            </div>
            <div class="carousel-item">
              <img class="d-block w-50" src="img/carl.jpg" alt="Carl">
            </div>
            <div class="carousel-item">
              <img class="d-block w-50" src="img/charlie.jpg" alt="Charlie">
            </div>
            <div class="carousel-item">
              <img class="d-block w-50" src="img/sally.jpg" alt="Sally">
            </div>
          </div>
          <div class="carousel-item">
              <img class="d-block w-50" src="img/samantha.jpg" alt="Samantha">
            </div>
          </div>
          <div class="carousel-item">
              <img class="d-block w-50" src="img/ted.jpg" alt="Ted">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <br>
        
        <a href="pets.php"  class="btn btn-outline-primary" role="button" aria-pressed="true"> Adopt Now! </a>
        
        
        <br>
        

<?php

    include 'inc/footer.php';

?>