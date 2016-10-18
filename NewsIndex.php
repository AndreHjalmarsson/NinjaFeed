<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="NewsfeedStyle.css">
    <title></title>
  </head>
  <body>
    <?php
    include 'NewsData.php'; //Collects arrays with user data.
    include 'NewsFunctions.php'; //Collects functions.
    ?>
  <main>
    <div class="content">
      <h1>Ninja News Feed</h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <span style="color: white">Username:</span> <input type="text" name="username" placeholder="Your name" value="">
    <span style="color: white">Password:</span> <input type="password" name="password" placeholder="Your password" value="">
    <br><br>
    <input type="text" name="postTitle" placeholder="New title..." value=""><br><br>
    <textarea name="postComment" rows="5" cols="40" placeholder="Add a new post..." value=""></textarea><br><br>
    <input type="submit" value="Post"><br><br>
  </form>

  <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $postTitle = $_POST["postTitle"];
    $postComment = $_POST["postComment"];
    $postDate = date("Y-m-d");

    if (
    ($username == $users[0]["Username"] && $password == $users[0]["Password"]) ||
    ($username == $users[1]["Username"] && $password == $users[1]["Password"]) ||
    ($username == $users[2]["Username"] && $password == $users[2]["Password"]) ||
    ($username == $users[3]["Username"] && $password == $users[3]["Password"]) ||
    ($username == $users[4]["Username"] && $password == $users[4]["Password"])  // The condition is set to pair the given username with the corresponding password.
    )
    {

      if ($username == "Danne") {
        $postAuthor = $users[0]["Name"];
        }
        else if ($username == "Tom") {
        $postAuthor = $users[1]["Name"];
        }
        else if ($username == "Mark") {
        $postAuthor = $users[2]["Name"];
        }
        else if ($username == "Samwise") {
        $postAuthor = $users[3]["Name"];
        }
        else if ($username == "Elijah") {
        $postAuthor = $users[4]["Name"];
      }


    if (empty($postComment) || empty($postTitle) ) {
      ?>
    <div class="addedPosts">
    <p>
      <?php
    echo '<span style="font-weight: bold; color: white">' . "Add a title and a comment in order to post." . '</span>';
    ?>
    </p>
    </div>
    <?php
  }
  else {
    ?>
  <div class="formPosts">
    <div class="avatar">
      <?php
      avatars($postAuthor, $users); //Prints the corresponding avatar picture for each added post.
      ?>
    </div>
    <br>
  <p>
    <?php
      posts($postTitle, $postComment, $postAuthor, $postDate); //Prints out form-added topics.
    ?>
  </p>
  <button type="button"><?php echo "Likes: 5" ?></button>
  </div>
  <?php
      }
    }
  else {
    echo '<span style="font-weight: bold; color: white">' . "Wrong Username or Password, try again" . '</span>';
    }
  }
  foreach ($posts as $post) {
    ?>
        <div class="posts">
          <div class="avatar">
            <?php
            avatars($post["Author"], $users); //Prints the corresponding avatar picture for each fixed post.
            ?>
          </div><br>
          <p>
            <?php
            posts($post["Title"], $post["Text"], $post["Author"], $post["Date"]); //Prints out fixed posts.
             ?>
          </p>
          <button type="button"><?php echo "Likes: 5" ?></button>
          <br><br>
        </div>
        <?php
      }
         ?>
       </div>
  </main>
</body>
</html>
