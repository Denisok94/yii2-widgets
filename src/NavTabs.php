<?php

namespace denisok94\yii2\widgets;

use Yii;
use yii\helpers\Html;
use yii\bootstrap4\Widget;

/**
 * Базовая горизонтальная группировка
 * 
 * ```php
 * echo denisok94\yii2\widgets\NavTabs::widget(['tabs' => [
 *  '12' => [
 *   'label' => 'label 12',
 *   'content' => 'content 12'
 *  ],
 *  '14' => [
 *   'label' => 'label 14',
 *   'content' => 'content 14',
 *   'disabled' => true
 *  ],
 *  //...
 * ]]);
 * ```
 */
class NavTabs extends Widget
{
    /**
     * @var array 
     */
    public $tabs = [
        'tabs_id' => [
            'label' => '',
            'content' => ''
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->tabs === null) {
            $this->tabs = [];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $tab = '';
        $content = '';
        $active = true;
        foreach ($this->tabs as $key => $value) {

            $tab .= Html::tag(
                'li',
                Html::a("<span>" . $value['label'] . "</span>", "#tab_$key", isset($value['disabled']) ? [] : ['data-toggle' => 'tab']),
                ($active ? ['class' => 'active'] : (isset($value['disabled']) ? ['class' => 'disabled'] : []))
            );

            $content .= Html::tag(
                'div',
                isset($value['disabled']) ? '' : $value['content'],
                [
                    'class' => "tab-pane" . ($active ? ' active' : ''),
                    'id' => "tab_$key"
                ]
            );
            $active = false;
        }

        return $this->render('nav_tabs', [
            'tab' => $tab,
            'content' =>  $content
        ]);
    }
}
