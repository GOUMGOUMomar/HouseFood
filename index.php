<?php include("partials-front/menu.php"); ?>
<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
                <?php
                if(isset( $_SESSION['order']))
                {
                    echo  $_SESSION['order'];
                    unset( $_SESSION['order']);
                }
                ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
              //Create Sql qurey to display categories
              $sql="SELECT*FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3  ";
              //Excute the qurey
              $res=mysqli_query($conn,$sql);
              //Count the rows
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                  //Category availibale
                  while($row=mysqli_fetch_assoc($res))
                  {
                      //Data availibale
                      //Get the values
                      $id=$row['id'];
                      $title=$row['title'];
                      $image_name=$row['image_name'];
                      ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                      if($image_name=="")
                                      {
                                          echo"<div class='error'>There is not availibale image</div>";
                                      }
                                      else
                                      {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                      }
                                    
                                    ?>
                                   

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>

                      <?php

                  }
              }
              else
              {
                  //Categories not availibale
                  echo "<div class='error'>There is not availibale categories</div>";
              }
            
            
            ?>       

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            //Create the query
            $sql2="SELECT*FROM food WHERE active='Yes'AND featured='Yes'";
            //excute the query
            $res2=mysqli_query($conn,$sql2);
            //count the rows
            $count2=mysqli_num_rows($res2);
            if($count2>0)
            {
                //Data availibale
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get the value
                    $id=$row['id'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $title2=$row['title'];
                    $image_name2=$row['image_name'];
                    ?>
                      <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                //check wether the image is avilibale
                                if($image_name2=="")
                                      {
                                          echo"<div class='error'>There is not availibale image</div>";
                                      }
                                      else
                                      {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name2; ?>" class="img-responsive img-curve" >
                                        <?php
                                      }
                                    
                                
                                ?>
                               
                            </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title2; ?></h4>
                            <p class="food-price">$<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL ?>order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>


                    <?php
                }
            }
            else
            {
                //Data isn't avalibale
                echo "<div clas'error'>There is not avilibale food</div>";
            }
            
            ?>
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include("partials-front/footer.php"); ?>