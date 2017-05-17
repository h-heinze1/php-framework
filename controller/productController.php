<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

  case 'home':
        $products = loadProducts($mysql);
        include( APP_VIEW .'/product/productSubNav.php' );
        include( APP_VIEW .'/product/homeView.php' );
        break;

  case 'new':
        include( APP_VIEW .'/product/productSubNav.php' );
        include( APP_VIEW .'/product/newView.php' );
        break;





    default:
        $products = loadProducts($mysql);
        include( APP_VIEW .'/product/productSubNav.php' );
        include( APP_VIEW .'/product/homeView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );


####  local functions #####

function loadProducts($dbConn) {

  $sql = "SELECT *
          FROM product
          ORDER BY name";

  $result = $dbConn->query($sql);
  $products = $result->fetch_all(MYSQLI_ASSOC);

  return $products;
}
