<?php
$record = selectSingle(5);
$welcome = 'Welcome, '.$record['resource_title']
?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
    <?php echo $_SESSION['message']['msg']; ?>
</div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                [LOGO]
</div>
</div>
<div class="col-md-8">
<nav>
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="create.php">Create</a></li>
</ul>
</nav>
</div>
