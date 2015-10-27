<!-- Not actually used, just referenced -->

<!-- Tristan's Adorable/Gravatar Avatar Script -->
<?php
  $email = $user['username'];
  $emailHash = md5( strtolower( trim( $email ) ) );

  $defaultImageQuery = 'http://api.adorable.io/avatars/200/' . $email;
  $defaultImageQuery = urlencode($defaultImageQuery);

  $gravatarQuery = 'http://www.gravatar.com/avatar/'.$emailHash.'?d='.$defaultImageQuery;
  
  $gravatarImage = '<img height="60px" width="60px" class="img gravatar" src="' . $gravatarQuery . '"/>';

  echo $gravatarImage;
?>