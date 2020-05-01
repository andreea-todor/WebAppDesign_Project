<!DOCTYPE html>

<html>
    <head>
        <title>My Personal Journey</title>
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <style>
            .row {
                display: flex;
            }

            .column {
                flex: 33.33%;
                padding: 5px;
            }
            
            .bg-img {
            /* The image used */
                background-image: url("./matthew-smith-Rfflri94rs8-unsplash.jpg");

                min-height: 380px;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

                /* Needed to position the navbar */
                position: relative;
            }

            /* Position the navbar container inside the image */
            .container {
                position: absolute;
                margin: 20px;
                width: auto;
            }

            /* The navbar */
            .topnav {
                overflow: hidden;
                background-color: #333;
            }

            /* Navbar links */
            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }
            
            form {
                margin-top: 50px;
                transition: all 4s ease-in-out;
            }
            
            .form-control {
                width: 600px;
                background: transparent;
                border: none;
                outline: none;
                border-bottom: 1px solid black;
                color: #fff;
                font-size: 18px;
                margin-bottom: 16px;
            }
            
            input {
                height: 45px;
            }
            
            form .submit {
                background: #ff5722;
                border-color: transparent;
                color: #fff;
                font-size: 20px;
                font-weight: bold;
                letter-spacing: 2px;
                height: 50px;
                margin-top: 20px;
            }
            
            form .submit:hover {
                background-color: #f44336;
                cursor: pointer;
            }
			
			body {
				font-size: 27px;
				color: white;
			}

			table {
				
				margin: 40px auto;
				border-collapse: collapse;
				text-align: left;
			}

			tr {
				border-bottom: 1px solid #cbcbcb;
			}

			th, td {
				border: none;
				height: 40px;
				padding: 2px;
			}
        </style>
    </head>
    
    <body style="background-image: url(personality1.jpg);">
        
         <div class="bg-img" id="home">
            <div class="container">
                <div class="topnav">
                    <a href="#home">Home</a>
                    <a href="#interesting">Interesting</a>
                    <!--<a href="#contact">Contact</a>-->
                    <a href="#about">About</a>
                    <a href="./access.html">Logout</a>
                </div>
            </div>
        </div> 
    
        <hr>
    
        <!-- <img style=" padding: 0; display: block; margin: 0 auto; max-height: 100%; max-width: 100%; " src="./matthew-smith-Rfflri94rs8-unsplash.jpg"/> -->
        
        <!-- <div  style="text-align: center; font-family: 'Sofia'; position: fixed; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%); color:#FFFFFF;">
            <h1 style="font-family: 'Sofia';">My Personal Journey</h1>
            
            <h3>Welcome to the site where your personality gets revealed. </h3>
            <h3>As you complete the milestones by taking the tests, you get closer to completing your personality puzzle.</h3> 
            <h3>So, let's get started!</h3>
        </div> -->
        
        <div style="color: white;">
        <h1>Welcome to the site where your personality gets revealed. </h1>
        <h1>As you complete the milestones by taking the tests, you get closer to completing your personality puzzle.</h1>
        </div>
        <hr>
          <div class="row" id="tests">
                <div class="column">
                    <img src="./eq.png" alt="Emotional Intelligence Test"/>
                </div>
                <div class="column">
                    <img src="./iq.jpg" alt="Intelligence Test"/>
                </div>
                <div class="column">
                    <img src="./personality.jpg" alt="Personality Test"/>
                </div>
                <div class="column">
                    <img src="./personality.jpg" alt="Personality Test"/>
                </div>
            </div> 
        
                <?php
                    $conn=mysqli_connect('localhost', 'root', '', 'users');

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $result = mysqli_query($conn, "SELECT * FROM tests");

					echo "<table><tr><th>Name</th><th>Category</th><th>Link</th></tr>";
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>".$row["name"]."</td><td>".$row["category"]."</td><td>".$row["link"]."</td></tr>";
                        }
						echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);
                    ?>
             
             <hr>
             <div class="row" id="interesting">
                <div class="column">
                    <iframe width="420" height="345" src="https://www.youtube.com/embed/qYvXk_bqlBk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="column">
                    <iframe width="420" height="345" src="https://www.youtube.com/embed/mefC12rQovI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="column">
                    <iframe width="420" height="345" src="https://www.youtube.com/embed/gBkIyJ7kf_I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
             </div>
             <hr>
             
             <!--
             <div id="contact">
                <h2>Please fill in this form to send a message.</h2>
                <div class="contact-form">
                    <form id="contact-form" method="post" action="contact-form-handler.php">
                        <input name="date" type="text" class="form-control" placeholder="Date" required> <br>
                        <input name="email" type="email" class="form-control" placeholder="Your Email" required> <br>
                        <textarea name="message" class="form-control" placeholder="Message" row="4" required></textarea><br>
                        <input type="submit" class="form-control submit" value="SEND MESSAGE">
                    </form>
                </div>
             </div>
             <hr>
             -->
             
             <div id="about" style="color: white;">
                <h2><em>My Personal Journey</em> is a website that allows users to take personality tests or any other types of self-knowing tests.
				It is a free website that require registration. It also has a part with articles regarding the concepts mentioned in the tests.
				Enjoy!</h2>
             </div>
             
             <h4 style="color: white;">©My Personal Journey 2019. All rights reserved.</h4>
        
    </body>
</html>
