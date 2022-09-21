<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalNeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IVA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'rutCliente')->textInput() ?>

    <?= $form->field($model, 'rutUsuario')->textInput() ?>

    <?= $form->field($model, 'mail')->textInput() ?>

    <?= $form->field($model, 'evento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validez')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entrega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'formaDePago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoDeMoneda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idempresa')->textInput() ?>

    <?= $form->field($model, 'leida')->textInput() ?>

    <?= $form->field($model, 'flete')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rutContacto')->textInput() ?>

    <?= $form->field($model, 'idProyecto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
