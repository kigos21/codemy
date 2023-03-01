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
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <?php include "navbar-login.html"; ?>

    <!-- Main -->
    <div class="main container-md">
        <h1 class="prompt">Login to your Codemy account</h1>
        <input type="text" placeholder="email" class="textfield" id="emailTF">
        <input type="password" placeholder="password" class="textfield">
        <a href="#" id="forgot">Forgot Password?</a>
        <button type="button" id="loginBtn">log in</button>
        <span id="noAccount">Don't have an account? <a href="#">Sign up</a></span>
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