<?php

namespace LeadMarvels\Metrics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metric extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The factory for the model.
     */
    protected static string $factory = MetricFactory::class;

    public function measurable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param mixed $query
     */
    public function newEloquentBuilder($query): MetricBuilder
    {
        return new MetricBuilder($query);
    }

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'month' => 'integer',
            'day' => 'integer',
            'hour' => 'integer',
            'value' => 'integer',
        ];
    }
}
