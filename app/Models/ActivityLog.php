<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['user_id', 'action', 'message', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function log($action, $message)
    {
        self::create([
            'user_id'    => auth()->id(),
            'action'     => $action,
            'message'    => $message,
            'ip_address' => request()->ip(),
        ]);
    }
}
