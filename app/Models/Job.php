<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'location',
        'date_applied',
        'status',
        'source_link',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
