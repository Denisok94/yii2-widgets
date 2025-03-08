<?= $title ? '<h3 class="box-title">' . $title . '</h3>' : '' ?>
<?= $header ?>
<?php if ($tools || $collapse || $remove) { ?>
    <div class="box-tools pull-right">
        <?= $tools ?>
        <?php if ($collapse) { ?>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        <?php } ?>
        <?php if ($remove) { ?>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
            </button>
        <?php } ?>
    </div>
<?php } ?>