<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategoria extends Model
{
    use HasFactory;

    public $table = "kategoriak";
    public $timestamps = false;

    public $fillable = ["name", "color"];

    //public function elems(): HasMany
    //{
    //    return $this->hasMany(Elem::class);
    //}
}