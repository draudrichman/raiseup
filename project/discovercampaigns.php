<?php 
   require 'config.php';
  if(empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    header("Location: signinup.php");
  }

  $sql = 'SELECT campaignID, title, description, goalAmount, createdAt, currency, image FROM campaign';

  $result = mysqli_query($conn, $sql);

  $campaigns = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="discovercampaigns.css">
    <title>Discover Campaigns</title>
    <title></title>
</head>

<body>
      <?php include('header-footer/headeruser.php'); ?>


    <div class="content-wrapper">

  <?php foreach($campaigns as $campaign){ ?>
    <div class="news-card">
    <a href="campaigndetails.php?campaignID=<?php echo $campaign['campaignID']; ?>" class="news-card__card-link"></a>

    <img src="<?php  echo htmlspecialchars($campaign['image']); ?>" alt="" class="news-card__image">
    <div class="news-card__text-wrapper">
      <h2 class="news-card__title"><?php  echo htmlspecialchars($campaign['title']); ?></h2>
      <p class="card__text"><?php echo htmlspecialchars($campaign['currency'] . $campaign['goalAmount']); ?></p>
      <div class="news-card__post-date"><?php echo date('M d, Y', strtotime($campaign['createdAt'])); ?></div>
      <div class="news-card__details-wrapper">
        <p class="news-card__excerpt"><?php echo htmlspecialchars(substr($campaign['description'], 0, 200)) . '...'; ?></p>
        <a href="campaigndetails.php?campaignID=<?php echo $campaign['campaignID']; ?>" class="news-card__read-more">Support <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>
  <?php } ?>


</div>

</body>
</html>