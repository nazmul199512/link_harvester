<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'base_domain_id'];

    public function baseDomain()
    {
        return $this->belongsTo(BaseDomain::class);
    }
}
