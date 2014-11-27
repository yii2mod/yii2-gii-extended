Extended CRUD & Enumerable Generator
==================

This generator generates a controller and views that implement CRUD (Create, Read, Update, Delete) operations for the specified data model.

To use this extension, add to main config in gii section following code:

```php
    'gii' => [
            ...
            'generators' => [
                'enumerable' => [
                    'class' => 'yii2mod\gii\enum\Generator',
                ],
                'crud' => [
                    'class' => 'yii2mod\gii\crud\Generator',
                ],
            ],
        ],
```

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2mod/yii2-gii-extended "*"
```

or add

```json
"yii2mod/yii2-gii-extended": "*"
```

to the require section of your composer.json.
