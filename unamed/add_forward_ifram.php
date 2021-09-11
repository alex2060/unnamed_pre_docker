
<?php
  #CREATE TABLE `a_final_Ledgur_keys` ( `time` TIMESTAMP NOT NULL ,`entery_name` TEXT NOT NULL , `ledgername` TEXT NOT NULL , `hash` TEXT NOT NULL , `solution` TEXT NOT NULL , `email` TEXT NOT NULL, UNIQUE (`entery_name`(248)) ) ENGINE = MyISAM; 

#CREATE TABLE `a_final_name` ( `keyname` TEXT NOT NULL , `message` TEXT NOT NULL , UNIQUE (`keyname`(248))) ENGINE = MyISAM; 

#my_go  now 
  include("config.php");
  include("stiper.php");

  $name     =the_striper($_POST["uname"]  );
  $password =the_striper($_POST["password"]);
  $email    =the_striper($_POST["email"]   );
  $forward  =the_striper($_POST["forward"]   );
  $sectret  =the_striper($_POST["sectret"]   );
    $out="nothing"." ";

  if ($name!="") {
    
    $sql = "SELECT * FROM `a_final_Ledgur` WHERE `Ledgurename` LIKE '".$name."' and `Ledgurepassword` LIKE '".$password."';";
    $out=$sql;
    $result = $conn->query($sql);
      if ($result->num_rows!=0) {
        $sql="SELECT * FROM `a_final_forwarder_2` WHERE `leddgure` LIKE '".$name."'";
        $out=$sql;
        $result = $conn->query($sql);
        if ($result->num_rows==1) {
                  $sql="UPDATE `a_final_forwarder_2` SET `forward` = '".$forward."' WHERE `leddgure` = '".$name."';";
                  $result = $conn->query($sql);
                  $sql="UPDATE `a_final_forwarder_2` SET `passkey` = '".$sectret."' WHERE `a_final_forwarder_2`.`leddgure` = '".$name."';";        
                  $result = $conn->query($sql);     
                  $out="updated_forward"; 
          }
          else{
            $sql="INSERT INTO `a_final_forwarder_2` (`leddgure`, `forward`, `passkey`) VALUES ('".$name."', '".$forward."', '".$sectret."');";
            $result = $conn->query($sql);
            $out="addded_forward";
          }
        }
        else{
          $out="wrong_username/password";
        }



  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Forward</title>
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

<body style="background-color: #24222a;">

  <div class="container ">



    <div class=" d-flex justify-content-center">

      <form action=<?php echo "\"add_forward_ifram.php?uname=".$_GET["uname"]."&password=".$_GET["password"]."\"";?> method="post" class="mt-3">



        </br>
              <label for="uname" class="text-white"> </label>
        </br>
        <label for="uname" class="text-white">changed <?php echo $out; ?> </label>
        </br>
        </br>


        <div class="form-group">
          <label for="uname" class="text-white">Ledgure name</label>
          <input type="text" class="form-control" id="uname" name="uname" placeholder="Ledgure name" value=<?php echo "\"".$_GET["uname"]."\""; ?> >
        </div>


        <div class="form-group">
          <label for="password" class="text-white">Ledgure Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Ledgure password" value=<?php echo "\"".$_GET["password"]."\""; ?> >
        </div>


        <div class="form-group">
              <label for="uname" class="text-white">forward</label>
              <input type="text" class="form-control" id="hash" name="forward" placeholder="forward" value= <?php echo "\""."\""; ?> >
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">Sectret</label>
              <input type="text" class="form-control" id="hash" name="sectret" placeholder="sectret" value= <?php echo "\""."\""; ?> >
        </div>

        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>



      </form>

    </div>
  </div>
</br>
</br>
</br>




