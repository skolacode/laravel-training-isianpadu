<?php

namespace App\Models\PostModel;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected function description(): Attribute {
        return Attribute::make(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => strtoupper($value)
        );
    }
}
