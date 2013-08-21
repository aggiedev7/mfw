<?php require('includes/config.php');

	$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['id']));
	$row = $stmt->fetch();

	if($row['postID'] == ''){
		header('Location: ./');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['postTitle'];?></title>
	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<?php
		echo '<div>';
		echo '<h1>'.$row['postTitle'].'</h1>';
		echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
		echo '<p>'.$row['postCont'].'</p>';
	echo '</div>';
	?>
</body>
</html>