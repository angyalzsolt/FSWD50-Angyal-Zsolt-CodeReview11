


<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo $route->homeRoute ?>">CodeReview11</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php if($_SESSION['urole'] == 1){
              echo "<li class='nav-item'>
                      <a class='nav-link' href=' $route->adminRoute '>Admin panel</a>
                    </li>";
              } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $route->homeRoute ?> ">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $route->settingsRoute ?>">List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $route->addnewitemRoute ?>">Add new</a>
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Show
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item active" href="<?php echo $route->settingsRoute ?>">Show All</a>
                <a class="dropdown-item" href="<?php echo $route->onlyrestRoute ?>">Restaurants</a>
                <a class="dropdown-item" href="<?php echo $route->eventRoute ?>">Events</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div><h1>TEXT</h1></div>
