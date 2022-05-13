<div>
    <div>
        <?php $image = "./public/SYSTEM_DEFAULT_AVATAR.png" ?>
    </div>
    <div>
        <div>
            <img src="<?php echo $image ?> " alt="">
        </div>
        <div><?php echo $ROW_USER['name'] ?></div>
        <p><?php echo $ROW['post'] ?></p>
        <p style="font-size: 10px"><?php echo $ROW['date'] ?></p>
    </div>
</div>