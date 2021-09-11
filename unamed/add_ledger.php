
<?php 

include("config.php");




include("stiper.php");


$password =the_striper($_POST["password"]);
$email    =the_striper($_POST["email"]);


$uname=          user_striper( $_POST["uname"] )  ;
$hashword=        the_striper($_POST["hashword"]);

$name     =$uname."_".the_striper($_POST["Ledgure"]);

#CREATE TABLE `a_final_Ledgura` ( `Ledgurename` TEXT NOT NULL , `Ledgurepassword` TEXT NOT NULL , `email` TEXT NOT NULL , `time` TEXT NOT NULL , UNIQUE (`Ledgurename`(248))) ENGINE = MyISAM; 



$sql = "SELECT * FROM a_final_users_table WHERE `uname` LIKE '".$uname."' AND `hashword` LIKE '".$hashword."'; ";


$result = $conn->query($sql);


if ($result->num_rows==1) {
  if ($name!="") {

    $sql = "SELECT * FROM `a_final_Ledgur` WHERE `Ledgurename` LIKE '".$name."' ";
    $result = $conn->query($sql);
    $out="used";
    if ($result->num_rows==0) {

        $sql="INSERT INTO `a_final_Ledgur` (`Ledgurename`, `Ledgurepassword`, `email`, `time`) VALUES ('".$name."', '".$password."', '".$email."', CURRENT_TIMESTAMP);";
        $result = $conn->query($sql);
        $out="added ".$name;

    }


  }
}
else{
  $out="wrong user name or password";
}

if ($_GET["uname"]=="") {
  $out="add a ledger";
}

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>first_page</title>
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
       </br>
  <div class="container ">

    <div class=" d-flex justify-content-center">
      <label for="uname" class="text-white justify-content-center"> <?php echo $out;?> </label>
       </div>
        </br>

    <div class=" d-flex justify-content-center">
      <form action=""  method="post" class="mt-3">


        <div class="form-group">
              <label for="uname" class="text-white">user name</label>
              <input type="text" class="form-control" id="user" name="uname" placeholder="Ledgure name" value="">
        </div>

        <div class="form-group">
              <label for="password" class="text-white">Hashword</label>
              <input type="text" class="form-control" id="password" name="hashword" placeholder="Ledgure password"
            value="">
        </div>


        <div class="form-group">
          <label for="uname" class="text-white">Ledgure name</label>
          <input type="text" class="form-control" id="uname" name="Ledgure" placeholder="Ledgure name" value="">
        </div>


        <div class="form-group">
          <label for="password" class="text-white">Ledgure Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Ledgure password" value="">
        </div>


        <div class="form-group">
              <label for="uname" class="text-white">Email</label>
              <input type="text" class="form-control" id="hash" name="email" placeholder="Email" value="">
        </div>




        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
        
      </form>


    </div>

        </div>

<button class="btn btn-info themainbutton" onclick="window.location.href='add_key.php';">add key </button>
    
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
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_user.php';">User Dev    </button>
    </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_ledger.php';">Ledgure Dev </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_post.php';">Posts Dev      </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='template_dev.php';">Template Dev      </button>
    
    


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

