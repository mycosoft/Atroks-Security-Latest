<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'safe_keeping_record_id',
        'status',
        'description',
        'notes',
        'updated_by',
    ];

    /**
     * Get the safe keeping record that owns the status update.
     */
    public function safeKeepingRecord()
    {
        return $this->belongsTo(SafeKeepingRecord::class);
    }

    /**
     * Get the user who created this status update.
     */
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
