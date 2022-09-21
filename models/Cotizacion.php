<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property int $idcotizacion
 * @property string|null $fecha
 * @property float|null $totalNeto
 * @property float|null $IVA
 * @property float|null $Total
 * @property int|null $estado
 * @property int $rutCliente
 * @property int $rutUsuario
 * @property int|null $mail
 * @property string|null $evento
 * @property string|null $validez
 * @property string|null $entrega
 * @property string|null $formaDePago
 * @property string|null $tipoDeMoneda
 * @property int $idempresa
 * @property int $leida
 * @property string $flete
 * @property string $comentarios
 * @property int $rutContacto
 * @property int|null $idProyecto
 *
 * @property DetalleCotizacion[] $detalleCotizacions
 * @property Empresa $idempresa0
 * @property Cliente $rutCliente0
 * @property Usuario $rutUsuario0
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['totalNeto', 'IVA', 'Total'], 'number'],
            [['estado', 'rutCliente', 'rutUsuario', 'mail', 'idempresa', 'leida', 'rutContacto', 'idProyecto'], 'integer'],
            [['rutCliente', 'rutUsuario', 'idempresa', 'flete', 'comentarios', 'rutContacto'], 'required'],
            [['evento', 'validez', 'flete'], 'string', 'max' => 300],
            [['entrega', 'tipoDeMoneda', 'comentarios'], 'string', 'max' => 500],
            [['formaDePago'], 'string', 'max' => 45],
            [['idempresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['idempresa' => 'idempresa']],
            [['rutCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['rutCliente' => 'rutCliente']],
            [['rutUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['rutUsuario' => 'rutUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcotizacion' => 'Idcotizacion',
            'fecha' => 'Fecha',
            'totalNeto' => 'Total Neto',
            'IVA' => 'Iva',
            'Total' => 'Total',
            'estado' => 'Estado',
            'rutCliente' => 'Rut Cliente',
            'rutUsuario' => 'Rut Usuario',
            'mail' => 'Mail',
            'evento' => 'Evento',
            'validez' => 'Validez',
            'entrega' => 'Entrega',
            'formaDePago' => 'Forma De Pago',
            'tipoDeMoneda' => 'Tipo De Moneda',
            'idempresa' => 'Idempresa',
            'leida' => 'Leida',
            'flete' => 'Flete',
            'comentarios' => 'Comentarios',
            'rutContacto' => 'Rut Contacto',
            'idProyecto' => 'Id Proyecto',
        ];
    }

    /**
     * Gets query for [[DetalleCotizacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleCotizacions()
    {
        return $this->hasMany(DetalleCotizacion::className(), ['idcotizacion' => 'idcotizacion']);
    }

    /**
     * Gets query for [[Idempresa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdempresa0()
    {
        return $this->hasOne(Empresa::className(), ['idempresa' => 'idempresa']);
    }

    /**
     * Gets query for [[RutCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutCliente0()
    {
        return $this->hasOne(Cliente::className(), ['rutCliente' => 'rutCliente']);
    }

    /**
     * Gets query for [[RutUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['rutUsuario' => 'rutUsuario']);
    }
}
