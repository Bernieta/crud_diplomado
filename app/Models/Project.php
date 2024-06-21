<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'start-date', 'end-date','value', 'location', 'status', 'id_user'];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
