<?php include_once "../private/src/views/layout/header.php"; ?>

<div class="container">
    <div class="rows">
        <div class="col-12">
            <h2><?= $pageTitle ?></h2>

            <?php
            var_dump( $products );
            ?>
        </div>
    </div>
</div>

<?php include_once "../private/src/views/contact/form.php"; ?>
<?php include_once "../private/src/views/layout/footer.php"; ?>