<?php

function avatars($person, $picture) {
  if ($person == "Daniel Lewis") {
    echo $picture[0]["Avatar"];
    }
    else if ($person == "Tom Cruise") {
      echo $picture[1]["Avatar"];
    }
    else if ($person == "Mark Wahlberg") {
      echo $picture[2]["Avatar"];
    }
    else if ($person == "Samwise Gamgee") {
      echo $picture[3]["Avatar"];
    }
    else if ($person == "Elijah Wood") {
      echo $picture[4]["Avatar"];
  }
}


function posts($title, $comment, $name, $date) {
  echo '<b>' . $title . '</b>' . "<br><br>" .
  $comment . "<br>" . "-" . "<br>" . '<i>' .
  $name . "<br>" . '<small>' .
  $date . '</small>' . '</i>' . "<br><br>";
}

?>
