# Yii2 widgets

Набор виджетов для yii2 на базе yii\bootstrap4\Widget

## Installation

Run:

```bash
composer require --prefer-dist denisok94/yii2-widgets
# or
php composer.phar require --prefer-dist denisok94/yii2-widgets
```

or add to the `require` section of your `composer.json` file:

```json
"denisok94/yii-helper": "*"
```

```bash
composer update
# or
php composer.phar update
```

## Use

### NavTabs

```php
use denisok94\yii2\widgets\NavTabs;
echo NavTabs::widget(['tabs' => [
 '12' => [
  'label' => 'label 12',
  'content' => 'content 12'
 ],
 '14' => [
  'label' => 'label 14',
  'content' => 'content 14',
  'disabled' => true
 ],
 //...
]])
echo NavTabs::widget(['tabs' => [
    'overview' => [
        'label' => 'Обзор',
        'content' => $this->render('_overview', [
            'model' => $model,
        ])
    ],
    'story' => [
        'label' => 'История',
        'content' => $this->render('_story', [
            'model' => $model,
        ])
    ],
    'outfit' => [
        'label' => 'Одежда',
        'content' => $this->render('_outfit', [
            'model' => $model,
        ]),
        'disabled' => true
    ],
]]);
```

### BlokFiles

Базовая горизонтальная группировка

```php
echo denisok94\yii2\widgets\BlokFiles::widget([
 'items' => $items, 
 'options' => [
     'a' => [], // or 'div' => [],
     'img' => [], 
     'span' => []]
]);
```
options a/img:

```php
$options = [
     'url' => '/app/',
     'key' => 'id', // items->id
]; // url + key
$options = [
     'url' => '/app/${key}.png',
     'key' => 'id', // items->id
     'parse' => true,
]; // url/key.png
```

options span: `['key' => 'id', // items->id]`.

base yii html options add `['options' => []]`.


```php
echo denisok94\yii2\widgets\BlokFiles::widget([
 'items' => $items, 
 'callback' => function ($action, $item, $key) {
     return $action = 'img' ? 'url1' : 'url2';
  },
]);
```

location full
```php
echo denisok94\yii2\widgets\BlokFiles::widget([
 'items' => $items, 
 'options' => [
     'a' => [
         'url' => '/app/',
         'key' => 'id', // items->id
     ], 
     'img' => [
         'url' => '/app/${key}.png',
         'key' => 'id', // items->id
         'parse' => true,
     ],
     'span' => [
         'key' => 'name', // items->name
     ], 
 ]
]);
```

### Box

```php
<?php Box::begin(); ?>
<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
</blockquote>
<?php Box::end(); ?>
```
