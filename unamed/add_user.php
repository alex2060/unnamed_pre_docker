<?php 

#CREATE TABLE `a_final_users_table` ( `time` TIMESTAMP NOT NULL ,`hashword` TEXT NOT NULL , `uname` TEXT NOT NULL , `email` TEXT NOT NULL ,  UNIQUE (`uname`(256) ) ) ENGINE = MyISAM; 



include("config.php");

include("stiper.php");

$name     =   user_striper($_GET["uname"]);
$password =   the_striper($_GET["hashword"]);
$email    =   the_striper($_GET["email"]);


$out="add user";
if ($name!="") {
    $sql1 = "SELECT * FROM `a_final_users_table` WHERE `uname` LIKE '".$name."'";
    $result = $conn->query($sql1);
    
    if ($result->num_rows==0) {
      $sql="INSERT INTO `a_final_users_table` (`hashword`, `uname`, `email`,`time`) VALUES ('".$password."', '".$name ."', '".$email."',CURRENT_TIMESTAMP);";
      $result = $conn->query($sql);
      $out="user added ";












      $sendurl= "http://alexhaussmann.com/adhaussmann/a_final/add_ledger_dev.php?uname=".$name."&hashword=".$password."&Ledgure=shered&password=".$password."&email=".$email;
      

  $make=$sendurl;
  $ch1 = curl_init();
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch1, CURLOPT_VERBOSE,TRUE);
  curl_setopt($ch1, CURLOPT_URL,  str_replace(' ', '', $make)   );
  $test2 =  curl_exec($ch1);
  curl_close($ch1);

$addpost="http://alexhaussmann.com/adhaussmann/a_final/add_post_dev.php?uname=".$name."&hashword=".$password."&tital=text&text=time&body=body&photo=&iframe=&catagoy=shred_app&catagoy_2=";

  $make=$addpost;
  $ch1 = curl_init();
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch1, CURLOPT_VERBOSE,TRUE);
  curl_setopt($ch1, CURLOPT_URL,  str_replace(' ', '', $make)   );
  $test2 =  curl_exec($ch1);
  curl_close($ch1);






#prem page

  



  $sql="INSERT INTO `a_final_Ledgur` (`Ledgurename`, `Ledgurepassword`, `email`, `time`) VALUES ('".$name."_prem', '".$password."', '".$email."', CURRENT_TIMESTAMP);";
  $result = $conn->query($sql);


$addpost="http://alexhaussmann.com/adhaussmann/a_final/add_post_dev.php?uname=".$name."&hashword=".$password."&tital=text&text=time&body=body&photo=&iframe=&catagoy=prem&catagoy_2=P+".$name."_prem";

  $make=$addpost;
  $ch1 = curl_init();
  curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch1, CURLOPT_VERBOSE,TRUE);
  curl_setopt($ch1, CURLOPT_URL,  str_replace(' ', '', $make)   );
  $test2 =  curl_exec($ch1);
  curl_close($ch1);








      $sendurl= "  http://alexhaussmann.com/adhaussmann/a_final/make_newpage.php?usertemplate_name=example_mygame75&var1=my_page.php?cat_name=shred_app(!Y???!???Y!)uname=".$name;


      $sendurl= $sendurl."  http://alexhaussmann.com/adhaussmann/a_final/add_key.php?uname=".$name."_shered&password=".$password."&email=".$email;


      $sendurl= $sendurl." http://alexhaussmann.com/adhaussmann/a_final/add_post.php?uname=".$name."&hashword=".$password."&catagoy=shred_app&catagoy_2=";




      $sendurl=$sendurl;

      $sendurl= "http://alexhaussmann.com/adhaussmann/a_final/myhome.php?name=".$name."&password=".$password;




      $val=mail($email,"you acount is ready ",  $sendurl);

      $out=$out." ".$email." ".$val;





    }
    else{
      $out="username taken";
    }
}











?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Add</title>
  <!-- bootstrap link start -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- bootstrap link end -->
  <style>
  .themainbutton{
    min-width: 220px;

  }
  

  </style>
</head>

</br>
</br>
<body style="background-color: #24222a;">

  <div class="container ">



    <div class=" d-flex justify-content-center">
      <form action="" class="mt-3">
          <label for="uname" class="text-white"> <?php echo $out;?> </label>
        </br>
        <div class="form-group">
          <label for="uname" class="text-white">User Name</label>
          <input type="text" class="form-control" id="user" name="uname" placeholder="User Name" value="">
        </div>


        <div class="form-group">
          <label for="password" class="text-white">HashWord</label>
          <input type="text" class="form-control" id="password" name="hashword" placeholder="HashWord" value="">
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">Email</label>
              <input type="text" class="form-control" id="hash" name="email" placeholder="Email" value="">
        </div>




        <button type="submit" class="btn btn-primary" value="Submit">Login</button>

      </form>

    </div>
  </div>
</br>
</br>
</br>


<label for="uname" class="text-white">User Funtionality</label>
</br>
          <button class="btn btn-info themainbutton" onclick="window.location.href='user_add.php   ';">Users           </button>
</br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='  add_ledger.php ';">Ledgure       </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='  add_post.php   ';">Post            </button>

        </br>
        </br>
        </br>





<label for="uname" class="text-white">Dev tools</label>
</br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_user.php';">      User Dev    </button>
    </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_ledger.php';">    Ledgure Dev </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_post.php';">      Posts Dev      </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='template_dev.php';">  Template Dev      </button>
</br>
</br>
</br>

<label for="uname" class="text-white">Contact</label>
</br>

<label for="uname" class="text-white">Alex Haussmann</label>
</br>
<label for="uname" class="text-white">alex.haussmann@gmail.com</label>
</br>
<label for="uname" class="text-white">303-335-7320</label>
</br>
</body>
</html>





