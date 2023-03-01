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

    <?php include "navbar.html"; ?>

    <!-- Main -->
    <div class="main container-md" style="margin-bottom: 20vh;">
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h1 class="prompt-main">Courses to get you started</h1>
                <hr class="hr-line">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-2 row-cols-md-1 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://picsum.photos/seed/1/1600/900" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">The Complete Python Bootcamp</h5>
                                <p class="card-text">Learn Python like a Professional</p>
                            </div>
                            <button type="button" class="addToBtn">Add to My Learning</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://picsum.photos/seed/2/1600/900" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Web Developer Bootcamp 2023</h5>
                                <p class="card-text">The only course you need to learn web development</p>
                            </div>
                            <button type="button" class="addToBtn">Add to My Learning</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://picsum.photos/seed/3/1600/900" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Java Programming Masterclass</h5>
                                <p class="card-text">Obtain valuable Core Java Skills</p>
                            </div>
                            <button type="button" class="addToBtn">Add to My Learning</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://picsum.photos/seed/4/1600/900" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">The Complete iOS App Development Bootcamp</h5>
                                <p class="card-text">Master the SwiftUI in just one Course</p>
                            </div>
                            <button type="button" class="addToBtn">Add to My Learning</button>
                        </div>
                    </div>
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