<?php $noterrors = array(); ?>

<?php if (count($noterrors) > 0) :?>
    <div class ="noterror">
        <?php foreach ($noterrors as $noterror) :?>
            <p><?php echo $noterror?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>