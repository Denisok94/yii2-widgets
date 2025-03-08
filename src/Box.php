<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\bootstrap4\Widget;

/**
 *
 */
class Box extends Widget
{
    /**
     * @var string 
     * solid / default / primary / success / warning / danger / info
     */
    public $type = 'solid';

    /**
     * рамка
     * @var bool 
     */
    public $solid = false;

    /**
     * @var string 
     */
    public $title;

    /**
     * @var string 
     */
    public $header;

    /**
     * Кнопки
     * @var string 
     */
    public $tools;

    /**
     * Кнопка свертывания
     * @var bool 
     */
    public $collapse = false;

    /**
     * Кнопка закрытия
     * @var bool 
     */
    public $remove = false;

    /**
     * @var string 
     */
    public $body;

    /**
     * @var string 
     */
    public $footer;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        // $this->initOptions();

        echo Html::beginTag('div', ['class' => "box box-" . $this->type . ($this->solid ? ' box-solid' : '')]) . "\n";
        echo $this->renderHeader() . "\n";
        echo $this->renderBodyBegin() . "\n";
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo "\n" . $this->renderBodyEnd();
        echo "\n" . $this->renderFooter();
        echo "\n" . Html::endTag('div');
        return '';
    }

    /**
     * Renders the header HTML markup of the modal
     * @return string the rendering result
     */
    protected function renderHeader()
    {
        if ($this->title !== null ||  $this->header !== null) {
            return  Html::tag(
                'div',
                $this->render('box_header', [
                    'title' => $this->title,
                    'header' => $this->header,
                    'tools' => $this->tools,
                    'collapse' => $this->collapse,
                    'remove' => $this->remove,
                ]),
                ['class' => "box-header with-border"]
            );
        } else {
            return null;
        }
    }

    /**
     * Renders the opening tag of the modal body.
     * @return string the rendering result
     */
    protected function renderBodyBegin()
    {
        return Html::beginTag('div', ['class' => "box-body"]);
    }

    /**
     * Renders the closing tag of the modal body.
     * @return string the rendering result
     */
    protected function renderBodyEnd()
    {
        return Html::endTag('div');
    }

    /**
     * Renders the HTML markup for the footer of the modal
     * @return string the rendering result
     */
    protected function renderFooter()
    {
        if ($this->footer !== null) {
            return Html::tag('div', $this->footer, ['class' => "box-footer"]);
        } else {
            return null;
        }
    }
}
