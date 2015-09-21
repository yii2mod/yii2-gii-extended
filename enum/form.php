<?php
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var yii\gii\generators\controller\Generator $generator
 */
echo $form->field($generator, 'enumerableClass');
echo $form->field($generator, 'ns');
echo $form->field($generator, 'author');
echo $form->field($generator, 'description')->textarea(['style' => 'resize:vertical']);
echo $form->field($generator, 'constValues')->textarea(['style' => 'resize:vertical']);
echo $form->field($generator, 'start')->label('Start numbers from');
echo $form->field($generator, 'sort')->checkbox(['label' => 'Sort values']);
echo $form->field($generator, 'enableI18N')->checkbox();
echo $form->field($generator, 'messageCategory');

