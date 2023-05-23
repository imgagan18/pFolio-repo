<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagan Shenvi - CS student  </title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
      <div class="sidebar sidebarGo">
            <nav>
              <ul>
                <li><a href=" /" > Home </a></li>
                <li><a href=" /Intro.html" >My Intro </a></li>
                <li><a href=" /Blog.html" > Blog </a></li>
                <li><a href=" /Contact.html" > Contact me </a></li>
              </ul>
           </nav>
         </div>  
        <div class="main">
          <div class="hamburger">
            <img class= "ham" src="ham.png" alt="" width="55px">
            <img class= "cross" src="cross.png" alt="" width="55px">
        </div>
            <div class="contactform">
                <h1>Contact me for work/general Enquires..</h1>
                <?php 
                if(isset($_POST["submit"])){
                    $errors = array();
                    $firstName = $_POST["firstName"];
                    $phoneNumber = $_POST["PhoneNumber"];
                    $email = $_POST["emailHelp"];
                    $enquiry = $_POST["enquire"];
                    
                    if(empty($firstName) OR empty($email) OR empty($phoneNumber) OR empty($enquiry)){
                        array_push($errors, "All Fields are Required!");
                    }
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        array_push($errors, "Email is not valid");
                    }

                    if(count($errors)>0){
                        foreach($errors as $error){
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    }else{
                        // ENTER DATA IN THE DATABASE
                        require_once "connect.php";
                        $sql = "INSERT INTO contact(firstName, PhoneNumber, email, enquiry) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                        if($preparestmt){
                            mysqli_stmt_bind_param($stmt,"ssss",$firstName, $phoneNumber,$email, $enquiry);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'>Message Sent</div>";
                        }else{
                            echo "<div>Something went wrong!</div>";
                            die("Something went wrong!");
                        }
                    }
            }
        ?>
                <form action="contact.php" method="post">
                    <div class="mb-3">
                           <label for="ClientPhone" class="form-label">Name </label>
                           <input type="Name" class="form-control" id="ClientPhone" name="firstName">
                      </div>
                      <div class="mb-3">
                            <label for="ClientPhone" class="form-label">Phone </label>
                            <input type="phone" class="form-control" id="ClientPhone" name="PhoneNumber">
                      </div>
                    <div class="mb-3">
                          <label for="clientEmail" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="clientEmail" aria-describedby="emailHelp" name="emailHelp">
                      <div id="emailHelp" class="form-text" style="font-size: 17px;">We'll never share your email & phone with anyone else.</div>
                    </div>
                   
                    <div class="mb-3">
                            <label for="ClientPhone" class="form-label">Enquire </label>
                            <input type="Enquire" class="form-control" id="ClientPhone" name="enquire">
                      </div>
                    <div class="mb-3" id="form-check">
                           <input type="checkbox" class="form-check-input" id="is-client">
                           <label class="form-check-label" for="Is Client">I want you to work on a project with me ..</label>
                    </div>
                    <input type="submit" value="submit" name="submit">
                  </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script> 
</body>
</html>