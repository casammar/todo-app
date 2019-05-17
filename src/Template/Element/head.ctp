<?php echo $this->Html->charset(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
    <?php echo $cakeDescription ?>
    <?php echo $this->fetch('title'); ?>
</title>
<?php echo $this->Html->meta('icon'); ?>
<!-- STYLES -->
<?php echo $this->Html->css('bootstrap'); ?>
<!-- SCRIPTS -->
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('bootstrap.bundle'); ?>
<?php echo $this->Html->script('custom'); ?>

<?php echo $this->fetch('meta'); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
