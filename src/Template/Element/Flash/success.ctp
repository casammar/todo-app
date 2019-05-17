<?php
  if (!isset($params['escape']) || $params['escape'] !== false) {
      $message = h($message);
  }
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $message; ?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
