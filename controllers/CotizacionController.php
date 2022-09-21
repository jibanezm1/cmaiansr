<?php

namespace app\controllers;

use app\models\Cliente;
use app\models\Cotizacion;
use app\models\CotizacionSearch;
use app\models\DetalleCotizacion;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CotizacionController implements the CRUD actions for Cotizacion model.
 */
class CotizacionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cotizacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CotizacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cotizacion model.
     * @param int $idcotizacion Idcotizacion
     * @param int $rutCliente Rut Cliente
     * @param int $rutUsuario Rut Usuario
     * @param int $idempresa Idempresa
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcotizacion, $rutCliente, $rutUsuario, $idempresa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcotizacion, $rutCliente, $rutUsuario, $idempresa),
        ]);
    }

    /**
     * Creates a new Cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cotizacion();
        // var_dump();die();
        if ($this->request->isGet) {
            $cart = \Yii::$app->cart;
            if ($cart && Yii::$app->request->get()["correo"]) {
                $max = Cliente::find()->max('rutCliente');
                $cliente = new Cliente();
                $cliente->rutCliente = $max + 1;
                $cliente->nombreCliente = Yii::$app->request->get()["nombre"];
                $cliente->correoCliente = Yii::$app->request->get()["correo"];
                $cliente->direccionCliente = Yii::$app->request->get()["direccion"];
                $cliente->telefonoCliente = Yii::$app->request->get()["telefono"];
                $cliente->regionCliente = 7;
                $cliente->comunaCliente = 127;
                $cliente->giroCliente = " ";
                if ($cliente->save(false)) {
                    $cotizacion = new Cotizacion();
                    $cotizacion->totalNeto = 0;
                    $cotizacion->IVA = 0;
                    $cotizacion->Total = 0;
                    $cotizacion->estado = 1;
                    $cotizacion->rutCliente = $cliente->rutCliente;
                    $cotizacion->rutUsuario = 1;
                    $cotizacion->mail = $cliente->correoCliente;
                    $cotizacion->evento = " ";
                    $cotizacion->validez = " ";
                    $cotizacion->entrega = " ";
                    $cotizacion->formaDePago = " ";
                    $cotizacion->tipoDeMoneda = 1;
                    $cotizacion->idempresa = 1;
                    $cotizacion->leida = 1;
                    $cotizacion->flete = " ";
                    $cotizacion->comentarios = Yii::$app->request->get()["comentario"];
                    $cotizacion->rutContacto = $cliente->rutCliente;
                    $cotizacion->idProyecto = 1;

                    if ($cotizacion->save(false)) {

                        foreach ($cart->getItems() as $i) {
                            $detalle = new DetalleCotizacion();
                            $detalle->idproducto = $i->getProduct()->idproducto;
                            $detalle->cantidad = $i->getQuantity();
                            $detalle->tiempo = " ";
                            $detalle->precio = 0;
                            $detalle->iva = 0;
                            $detalle->total = 0;
                            $detalle->idcotizacion = $cotizacion->idcotizacion;

                            if ($detalle->save(false)) {
                                $cart->clear();
                            }
                        }
                        return 1;
                    } else {
                        return 2;
                    }
                } else {
                    return 2;
                }
            }
        } else {
            return 2;
        }
    }

    /**
     * Updates an existing Cotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcotizacion Idcotizacion
     * @param int $rutCliente Rut Cliente
     * @param int $rutUsuario Rut Usuario
     * @param int $idempresa Idempresa
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcotizacion, $rutCliente, $rutUsuario, $idempresa)
    {
        $model = $this->findModel($idcotizacion, $rutCliente, $rutUsuario, $idempresa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcotizacion' => $model->idcotizacion, 'rutCliente' => $model->rutCliente, 'rutUsuario' => $model->rutUsuario, 'idempresa' => $model->idempresa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cotizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcotizacion Idcotizacion
     * @param int $rutCliente Rut Cliente
     * @param int $rutUsuario Rut Usuario
     * @param int $idempresa Idempresa
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcotizacion, $rutCliente, $rutUsuario, $idempresa)
    {
        $this->findModel($idcotizacion, $rutCliente, $rutUsuario, $idempresa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcotizacion Idcotizacion
     * @param int $rutCliente Rut Cliente
     * @param int $rutUsuario Rut Usuario
     * @param int $idempresa Idempresa
     * @return Cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcotizacion, $rutCliente, $rutUsuario, $idempresa)
    {
        if (($model = Cotizacion::findOne(['idcotizacion' => $idcotizacion, 'rutCliente' => $rutCliente, 'rutUsuario' => $rutUsuario, 'idempresa' => $idempresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
