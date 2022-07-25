<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>

<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <title>Hari's Portfolio</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

</head>

<body class="w3-light-grey">

  <!-- Sidebar -->
  <nav class="w3-sidebar w3-bar-block w3-small w3-wide w3-hide-small w3-center">
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>HD</p>
    </a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>ABOUT</p>
    </a>
    <a href="#education" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>EDUCATION</p>
    </a>
    <a href="#skills" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>SKILLS</p>
    </a>
    <a href="#experience" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>EXPERIENCE</p>
    </a>
    <a href="#projects" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>PROJECTS</p>
    </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black">
      <p>CONTACT</p>
    </a>
  </nav>

  <!-- Navbar for small\medium screens -->
  <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="#" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black"
        style="width:25% !important">HD</a>
      <a href="#skills" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black"
        style="width:25% !important">SKILLS</a>
      <a href="#experience" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black"
        style="width:25% !important">EXPERIENCE</a>
      <a href="#projects" class="w3-bar-item w3-button w3-padding-large w3-text-white w3-hover-black"
        style="width:25% !important">PROJECTS</a>
    </div>
  </div>

  <!-- Page Content -->
  <div id="main">
    <!-- Header/Home -->
    <header class="w3-container w3-padding-64 w3-center w3-black w3-text-grey" id="home">
      <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Hari Dinesh.</h1>
      <p class="w3-xxlarge">Full stack developer.</p>
    </header>


    <div class="w3-content w3-justify w3-text-grey w3-padding-64">
      <!-- About Section -->
      <div class="w3-padding-32" id="about">
        <h2 class="w3-xxlarge w3-text-light-black">Hello, my name is Hari</h2>
        <hr style="width:200px; border: 1px solid grey">
        <p>Welcome to my portfolio! I'm a full-stack developer based in Ontario with over half a decade
          experience in development
          and
          testing. Take a look around, and if you have any questions about my work or
          if you are looking for a web developer, please feel free to reach out!
        </p>
      </div>
      <!-- End About Section -->

      <!-- Education -->
      <?php

      $query = 'SELECT * FROM education ORDER BY startDate DESC';
      $result = mysqli_query( $connect, $query );

      ?>
      <div class="w3-padding-32" id="education">
        <h3 class="w3-xxlarge w3-padding-24 w3-text-light-black">My Education</h3>
        <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
        <p><span class="w3-large w3-margin-right"><?php echo $record['program']; ?></span>
        <?php $startDate = date('M Y', strtotime($record['startDate'])); 
                $endDate =  date('M Y', strtotime($record['endDate'])); 
                echo '( ' . $startDate . ' - ' . $endDate . ' ) '; ?></p>
        <p><?php if($record['schoolName'] == 'Anna University'): 
          echo 'Bachelors in Engineering at ' . $record['schoolName'];
        else: echo 'Post Graduate Certicifate at ' . $record['schoolName']; 
        endif; ?>.</p><br>
        <?php endwhile; ?>
      </div>
      <!-- End Education Section -->

      <!-- Skills -->
      <?php

      $query = 'SELECT * FROM skills ORDER BY id ASC';
      $result = mysqli_query( $connect, $query );

      ?>
      <div class="w3-padding-32" id="skills">
        <h3 class="w3-xxlarge w3-padding-16 w3-text-light-black">My Skills</h3>
        <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
        <p class="w3-wide"><?php echo $record['title'] ?></p>
        <div class="w3-white">
          <div class="w3-dark-grey" style="height:28px;width:<?php echo $record['percent'] ?>%"></div>
        </div>
        <?php endwhile; ?><br>
        <button class="w3-button w3-border w3-round  w3-light-grey w3-padding-large w3-section">
          <i class="fa fa-download"></i> Download Resume
        </button>
      </div>
      <!-- End Skills sections -->


      <!-- Experience -->
      <?php

      $query = 'SELECT * FROM employment ORDER BY startDate DESC';
      $result = mysqli_query( $connect, $query );

      ?>
      <div class="w3-padding-32" id="experience">
        <h3 class="w3-xxlarge w3-padding-24 w3-text-light-black">Work Experience</h3>
        <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
        <p><span class="w3-large w3-margin-right"><?php echo $record['title'] ?></span>
        <?php $startDate = date('M Y', strtotime($record['startDate'])); 
                $endDate =  date('M Y', strtotime($record['endDate'])); 
                echo '( ' . $startDate . ' - ' . $endDate . ' ) '; ?></p>
        <p><?php echo $record['companyName'] ?>.</p>
        <p><?php echo $record['description'] ?></p><br>
        <?php endwhile; ?>
      </div>
      <!-- End Experience Section -->

      <!-- Projects -->
      <?php

      $query = 'SELECT * FROM projects ORDER BY id ASC';
      $result = mysqli_query( $connect, $query );

      ?>
      <div class="w3-padding-32" id="projects">
        <h3 class="w3-xxlarge w3-padding-24 w3-text-light-black">My Projects</h3>
        <div class="w3-row-padding" style="margin:0 -16px">
        <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
          <div class="w3-half w3-margin-bottom">
            <ul class="w3-ul w3-white w3-border w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">Project Img</li>
              <li class="w3-padding-16"><?php echo $record['title']?></li>
              <li class="w3-padding-16 w3-opacity"><?php echo $record['usedSkills']?></li>
              <li class="w3-padding-16"><?php echo $record['projectDescription']?></li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black"><a class="buttonlinks" href="#">Visit
                    Website</a></button>
              </li>
            </ul>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <!-- End Projects Section -->
    </div>

    <!-- Contact Section -->
    <?php

      $query = 'SELECT * FROM contact ORDER BY id DESC LIMIT 1';
      $result = mysqli_query( $connect, $query );
      $record = mysqli_fetch_assoc($result);

      ?>
    <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
      <h2 class="w3-xxlarge w3-text-light-black">Contact Me</h2>
      <hr style="width:200px" class="w3-opacity">

      <div class="w3-section">
        <p><i class="fa fa-map-marker fa-fw w3-text-light-black w3-xxlarge w3-margin-right"></i> <?php echo $record['address'] ?></p>
        <p><i class="fa fa-linkedin fa-fw w3-text-light-black w3-xxlarge w3-margin-right"></i>
        <a href="<?php echo $record['url'] ?>">My LinkedIn profile</a>
        </p>
        <p><i class="fa fa-envelope fa-fw w3-text-light-black w3-xxlarge w3-margin-right"> </i> Email:
        <?php echo $record['email'] ?>
        </p>
      </div><br>
      <p>Let's get in touch. Send me a message:</p>

      <form action="/action_page.php" target="_blank">
        <p><input class="w3-input w3-border w3-round w3-padding-16" type="text" placeholder="Name" required name="Name">
        </p>
        <p><input class="w3-input w3-border w3-round w3-padding-16" type="text" placeholder="Email" required
            name="Email"></p>
        <p><input class="w3-input w3-border w3-round w3-padding-16" type="text" placeholder="Subject" required
            name="Subject">
        </p>
        <p><input class="w3-input w3-border w3-round w3-padding-16" type="text" placeholder="Message" required
            name="Message">
        </p>
        <p>
          <button class="w3-button w3-border w3-round w3-light-grey w3-padding-large" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </p>
      </form>
      <!-- End Contact Section -->
    </div>

    <!-- Footer -->
    <?php

      $query = 'SELECT * FROM social_media';
      $result = mysqli_query( $connect, $query );

      ?>
    <footer class="w3-content w3-center w3-padding-64 w3-text-grey w3-xlarge">
    <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
      <i class="fa fa-<?php echo $record['title']; ?> w3-hover-opacity">
      </i>
    <?php endwhile; ?>
      <p class="w3-medium">All rights reserved 2022</p>
      <!-- End footer -->
    </footer>

    <!-- END PAGE CONTENT -->
  </div>

</body>

</html>