<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "image",
        "board_id",
        "user_id"
    ];

    /**
     * @return HasOne
     */
    public function board(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Board::class);
    }
}
