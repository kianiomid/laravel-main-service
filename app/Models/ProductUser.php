<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    use HasFactory;

    const TABLE = "product_user";

    protected $guarded = ['id'];

    protected $table = self::TABLE;
}
