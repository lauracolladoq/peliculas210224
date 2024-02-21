<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'sinopsis', 'caratula', 'disponible', 'category_id'];

    //Relación N:M con tags
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relación 1:N con categories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //Accessors y mutators
    public function titulo(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v)
        );
    }

    public function sinopsis():Attribute{
        return Attribute::make(
            set: fn($v) => ucfirst($v)
        );
    }
}
