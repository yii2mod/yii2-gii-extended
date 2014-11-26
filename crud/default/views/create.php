<?php

use yii\helpers\Inflector;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create {modelClass}', ['modelClass' => Inflector::camel2words($generator->getModelNameForView())]) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words($generator->getModelNameForView()))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id($generator->getModelNameForView()) ?>-create">

    <h1><?= "<?php echo " ?>Html::encode($this->title) ?></h1>

    <?= "<?php echo " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
