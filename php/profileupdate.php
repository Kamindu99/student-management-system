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
        <title>Student Profile Update</title>
        <link rel="stylesheet" href="../css/register.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="header">
            <div class="header-left1">
                <span>
                    <h4>Student Management System</h4>
                </span>
                <p class="buil">Building Bridges for <br> Study Growth</p>
            </div>
            <div class="header-right1">
    
            <a onclick="logout()" class="btn btn-primary btn-custom me">Log Out</a>
            </div>
        </div>
    
    
        <header>
            <nav>
                <ul class="navigation">
                    <li><a href="last_site.html">Home</a></li>
                    <li><a href="vacancy_page.php">Modules</a></li>
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
    
    
      
    
  <div class="bodycsss">
  <div class="container">
    <div class=" text-center mt-5 ">
      <h1>Student Profile Update</h1>
    </div>

    <div class="row mb-5">
      <div class="col-lg-7 mx-auto">
        <div class="card bodypart mt-2 mx-auto p-4 ">
          <div class="card-body">
            <div class="container">
              <form id="contact-form" role="form"  action="updateprocess.php" method="POST">
                <div class="controls">

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name">Registration ID: *</label>
                        <input id="form_name" type="text" value="'.$compid.'" name="compid" placeholder="Registration ID" class="form-control"
                           required="required" data-error="Registration ID is required.">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Student name: *</label>
                        <input id="form_lastname" type="text" value="'.$compname.'" name="compname" placeholder="Student Name"class="form-control"
                          required="required"
                          data-error="Name is required.">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_email">Email *</label>
                        <input id="form_email" type="email" value="'.$email.'" name="email" class="form-control"
                          placeholder="Please enter your email *" required="required"
                          data-error="Valid email is required.">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Student Address: *</label>
                        <input id="form_lastname" type="text" value="'.$location.'" name="location" placeholder="Student Address" class="form-control"
                          required="required"
                          data-error="Address is required.">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name">Student username: *</label>
                        <input id="form_name" type="text"  value="'.$username.'" name="username" placeholder="username" class="form-control"
                           required="required" data-error="Registration username is required.">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Password: *</label>
                        <input id="form_lastname" type="text"  value="'.$password.'" name="password" placeholder="Student password"class="form-control"
                          required="required"
                          data-error="password is required.">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name">Re-type password: *</label>
                        <input id="form_name" type="text"  value="'.$password.'" name="cnfrmpwd" placeholder="cnfrmpwd" class="form-control"
                           required="required" data-error="Registration cnfrmpwd is required.">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">About the Student: *</label>
                        <input id="form_lastname" type="text" value="'.$description.'" name="description" placeholder="Student description"class="form-control"
                          required="required"
                          data-error="description is required.">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                        " value="Update">
                    </div>

                  </div>

                </div>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
    
    
       
  <footer class="footer">
  <div class="footer-content">
    <h4>About Us</h4>
    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel dui sed lacus commodo posuere.</h6>
  </div>
  <div class="footer-content">
    <h4>Contact Info</h4>
    <h6>Email: info@example.com</h6>
    <h6>Phone: +1 123 456789</h6>
  </div>
  <div class="footer-content search-bar1">
    <h4>Search</h4>
    <form action="#" method="get">
      <input type="text" placeholder="Search..." class="w-50">
      <button type="submit">Search</button>
    </form>
  </div>
  <div class="footer-content">
    <h4>Follow Us</h4>
    <div class="social-media">

    </div>
  </div>
</footer>
    
        <script src="../js/register.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </body>
    
    </html>

  ';
} else {
  echo "Student ID not found.";
}
?>
