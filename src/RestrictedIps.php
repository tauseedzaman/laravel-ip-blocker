<?php

namespace tauseedzaman\LaravelIpLocationBlock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestrictedIps extends Model
{
    protected $fillable=['ip_address'];
    use HasFactory;
}
