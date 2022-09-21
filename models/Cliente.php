<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $rutCliente
 * @property string|null $nombreCliente
 * @property string|null $direccionCliente
 * @property string|null $giroCliente
 * @property string|null $telefonoCliente
 * @property string|null $regionCliente
 * @property string|null $comunaCliente
 * @property string|null $correoCliente
 *
 * @property Cotizacion[] $cotizacions
 * @property NotaVenta[] $notaVentas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rutCliente'], 'required'],
            [['rutCliente'], 'integer'],
            [['nombreCliente', 'direccionCliente', 'giroCliente'], 'string', 'max' => 300],
            [['telefonoCliente'], 'string', 'max' => 45],
            [['regionCliente', 'comunaCliente', 'correoCliente'], 'string', 'max' => 100],
            [['rutCliente'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rutCliente' => 'Rut Cliente',
            'nombreCliente' => 'Nombre Cliente',
            'direccionCliente' => 'Direccion Cliente',
            'giroCliente' => 'Giro Cliente',
            'telefonoCliente' => 'Telefono Cliente',
            'regionCliente' => 'Region Cliente',
            'comunaCliente' => 'Comuna Cliente',
            'correoCliente' => 'Correo Cliente',
        ];
    }

    /**
     * Gets query for [[Cotizacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['rutCliente' => 'rutCliente']);
    }

    /**
     * Gets query for [[NotaVentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotaVentas()
    {
        return $this->hasMany(NotaVenta::className(), ['rutCliente' => 'rutCliente']);
    }
}
