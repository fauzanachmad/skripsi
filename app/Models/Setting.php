<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'settings';

    protected $dates = [
        'last_sync',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'flask_api_key',
        'last_sync',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getLastSyncAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLastSyncAttribute($value)
    {
        $this->attributes['last_sync'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
