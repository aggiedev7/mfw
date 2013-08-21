<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text.html; charset =utf-8"/>
  <title>Test Blog</title>
  <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>
<body>
  <div id="nav">
    <ul>
      <li class"logo"><h2>Test Website</h2></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
<div class="grid grid-pad">
  <div class="col-2-3">
    <div id="main">
      <?php
        try{
          $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
          while($row = $stmt->fetch()){
            echo '<div>';
              echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
              echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
              echo '<p>'.$row['postDesc'].'</p>';
              echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
              echo '</div>';
          }
        } catch(PDOException $e){
          echo $e->getMessage();
        }
      ?>
    </div>
  </div>
  <div class="col-1-3">
    <div id="sidebar">
      <h3>Links</h3>
      <ul>
        <li><a href="#">Website 1</a></li>
        <li><a href="#">Website 2</a></li>
        <li><a href="#">Website 3</a></li>
      </ul>
      <h3>About</h3>
      <p>Nam pellentesque fermentum nulla eget interdum. Suspendisse vel ligula a nibh pulvinar ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed sit amet libero a massa consectetur auctor.</p>
    </div>
  </div>
</div>
<div id="footer">
    <p>Typical footer stuff should go here...</p>
  </div>
</body>
</html>