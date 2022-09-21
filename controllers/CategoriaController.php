<?php

namespace app\controllers;

use app\models\Categoria;
use app\models\CategoriaSearch;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller
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
     * Lists all Categoria models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCheckout()
    {
     
        
        return $this->render('checkout', [
            // 'model' => $model
        ]);
    }

    public function actionCargar($page, $categoria)
    {

        $perpage = 3;

        $posisi = (($page - 1) * $perpage);
        $productos = Producto::find()
            ->limit($perpage)
            ->offset($posisi)
            ->orderBy(['nombreProducto' => SORT_ASC])
            ->where(["id_categoria" => $categoria])
            ->all();


        return $this->renderAjax(
            'siguiente',
            [
                'productos' => $productos,

            ]
        );
    }
    public function actionCargarq($page, $q)
    {

        $perpage = 3;

        $posisi = (($page - 1) * $perpage);
        $productos = Producto::find()
            ->limit($perpage)
            ->offset($posisi)
            ->orderBy(['nombreProducto' => SORT_ASC])
            ->where(["like","nombreProducto",$q])
            ->all();


        return $this->renderAjax(
            'siguiente',
            [
                'productos' => $productos,

            ]
        );
    }

    /**
     * Displays a single Categoria model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionDetalle($id)
    {
        $model = Producto::find()->joinWith('fotos')->where(["producto.idproducto" => $id])->one();
        return $this->render('detalle', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Categoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Categoria();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categoria::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionAgregar($id, $cantidad)
    {

        $idLocal = 5;
        $product = Producto::find()->where(["idproducto" => $id])->one();

        $cart = \Yii::$app->cart;

        $valid = $cart->getItem($id);
        if ($valid) {
            $cart->plus($product->idproducto, $cantidad);
        } else {

            $cart->add($product, $cantidad);
        }

        return $this->renderAjax(
            'carrito'
        );
    }

    public function actionEliminar($id)
    {

        $cart = \Yii::$app->cart;
        if ($cart->remove($id)) {
            return $this->renderAjax(
                'carrito'
            );
        } else {
            return $this->renderAjax(
                'carrito'
            );
        }
    }


    public function actionContar()
    {
        return $this->renderAjax(
            'contador'
        );
    }
}