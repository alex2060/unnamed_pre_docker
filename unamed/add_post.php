

<?
#CREATE TABLE `a_final_posts` ( `uname` TEXT NOT NULL , `text` TEXT NOT NULL , `body` TEXT NOT NULL , `tital` TEXT NOT NULL , `time` TIMESTAMP NOT NULL , `photo` TEXT NOT NULL , `iframe` TEXT NOT NULL , `catagoy` TEXT NOT NULL , `catagoy_2` TEXT NOT NULL , `postkey` TEXT NOT NULL , UNIQUE (`postkey`(256))) ENGINE = MyISAM; 



include("config.php");



include("stiper.php");
$uname=       user_striper($_POST["uname"]);
$hashword=    the_striper($_POST["hashword"]);
$tital =      the_striper($_POST["tital"]);
$text=        the_striper($_POST["text"]);
$body=        the_striper($_POST["body"]);
$photo=       the_striper($_POST["photo"]);
$iframe=      the_striper($_POST["iframe"]);
$catagoy=     the_striper($_POST["catagoy"]);
$catagoy1=    the_striper($_POST["catagoy"]);
$catagoy2=    the_striper($_POST["catagoy_2"]);


if ($tital=="") {
$uname="none";
}

$bytes = openssl_random_pseudo_bytes(256);


//making randome name
$rando = base64_encode($bytes);
$post_id= hash('sha256',$rando );

$sql = "SELECT * FROM a_final_users_table WHERE `uname` LIKE '".$uname."' AND `hashword` LIKE '".$hashword."'; ";


$result = $conn->query($sql);


$out="make a post";
if ($result->num_rows==1) {
  $sql="INSERT INTO `a_final_posts` (`uname`, `text`, `body`, `tital`, `time`, `photo`, `iframe`, `catagoy`, `catagoy_2`, `postkey`) VALUES ('".$uname."', '".$text."', '".$body."', '".$tital."', CURRENT_TIMESTAMP, '".$photo."', '".$iframe."', '".$catagoy1."', '".$catagoy2."', '".$post_id."');";
  $result = $conn->query($sql);
  $out="post made";



}
else{
  $out="user name or password incorrect";

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


      <label for="uname" class="text-white"> <?php echo $out;?> </label>
        </br>
    <div class=" d-flex justify-content-center">
      <form action=<?php echo "\"add_post.php?uname=".$_GET["uname"]."&hashword=".$_GET["hashword"]."&catagoy=".$_GET["catagoy"]."&catagoy_2=".$_GET["catagoy"]."\"";?> method="post" class="mt-3">

        <div class="form-group">
          <label for="uname" class="text-white">user name</label>
          <input type="text" class="form-control" id="user" name="uname" placeholder="Ledgure name" value=<?php echo "\"".$_GET["uname"]."\"";?> >
        </div>

        <div class="form-group">
          <label for="password" class="text-white">Hashword</label>
          <input type="text" class="form-control" id="password" name="hashword" placeholder="Password" value=<?php echo "\"".$_GET["hashword"]."\"";?> >
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">Tital</label>
              <input type="text" class="form-control" id="hash" name="tital" placeholder="Tital" value="">
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">Text</label>
              <input type="text" class="form-control" id="hash" name="text" placeholder="Text" value="">
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">Body</label>
              <input type="text" class="form-control" id="hash" name="body" placeholder="Body" value="">
        </div>


        <div class="form-group">
              <label for="uname" class="text-white">placeholder</label>
              <input type="text" class="form-control" id="hash" name="photo" placeholder="placeholder" value="">
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">IFrame holder</label>
              <input type="text" class="form-control" id="hash" name="iframe" placeholder="IFrame" value="">
        </div>

        <div class="form-group">
              <label for="uname" class="text-white">catagoy</label>
              <input type="text" class="form-control" id="hash" name="catagoy" placeholder="catagoy" value=<?php echo "\"".$_GET["catagoy"]."\"";?>>
        </div>


        <div class="form-group">
              <label for="uname" class="text-white">catagoy 2</label>
              <input type="text" class="form-control" id="hash" name="catagoy_2" placeholder="catagoy 2" value=<?php echo "\"".$_GET["catagoy_2"]."\"";?>>
        </div>



        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>


      </form>


    </div>

        </div>

<button class="btn btn-info themainbutton" onclick="window.location.href='make_homepage.php';">make app     </button>
    
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



