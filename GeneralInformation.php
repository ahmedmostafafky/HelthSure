<?php 
    session_start();
    $id = $_SESSION["id"];

    $dbHost     = "127.0.0.1";  
    $dbUsername = "root";  
    $dbPassword = "142000";  
    $dbName     = "helthsure";  

    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword); 
    mysqli_select_db($con,$dbName);
    
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
///////////////////////////////////////////////////
    $sql1 = "SELECT * FROM generalinfo WHERE id = '$id'";
    $result1 = mysqli_query($con, $sql1);  
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC); 
///////////////////////////////////////////////////
    $sql2 = "SELECT * FROM relativecont WHERE id = '$id'";
    $result2 = mysqli_query($con, $sql2);  
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); 
////////////////////////////////////////////////////////
$sql3 = "SELECT * FROM allergy WHERE id = '$id'";
    $result3 = mysqli_query($con, $sql3);  
    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC); 
////////////////////////////////////////////////////////
$sql4 = "SELECT * FROM chronic WHERE id = '$id'";
    $result4 = mysqli_query($con, $sql4);  
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthSure</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Markazi+Text" rel="stylesheet">

    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width:100%;
            border: 1px solid black;
        }
        tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        td {
            padding: 12px 15px;
            border: 1px solid black;
        }


    </style>

</head>

<body>

    <section id="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <a class="navbar-brand" href="home.php"><span class="liner_1">Health</span><span
							class="liner_2">Sure</span></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="hvr-reveal" href="home.php">HOME</a></li>
                        <li><a class="active_tag" href="profile.php">PROFILE</a></li>
                        <li><a class="hvr-reveal" href="sos.php">SOS</a></li>
                        <li><a class="hvr-reveal" href="team.php">TEAM</a></li>
                        <li><a class="hvr-reveal" href="contact.php">CONTACT</a></li>
                        <li><a class="hvr-reveal" href="scann.php">QR-Code</a></li>
                    </ul>
                    <div class="profile">
                        <img class="avatar" src="backend/proimgs/<?=$_SESSION['img']?>">
                        <h5 class="username"><a href="profile.php"><?=$_SESSION['username']?></a></h5>
                    </div>

                </div>
            </div>
        </nav>
    </section>

    <section id="header_2" class="clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header_2">
                        <h5><a href="home.php">HOME</a>
                            <span class="well_1"><i class="fa fa-caret-right"></i></span> <a href="profile.php"> PROFILE</a>
                            <span class="well_1"><i class="fa fa-caret-right"></i></span> <a href="GeneralInformation.php"> General Information</a>
                            <h5>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="title">
                        <h2>GENERA<span class="title_border">L INFOR</span>MATION</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="general-info-main">
        <div class="general-info-main-top">
            <div>
                <h3>General Information</h3>
                <table>
                    <tr>
                        <td>bloodtype</td>
                        <td>age</td>
                        <td>gender</td>
                        <td>date of birth</td>
                        <td>address</td>
                    </tr>
                    <tr>
                        <td><?php echo $row1["bloodtype"]?></td>
                        <td><?php echo $row1["age"]?></td>
                        <td><?php echo $row1["gender"]?></td>
                        <td><?php echo $row1["dateofbirth"]?></td>
                        <td><?php echo $row1["address"]?></td>
                    </tr>
                </table>
            </div>
            <hr>
            <div>
                <h3>Relative Contacts</h3>
                <table>
                    <tr>
                        <td>name</td>
                        <td>number</td>
                        <td>address</td>
                    </tr>
                    <?php
                        echo "<tr><td>" . $row2["name"] . "</td>";
                        echo "<td>" . $row2['number'] . "</td>";
                        echo "<td>" . $row2['addrees'] . "</td></tr>";
                        while($row2 = $result2->fetch_assoc()) {
                            echo "<tr><td>" . $row2["name"] . "</td>";
                            echo "<td>" . $row2['number'] . "</td>";
                            echo "<td>" . $row2['addrees'] . "</td></tr>";
                        }
                    ?>
                </table>
            </div>
            <hr>
            <div>
                <h3>Allergy</h3>
                <table>
                    <tr>
                        <td>name</td>
                        <td>description</td>
                        <td>date</td>
                    </tr>
                    <?php
                        echo "<tr><td>" . $row3["name"] . "</td>";
                        echo "<td>" . $row3['description'] . "</td>";
                        echo "<td>" . $row3['date'] . "</td></tr>";
                        while($row3 = $result3->fetch_assoc()) {
                            echo "<tr><td>" . $row3["name"] . "</td>";
                            echo "<td>" . $row3['description'] . "</td>";
                            echo "<td>" . $row3['date'] . "</td></tr>";
                        }
                    ?>

                    
                </table>
            </div>
            <hr>
            <div>
                <h3>Cironic Desises</h3>
                <table>
                    <tr>
                        <td>name</td>
                        <td>description</td>
                        <td>date</td>
                    </tr>
                    <?php
                        echo "<tr><td>" . $row4["name"] . "</td>";
                        echo "<td>" . $row4['description'] . "</td>";
                        echo "<td>" . $row4['date'] . "</td></tr>";
                        while($row4 = $result4->fetch_assoc()) {
                            echo "<tr><td>" . $row4["name"] . "</td>";
                            echo "<td>" . $row4['description'] . "</td>";
                            echo "<td>" . $row4['date'] . "</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
        <hr>
        <hr>
        <div class="general-info-main-bottom">
        
            <div>
                <h3>Add General Information</h3>
                <form action="backend/generalinfo.php" method="post">

                    <label class="plabel" for ="btype">Blood Type: </label>
                    <input name="btype" class="edit-input" id="btype" type="text">

                    <label class="plabel" for = "age">Age: </label>
                    <input name ="age" class="edit-input"  id="age" type="text">

                    <label class="plabel" for ="gender">Gender: </label>
                    <input name ="gender" class="edit-input" id="gender" type="text">

                    <label class="plabel" for ="datebirth">Date Of Birth: </label>
                    <input name ="dbirth" class="edit-input" id="datebirth" type="text">

                    <label class="plabel" for ="adress">Adress: </label>
                    <input name ="adress" class="edit-input" id="adress" type="text">

                    <input class="edit-submit" value = "Add" type="submit">
                </form>
            </div>
            <hr>
            <div>
                <h3>Add Relative Contact</h3>
                <form action="backend/relativcont.php" method="post">
                    <label class="plabel" for ="name">Name: </label>
                    <input name="name" class="edit-input" id="name" type="text">
                    <label class="plabel" for = "phone">Phone: </label>
                    <input name="phone" class="edit-input"  id="phone" type="text">
                    <label class="plabel" for ="adress">Adress </label>
                    <input name="address" class="edit-input" id="adress" type="text">
                    <input class="edit-submit" value = "Add" type="submit">
                </form>
            </div>
            <hr>
            <div>
                <h3>Add Allegry</h3>
                <form action="backend/allergy.php" method="post">
                    <label class="plabel" for="name">Name:</label>
                    <input name = "name" class="edit-input"  id="name" type="text">
                    <label class="plabel" for="date">Start Date:</label>
                    <input name = "date" class="edit-input"  id="date" type="text">
                    <label class="plabel" for="allegrydesc"> Allegry Description:</label>
                    <input name = "desc" class="edit-input"  id="allegrydesc" type="text">
                    <input class="edit-submit" value = "Add" type="submit">
                </form>
            </div>
            <hr>
            <div>
                <h3>Add Cironic Desis</h3>
                <form action="backend/chronic.php" method="post">
                    <label class="plabel" for="name">Name:</label>
                    <input name = "name" class="edit-input"  id="name" type="text">
                    <label class="plabel" for="date">Start Date:</label>
                    <input name ="date" class="edit-input" id="date" type="text">
                    <label class="plabel" for="cironicdesc"> Cironic Desis Description:</label>
                    <input name = "desc" class="edit-input" id="cironicdesc" type="text">
                    <input class="edit-submit" value = "Add" type="submit">
                </form>
            </div>
        </div>

    </section>

    <section id="footer" class="clearfix">
        <div class="col-sm-12">
            <div class="col-sm-3">
                <div class="footer_1">
                    <h4>Medicine</h4>
                    <p>Medicine is the science and practice of caring for a patient, managing the diagnosis, prognosis, prevention, treatment, palliation of their injury or disease, and promoting their health.
                    </p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="footer_2">
                    <h4>DEVELOPERS</h4>
                    <ul>
                        <li><a href="#">Ahmed Mostafa</a></li>
                        <li><a href="#">Amr hegab</a></li>
                        <li><a href="#">Ramadan Mostafa</a></li>
                        <li><a href="#">Mohamed Salah</a></li>
                        <li><a href="#">Ahmed Ameer</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_3">
                    <h4>Daily Mail </h4>
                    <p>Send your email so We can send to you information: </p>
                    <form>
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <h5><a href="#">Submit</a></h5>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer_4">
                    <h4>Author: </h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i>Address: Sheben Elkom</li>
                        <li><i class="fa fa-phone"></i>Phones: <a href="#">01098367311</a></li>
                        <li><i class="fa fa-user"></i>The Earth is not always the same.</li>
                        <li><i class="fa fa-envelope"></i>E-mail:<a href="#"> ahmedmostafafeky@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="footer_main" class="clearfix">
        <div class="col-sm-12">
            <div class="footer_main_1">
                <p>© 2021 Helth Sure. All Rights Reserved. Design by<a href=""> AHMED MOSTAFA ELFEKY</a> </p>
            </div>
        </div>
    </section>

</body>

</html>

<?php 
$conn->close();

?>