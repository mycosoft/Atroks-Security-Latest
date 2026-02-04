<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafeKeepingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'client_id',
        'shipper_name',
        'item_description',
        'weight',
        'stored_at',
        'qr_code_path',
        'status',
    ];

    protected $casts = [
        'stored_at' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get all status updates for this record.
     */
    public function statusUpdates()
    {
        return $this->hasMany(StatusUpdate::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the latest status update.
     */
    public function latestStatus()
    {
        return $this->hasOne(StatusUpdate::class)->latestOfMany();
    }

    protected static function booted()
    {
        static::creating(function ($record) {
            if (empty($record->reference_number)) {
                // Generate a Ref No similar to WR1927846000200597
                // WR + digits
                $record->reference_number = 'WR'.now()->format('YmdHis').rand(1000, 9999);
            }
            
            // Set default status if not set
            if (empty($record->status)) {
                $record->status = 'Stored';
            }
        });
        
        // Create initial status update when record is created
        static::created(function ($record) {
            $record->statusUpdates()->create([
                'status' => $record->status ?? 'Stored',
                'description' => 'Package received and stored at facility',
                'updated_by' => auth()->id(),
            ]);
        });
    }
}
