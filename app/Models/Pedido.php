<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pedido
 *
 * @package App
 * @property string $empresa
 * @property string $nombre
 * @property string $telefono
 * @property string $email
 * @property enum $tipo_de_producto
 * @property text $comentarios
*/
class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable = ['empresa', 'nombre', 'telefono', 'email', 'tipo_de_producto', 'comentarios','pais','viewed'];
    

    public static $enum_tipo_de_producto = ["Equipo" => "Equipo", "Insumo" => "Insumo", "Reactivo" => "Reactivo"];
    
}
