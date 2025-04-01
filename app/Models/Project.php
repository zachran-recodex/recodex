<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'title',
        'category',
        'description',
        'image',
        'start_date',
        'end_date',
        'cost',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'cost' => 'decimal:0',
    ];

    const STATUS_PENDING = 'pending';

    const STATUS_IN_PROGRESS = 'in_progress';

    const STATUS_COMPLETED = 'completed';

    const STATUS_CANCELLED = 'cancelled';

    const STATUS_ON_HOLD = 'on_hold';

    /**
     * Get all available project status options with display labels.
     *
     * @return array<string, string> Array of status codes mapped to their display labels
     */
    public static function getStatusOptions()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_ON_HOLD => 'On Hold',
        ];
    }

    /**
     * Get the client that owns this project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the human-readable status label based on current status code.
     *
     * @return string Formatted status label
     */
    public function getStatusLabelAttribute()
    {
        return self::getStatusOptions()[$this->status] ?? $this->status;
    }

    /**
     * Get the cost formatted with Indonesian currency format.
     *
     * @return string Formatted cost with Rupiah symbol
     */
    public function getFormattedCostAttribute()
    {
        return 'Rp ' . number_format($this->cost, 0, ',', '.');
    }

    /**
     * Calculate project duration in days between start and end dates.
     *
     * @return int|null Number of days between start and end dates, or null if end date not set
     */
    public function getDurationAttribute()
    {
        if (!$this->end_date) {
            return null;
        }

        return $this->start_date->diffInDays($this->end_date);
    }
}
