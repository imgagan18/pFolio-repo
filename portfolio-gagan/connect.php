
<?php 

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "enquiry";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("Something went wrong!");
}
// $firstName =$_POST['firstname'];
// $PhoneNumber=$_POST['Phonenumber'];
// $emailHelp =$_POST['emailHelp'];
// $Enquire =$_POST['Enquire'];

// //data base connection.
// $conn = new mysqli('localhost', 'root', "', 'test");
// if($conn ->connect_error){
//     die('connection failed : '.$conn->connect_error);
// }else{
//     $stmt= $conn->prepare("insert into registration(firstName,PhoneNumber,emailHelp,Enquire) values(?,?,?,?)");
//     $stmt->bind_param("siss",$firstName,$PhoneNumber,$emailHelp,$Enquire);
//     $stmt->execute();
//     echo "your enquire is successful...";
//     $stmt->close();
//     $conn->close();
//}
?>