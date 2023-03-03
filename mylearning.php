<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Source+Code+Pro&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body>

    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    include "navbar.html";

    ?>

    <!-- Main -->
    <div class="main container-md" style="margin-bottom: 20vh;">
        <div class="row justify-content-center">
            <div class="col col-md-8 ">
                <h1 class="prompt-main">Pickup and continue learning</h1>
                <hr class="hr-line">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-2 row-cols-md-1 g-4">
                    <!-- TODO: render database content courses -->
                    <?php

                    // establish a connection to the MySQL database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "codemy";
                    $iduser = $_SESSION["iduser"];

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // execute the query
                    $sql = "SELECT idlearning, c.idcourse, imglink, title, description, u.iduser, email
                    FROM learning l
                    INNER JOIN user u ON l.iduser = u.iduser
                    INNER JOIN course c ON l.idcourse = c.idcourse
                    WHERE u.iduser = '$iduser';";
                    $result = mysqli_query($conn, $sql);

                    // iterate through the results
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $idcourse = $row["idcourse"];
                            $src = $row["imglink"];
                            $title = $row["title"];
                            $description = $row["description"];
                            // access the values of each row using the column names
                            echo "<div class='col'>
                                <div class='card h-100'>
                                    <img src='$src' class='card-img-top img-fluid' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$title</h5>
                                        <p class='card-text'>$description</p>
                                    </div>
                                    <form action='removefromlearn.php' method='post'>
                                        <input type='hidden' id='idcourse' name='idcourse' value='$idcourse'>
                                        <input type='hidden' id='iduser' name='iduser' value='$iduser'>
                                        <input type='submit' class='removeFromBtn' value='Remove Course'>
                                    </form>
                                </div>
                            </div>";
                        }
                    } else {
                    }

                    // close the connection
                    mysqli_close($conn);

                    ?>
                </div>

            </div>
        </div>
    </div>

    <?php include "footer.html" ?>

    <!-- Script for Animation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on("click", function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $("html, body").animate({
                            scrollTop: $(hash).offset().top,
                        },
                        800,
                        function() {
                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        }
                    );
                } // End if
            });
        });
    </script>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>