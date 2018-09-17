<main class="main-area">
<?php
  // Create connection
  $conn = mysqli_connect("localhost", "admin", "mprnyc1", "drupal");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ?>



          <div class="row">

            <div class="col-4">



            <?php

            if(isset($_GET["episode_id"])) {

              $episode_id_var = ($_GET["episode_id"]);

              $sql = "SELECT * FROM `mpr_episode` episodetbl WHERE episodetbl.`episode_id`=$episode_id_var LIMIT 1;";
              $result = mysqli_query($conn, $sql);


              foreach ($result as $row): ?>
              <h2>
              <?php echo $row['episode_title']; ?>
               -
               <?php echo $row['episode_date']; ?>
              </h2>
                <div class="container-fluid livestream" style="width: 100%; height: 100%;">
                <div class="container-fluid embed-responsive embed-responsive-16by9">
                <iframe allowfullscreen="true" class="embed-responsive-item" src="https://livestream.com/accounts/25937168/events/7713617/videos/<?php echo $row['episode_url']; ?>/player?enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false"></iframe></div></div>
<?php
                 $show_id = $row['show_id'];
              endforeach;

                }

?>


<?php
            if (isset($_GET["show_id"])) {

            $show_id_var = ($_GET["show_id"]);

                $sql = "SELECT * FROM `mpr_show` showtbl, `mpr_episode` episodetbl WHERE showtbl.`show_status` = 'ACTIVE' and showtbl.`show_id`=episodetbl.`show_id` and showtbl.`show_id`=$show_id_var;";
                $result2 = mysqli_query($conn, $sql);
                $isfirst = 1;
                ?>



                 <?php foreach ($result2 as $row):
                   if($isfirst==1) {
                     echo "<P><h2>";
                     echo $row['show_name'];
                     echo "</h2><br>";
                     echo "<P>";
                    $isfirst = 0;?>


                    <?php
                   }
?>
                  <div class="tab-content" id="nav-tabContent">


                  <div class="tab-pane fade collapse" id="<?php echo $row['show_id'];?>" role="tabpanel">

                      <div class="container-fluid" style="overflow-y: scroll; height:1000px; padding-top: 10px; padding-right: 10px;">

                        <div class="row">

                    <div class="col-md-3">
                              <div class="card card-inverse card-success text-center">
                                <img class="card-img-top" src="<?php echo $row['show_img']; ?>" alt="Card image cap">
                                <div class="card-block">
                                  <h4 class="card-title"><?php echo $row['episode_title'];?></h4>
                                  <p class="card-text"><?php echo $row['episode_description']; ?></p>
                                  <a href="archive.php?episode_id=<?php echo $row['episode_id']; ?>&show_id=<?php echo $row['show_id']; ?>" class="btn btn-primary">Learn More</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                 <!-- .card -->
               <?php endforeach;



            }
              ?>


<?php

            $sql = "SELECT `show_name`, `show_id`, `show_status`, `show_desc`,`show_url`,`show_insta`,`show_facebook`, `show_img` FROM `mpr_show` WHERE `show_status` = 'ACTIVE'";
            $result = mysqli_query($conn, $sql);
            ?>



             <?php foreach ($result as $row):?>

               <div class="col-4">
                   <!-- Navigation -->
                   <div class="list-group" id="list-tab" role="tablist">

                     <a class="list-group-item list-group-item-action" data-toggle="list" href="#<?php echo $row['show_id'];?>" role="tab" aria-controls="settings"><?php echo $row['show_name']; ?></a>
                   </div>
                   <!-- Navigation -->
                 </div>

             <!-- .card -->
           <?php endforeach;

                         mysqli_close($conn);
           ?>


          </div>
                </div>

  </main>
