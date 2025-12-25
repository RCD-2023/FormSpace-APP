<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Entry extends Model
{
    //
    use HasFactory;
    //
    protected $table = 'all_entries';
    protected $casts = [
        'business_type' => 'array',
    ];
    protected static function booted()
    {
        static::creating(function ($entry) {
            if (!empty($entry->local_id)) {
                return;
            }

            do {
                // 4 litere + 2 cifre
                $entry->local_id = Str::upper(Str::random(4)) . str_pad((string) random_int(0, 99), 2, '0', STR_PAD_LEFT);
            } while (self::where('local_id', $entry->local_id)->exists());
        });
    }
    protected $fillable = [
        'user_id',
        'local_id',
        'vendor_name',
        'vendor_desc',
        'v_email',
        'v_website',
        'v_country',
        'v_city',
        'v_address',
        'organisation_type',
        'employee_num',
        'business_type',
        'updated_by',
    ];
    //metode pentru relationship (relation to user)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function edited_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
