<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */

$this->title = $model->idcotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcotizacion' => $model->idcotizacion, 'rutCliente' => $model->rutCliente, 'rutUsuario' => $model->rutUsuario, 'idempresa' => $model->idempresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcotizacion' => $model->idcotizacion, 'rutCliente' => $model->rutCliente, 'rutUsuario' => $model->rutUsuario, 'idempresa' => $model->idempresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcotizacion',
            'fecha',
            'totalNeto',
            'IVA',
            'Total',
            'estado',
            'rutCliente',
            'rutUsuario',
            'mail',
            'evento',
            'validez',
            'entrega',
            'formaDePago',
            'tipoDeMoneda',
            'idempresa',
            'leida',
            'flete',
            'comentarios',
            'rutContacto',
            'idProyecto',
        ],
    ]) ?>

</div>
