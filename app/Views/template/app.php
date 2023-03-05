<?= $this->include('template/header.php'); ?>
<?= $this->include('template/navbar.php'); ?>
<?= $this->include('template/sidebar.php'); ?>
<?= $this->renderSection('content'); ?>
<?= $this->include('template/footer.php'); ?>
<?= $this->renderSection('js'); ?>