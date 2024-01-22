<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'extension',
        'url',
        'requirement_id'
    ];

    public function requirement(): BelongsTo
    {
        return $this->belongsTo(Requirement::class);
    }
}
