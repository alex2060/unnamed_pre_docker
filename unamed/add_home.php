
<?php 

include("config.php");
$name     =$_GET["uname"];
$password =$_GET["password"];
$email    =$_GET["email"];


if ($name!="") {
  $sql = "SELECT * FROM 'a_final_Ledgur' WHERE `Ledgurename` LIKE '".$name."';";
  $result = $conn->query($sql);
  if ($result->num_rows==0) {
      $sql="INSERT INTO `a_final_Ledgur` (`Ledgurename`, `Ledgurepassword`, `email`, `time`) VALUES ('".$name."', '".$password."', '".$email."', CURRENT_TIMESTAMP);";
      $result = $conn->query($sql);
  }
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Key</title>
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
sS
</br>
</br>
</br>
        <div class="form-group">
          <label for="uname" class="text-white">Ledgure name</label>
          <input type="text" class="form-control" id="uname" name="uname" placeholder="Ledgure name" value="">
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
        <button class="btn btn-info" onclick="window.location.href='add_key.php';">add key</button>

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
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_user.php';">User Dev    </button>
    </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_ledger.php';">Ledgure Dev </button>
      </br>
        <button class="btn btn-info themainbutton" onclick="window.location.href='dev_post.php';">Posts Dev      </button>
    

</br>
</br>
<label for="uname" class="text-white">Other tools</label>
</br> 

<button class="btn btn-info themainbutton" onclick="window.location.href='3D_G.php';">3D graphics       </button>
</br>
<button class="btn btn-info themainbutton" onclick="window.location.href='inventory_managment.php';">Invetory managment</button>

</br>
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
<label for="uname" class="text-white">now in here <?php echo $inhere." email ".$hoster_email." mailed".$mailed." uname".$name."!" ; ?></label>
</body>
</html>










