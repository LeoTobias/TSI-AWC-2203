<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'matricula',
                            'nome'];

    protected $table = 'vendedores';

    public function getVenda()
    {
        return $this->hasMany( Vendas::class, 'id');
    }
}
