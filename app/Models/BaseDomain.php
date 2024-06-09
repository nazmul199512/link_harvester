<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseDomain extends Model
{
    use HasFactory;

    protected $fillable = ['domain_name'];

    public function urls()
    {
        return $this->hasMany(Url::class);
    }
}
