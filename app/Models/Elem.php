<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Elem extends Model
{
    public $table = "elemek";

    public $fillable = ["description", "category", "done"];

    public function category(): BelongsTo
    {
        return $this->belongsto(Kategoria::class, "category", "id");
    }
}