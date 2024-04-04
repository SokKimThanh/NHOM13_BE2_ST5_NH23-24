<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    use HasFactory;
    protected $table = "protype";

    public function products()
    {
        return $this->hasMany(
            Product::class,
            'protype_id'
            /**khoa ngoai */
            ,
            'id'
            /**khoa chinh */
        );
    }
}
