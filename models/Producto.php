<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idproducto
 * @property string|null $SKU
 * @property string|null $nombreProducto
 * @property string|null $descripcionProducto
 * @property float|null $precioLista
 * @property int|null $stock
 * @property int $estado
 * @property string $imagen
 * @property string $precioTienda
 *
 * @property DetalleCotizacion[] $detalleCotizacions
 * @property DetalleNotaVenta[] $detalleNotaVentas
 * @property DetalleOrdenIngreso[] $detalleOrdenIngresos
 * @property FotosProductos[] $fotosProductos
 * @property ProductoDocumentos[] $productoDocumentos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreProducto', 'descripcionProducto', 'imagen', 'precioTienda'], 'string'],
            [['precioLista'], 'number'],
            [['id_categoria'], 'safe'],
            [['stock', 'estado'], 'integer'],
            [['imagen', 'precioTienda'], 'required'],
            [['SKU'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproducto' => 'Idproducto',
            'SKU' => 'Sku',
            'nombreProducto' => 'Nombre Producto',
            'descripcionProducto' => 'Descripcion Producto',
            'precioLista' => 'Precio Lista',
            'stock' => 'Stock',
            'estado' => 'Estado',
            'imagen' => 'Imagen',
            'precioTienda' => 'Precio Tienda',
        ];
    }

 
    // public function getDetalleCotizacions()
    // {
    //     return $this->hasMany(DetalleCotizacion::className(), ['idproducto' => 'idproducto']);
    // }

    
  
    public function getDetalle()
    {
        return $this->hasMany(DetalleNota::className(), ['idproducto' => 'idproducto']);
    }


    // public function getDetalleOrdenIngresos()
    // {
    //     return $this->hasMany(DetalleOrdenIngreso::className(), ['idproducto' => 'idproducto']);
    // }

    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
    public function getFotos()
    {
        return $this->hasMany(FotosProductos::className(), ['idproducto' => 'idproducto']);
    }

  
    // public function getProductoDocumentos()
    // {
    //     return $this->hasMany(ProductoDocumentos::className(), ['idproducto' => 'idproducto']);
    // }
}
