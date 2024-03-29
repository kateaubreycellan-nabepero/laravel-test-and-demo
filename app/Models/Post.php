<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    // For mass data assignment
    protected $fillable = [
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
