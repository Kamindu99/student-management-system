<?php
include_once './config.php';

session_start();


if (isset($_SESSION['empid'])) {
  $empid = $_SESSION['empid'];
  

  $selectSql = "SELECT * FROM compregister WHERE compid = ?";
  $stmt = $con->prepare($selectSql);
  $stmt->bind_param("s", $empid);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  

  $compname = $row['compname'];
  $compid = $row['compid'];
  $username = $row['username'];
  $password = $row['password'];
  $email = $row['email'];
  $location = $row['location'];
  $description = $row['description'];

  
  echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <title>Company Profile Update</title>
        <link rel="stylesheet" href="../css/register.css">
    </head>
    
    <body>
        <div class="header">
            <div class="header-left1">
                <span>
                    <h4>HireHUB</h4>
                </span>
                <p class="buil">Building Bridges for <br> Career Growth</p>
            </div>
            <div class="header-right1">
    
            <a onclick="logout()" class="btn btn-primary btn-custom me">Log Out</a>
            </div>
        </div>
    
    
        <header>
            <nav>
                <ul class="navigation">
                    <li><a href="last_site.html">Home</a></li>
                    <li><a href="vacancy_page.php">Vacancies</a></li>
                    <li><a href="web.php">Contact US</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li class="search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    
    
        <hr>
    
    
        <div class="content-wrapper">
            <div class="left-side" id="left-side-container">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img class="sliderimg" src="https://burst.shopifycdn.com/photos/resume-checklist-next-to-laptop.jpg?width=925&format=pjpg&exif=1&iptc=1" alt="this is displaying an image of a job portal"><!-- All the images are taken from online websites-->
                        <div class="text">Image One</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img class="sliderimg" src="https://agilityportal.io/images/easyblog_articles/365/Best-apps-for-employees.jpg" alt="this is displaying an image of a job portal"><!-- All the images are taken from online websites-->
                        <div class="text">Image Two</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img class="sliderimg" src="https://blog.vantagecircle.com/content/images/2020/08/Employee-recognition.png" alt="this is displaying an image of a job portal">
                        <div class="text">Image Three</div>
                    </div>
                </div>
            </div>
            <br>
    
            <div class="right-side">
                <div class="form-container">
                    <div class="logo-container">
                        <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" alt="logo" height="100px" width="100px" class="logo">
                    </div>
                    <h6><b><u>Hire Hub</b></u></h6>
                    <br><br>
                    <h1>
                        <center>Update Company Details</center>
                    </h1>
                    <br>
                    <br>
                    <br>
                    <form action="updateprocess.php" method="POST">
                    <br>
                    <label>Registration ID:</label>
                    <input type="text" name="compid" placeholder="Registration ID"  value="'.$compid.'" disabled required><br><br>
                    <label>Company name:</label>
                    <input type="text" name="compname" placeholder="Company Name"  value="'.$compname.'" required><br><br>
                    <label>Company username:</label>
                    <input type="text" name="username" placeholder="company user name"  value="'.$username.'" required><br><br>
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="abc@gmail.com"  value="'.$email.'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required><br><br>
                    <label>Location:</label>
                    <input type="text" name="location" placeholder="Mention the country"  value="'.$location.'" required><br><br>
                    <label>Password:</label>
                    <input type="password" id="password" name="password"  value="'.$password.'" required><br><br>
                    <label>Re-type password:</label>
                    <input type="password" name="cnfrmpwd" id="cnfrmpwd"  value="'.$password.'" required><br /><br>
                    <label>About the company:</label>
                    <input type="text" name="description" placeholder="About the company:"  value="'.$description.'" required><br><br>
                 
                    <center><input type="submit" id="submitBtn" value="Submit"></center>
              
                    </form>
                </div>
            </div>
        </div>
    
    
    
    
        <footer class="footer">
            <div class="footer-content">
                <h3>About Us</h3>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel dui sed lacus commodo posuere.</h5>
            </div>
            <div class="footer-content">
                <h3>Contact Info</h3>
                <h5>Email: info@example.com</h5>
                <h5>Phone: +1 123 456789</h5>
            </div>
            <div class="footer-content search-bar1">
                <h3>Search</h3>
                <form action="#" method="get">
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <div class="social-media">
    
                </div>
            </div>
        </footer>
    
        <script src="../js/register.js"></script>
      
    </body>
    
    </html>

  ';
} else {
  echo "Employee ID not found.";
}
?>
