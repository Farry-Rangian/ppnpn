<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable = [ 'user_id','check_in', 'check_out'];

    public static function storePresensi($data)
    {
        return self::create([
            'user_id' => $data['user_id'],
            'check_in' => now(),
            'check_out' => now(),
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
