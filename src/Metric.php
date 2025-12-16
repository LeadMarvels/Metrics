<?php

namespace LeadMarvels\Metrics;

use Carbon\Carbon;
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

    protected static function booted()
    {
        static::created(function ($metric) {
            $metric->update([
                'date_at' => Carbon::create($metric->year, $metric->month, $metric->day),
            ]);
        });
    }

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'date_at' => 'date',
            'year' => 'integer',
            'month' => 'integer',
            'day' => 'integer',
            'value' => 'integer',
        ];
    }
}
