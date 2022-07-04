



<?php
require"db.php";

$db=new DB();
$connection=$db->get_connection();

$queryString=$db->getData("product_orders");
$first_row=$queryString->fetchAll(PDO::FETCH_ASSOC);

require "layout/navbar.php";

?>



<?php

require  "layout/sidebar.php";
?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                      <div class="title col-12 text-left  text-bold">
                        <h2>Orders</h2>
                      </div>
                      <div class="content col-12">


                        <table class="table table-bordered table-dark">
                          <thead>
                            <tr>
                              <th scope="col">Order Date</th>
                              <th scope="col">Name</th>
                              <th scope="col">Room</th>
                              <th scope="col">EXT.</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

echo"<pre>";
// echo count($first_row);
// var_dump($first_row);
// for($i =0 ; $i < count($first_row) ; $i++){
//       echo $first_row[$i]['id_orders']."<br>";
//   for($x =0 ; $x < count($first_row) ; $x++){
//     echo $first_row[$x]['id_orders']."<br>";
//   if($first_row[$i]['id_orders']==$first_row[$x]['id_orders']){
//    echo $first_row[$x]['id_orders'];
//   //  die;
//      echo $first_row[$i]['image'] ."<br>";
//   }
//   }
 foreach($first_row as $val){
  echo"<tr>";
  print_r($val);
  echo"</tr>";
 }
 

// }


echo"</pre>";


                          ?>
                          </tbody>
                        </table>
                      </div>



                    </div>
            </div>
        </section>
            <!-- ./wrapper -->
<?php

require"layout/footer.php";
?>