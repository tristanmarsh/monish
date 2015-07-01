<?php
$class = 'alert alert-info';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-info alert-dismissible <?= h($class) ?>" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error! </strong><?= h($message) ?>
</div>