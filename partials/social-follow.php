<?php
?>
<ul class="social-follow list-inline">
  <li><a class="facebook" href="<?= $facebook; ?>">Find us on Facebook</a></li>
  <li><a class="twitter" href="<?= $twitter; ?>">Follow us on Twitter</a></li>
  <li><a class="email" href="mailto:<?= $email ; ?>">Email Us</a></li>
  <li><?= Carawebs\Carawebs\Display\Helpers::click_to_call(); ?></li>
</ul>
