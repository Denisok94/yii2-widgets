<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\bootstrap4\Widget;

/**
 * Базовая горизонтальная группировка
 * 
 * ```php
 * echo app\widgets\BlokFiles::widget([
 *  'items' => $items, 
 *  'options' => [
 *      'a' => [], // or 'div' => [],
 *      'img' => [], 
 *      'span' => []]
 * ]);
 * ```
 * options a/img:
 * 
 * ```php
 * $options = [
 *      'url' => '/app/',
 *      'key' => 'id', // items->id
 * ]; // url + key
 * $options = [
 *      'url' => '/app/${key}.png',
 *      'key' => 'id', // items->id
 *      'parse' => true,
 * ]; // url/key.png
 * ```
 * 
 * options span: `['key' => 'id', // items->id]`.
 * 
 * base yii html options add `['options' => []]`.
 * 
 * 
 * ```php
 * echo app\widgets\BlokFiles::widget([
 *  'items' => $items, 
 *  'callback' => function ($action, $item, $key) {
 *      return $action = 'img' ? 'url1' : 'url2';
 *   },
 * ]);
 * ```
 * 
 * @example location full
 * ```php
 * echo app\widgets\BlokFiles::widget([
 *  'items' => $items, 
 *  'options' => [
 *      'a' => [
 *          'url' => '/app/',
 *          'key' => 'id', // items->id
 *      ], 
 *      'img' => [
 *          'url' => '/app/${key}.png',
 *          'key' => 'id', // items->id
 *          'parse' => true,
 *      ],
 *      'span' => [
 *          'key' => 'name', // items->name
 *      ], 
 *  ]
 * ]);
 * ```
 */
class BlokFiles extends Widget
{
    /**
     * @var array 
     */
    public $items = [];

    /**
     * @var array 
     */
    public $options = [];

    /**
     * @var mixed 
     */
    public $callback;

    /**
     * @var mixed 
     */
    public $callback_o;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->items === null) {
            $this->items = [];
        }
        if ($this->callback === null) {
            $this->callback = function ($action, $item, $key) {
                return $this->options[$action]['url'] . $item[$key];
            };
        }
        if ($this->callback_o === null) {
            $this->callback_o = function ($action, $item, $key, $options = null) {
                return $options ?? $this->options[$action]['options'];
            };
        }
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $options = $this->options;
        if (isset($options['a'])) {
            if (isset($options['a']['options'])) {
                $class = $options['a']['options']['class'];
                if (is_array($class)) {
                    $options['a']['options']['class'][] = 'blok';
                } else {
                    $options['a']['options']['class']  .= ' blok';
                }
            } else {
                $options['a']['options'] = [
                    'class' => 'blok'
                ];
            }
        } else if (isset($options['div'])) {
            if (isset($options['div']['options'])) {
                $class = $options['div']['options']['class'];
                if (is_array($class)) {
                    $options['div']['options']['class'][] = 'blok';
                } else {
                    $options['div']['options']['class']  .= ' blok';
                }
            } else {
                $options['div']['options'] = [
                    'class' => 'blok'
                ];
            }
        } else {
            $options['div']['options'] = [
                'class' => 'blok'
            ];
        }

        return $this->render('blok_files', [
            'items' => $this->items,
            'options' => $options,
            'callback' => $this->callback,
            'callback_o' => $this->callback_o
        ]);
    }
}
