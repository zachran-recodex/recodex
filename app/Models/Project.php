<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
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
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'cost' => 'decimal:2',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_ON_HOLD = 'on_hold';

    /**
     * Get list of all available statuses.
     *
     * @return array<string>
     */
    public static function getStatusList(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED,
            self::STATUS_ON_HOLD,
        ];
    }

    /**
     * Get the client that owns the project.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get project duration in a human-readable format.
     */
    public function getDurationAttribute()
    {
        $startDate = Carbon::parse($this->start_date);

        if (!$this->end_date) {
            return 'Ongoing';
        }

        $endDate = Carbon::parse($this->end_date);
        $days = $startDate->diffInDays($endDate);

        if ($days < 30) {
            return $days . ' days';
        }

        $months = $startDate->diffInMonths($endDate);
        $remainingDays = $days % 30;

        if ($months < 12) {
            return $months . ' months' . ($remainingDays > 0 ? ' ' . $remainingDays . ' days' : '');
        }

        $years = $startDate->diffInYears($endDate);
        $remainingMonths = $months % 12;

        return $years . ' years' . ($remainingMonths > 0 ? ' ' . $remainingMonths . ' months' : '');
    }

    /**
     * Get formatted status for display.
     *
     * @return string
     */
    public function getFormattedStatusAttribute(): string
    {
        return str_replace('_', ' ', ucfirst($this->status));
    }
}
