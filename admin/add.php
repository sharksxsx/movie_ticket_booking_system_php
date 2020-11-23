<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>
    <div class="admin-section-header">
        <div class="admin-logo">
            BUE Cinema
        </div>
        <div class="admin-login-info">
            <div style="padding: 0 20px;"><h2><a href="#">Admin Panel</a></h2></div>
            <form method='post' action="">
                <input type="submit" value="Logout" class="btn btn-outline-warning" name="but_logout">
            </form>
            <img class="admin-user-avatar" src="../img/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
        
        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                
                
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>ADD ENTRY</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        
                        <input placeholder="FULL NAME" type="text" name="movieTitle" required>
                        <input placeholder="MOVIENAME" type="text" name="movieGenre" required>
                        <input placeholder="EMAIL" type="number" name="movieDuration" required>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <input placeholder="THEATRE" type="text" name="movieDirector" required>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <label>Price</label>
                        <input placeholder="Main Hall" type="text" name="mainhall" required><br />
                        <input placeholder="Vip-Hall" type="text" name="viphall" required><br />
                        <input placeholder="Private Hall" type="text" name="privatehall" required><br />
                        <br>
                        <label>Add Poster</label>
                        <input type="file" name="movieImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">ADD ENTRY</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors,
                                            mainhall,
                                            viphall,
                                            privatehall)
                            VALUES (        'img/" . $_POST['movieImg'] . "',
                                            '" . $_POST["movieTitle"] . "',
                                            '" . $_POST["movieGenre"] . "',
                                            '" . $_POST["movieDuration"] . "',
                                            '" . $_POST["movieRelDate"] . "',
                                            '" . $_POST["movieDirector"] . "',
                                            '" . $_POST["movieActors"] . "',
                                            '" . $_POST["mainhall"] . "',
                                            '" . $_POST["viphall"] . "',
                                            '" . $_POST["privatehall"] . "')";
                            mysqli_query($link, $insert_query);
                        }
                        ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>