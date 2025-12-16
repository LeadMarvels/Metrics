<?php

namespace LeadMarvels\Metrics\Tests;

use LeadMarvels\Metrics\HasMetrics;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasMetrics;

    protected $guarded = [];
}
