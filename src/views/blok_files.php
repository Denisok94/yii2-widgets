<?php

use denisok94\helper\Helper as H;
use yii\helpers\Html;


/* @var $items object */

$img = $options['img'];
$span = $options['span'];

?>
<div class="blok-files">
    <div class="blok-list">
        <?php foreach ($items as $item) {
            $item_img = Html::img(
                isset($img['parse']) ? H::parse($img['url'], ['key' => $item[$img['key']]]) : $callback('img', $item, $img['key']),
                (isset($img['options']) ? $callback_o('img', $item, $img['key'], $img['options']) : $callback_o('img', $item, $img['key'], ['alt' => $item[$img['key']]]))
            );

            $item_span = Html::tag(
                'span',
                $callback('span', $item, $span['key']),
                ($span['options'] ?? [])
            );
            if (isset($options['a'])) {
                $a = $options['a'];
                echo Html::a(
                    $item_img . $item_span,
                    isset($a['parse']) ? H::parse($a['url'], ['key' => $item[$a['key']]]) : $callback('a', $item, $a['key']),
                    (isset($a['options']) ? $callback_o('a', $item, $a['key'], $a['options']) : $callback_o('a', $item, $a['key'], ['alt' => $item[$a['key']]]))
                );
            } else if (isset($options['div'])) {
                $div = $options['div'];
                echo Html::tag(
                    'div',
                    $item_img . $item_span,
                    $div['options']
                );
            }
        } ?>
    </div>
</div>