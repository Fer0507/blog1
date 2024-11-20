<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Habilitamos la asignación masiva para estos atributos
    protected $fillable = ['title', 'description', 'image'];
}
