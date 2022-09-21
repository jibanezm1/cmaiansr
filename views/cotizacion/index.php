<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CotizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cotizacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cotizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcotizacion',
            'fecha',
            'totalNeto',
            'IVA',
            'Total',
            //'estado',
            //'rutCliente',
            //'rutUsuario',
            //'mail',
            //'evento',
            //'validez',
            //'entrega',
            //'formaDePago',
            //'tipoDeMoneda',
            //'idempresa',
            //'leida',
            //'flete',
            //'comentarios',
            //'rutContacto',
            //'idProyecto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cotizacion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcotizacion' => $model->idcotizacion, 'rutCliente' => $model->rutCliente, 'rutUsuario' => $model->rutUsuario, 'idempresa' => $model->idempresa]);
                 }
            ],
        ],
    ]); ?>


</div>
