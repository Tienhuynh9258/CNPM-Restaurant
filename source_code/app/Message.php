<?php

namespace App;

use App\Models\Clerk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['message', 'userID', 'created_at', 'userName'];


    public function belongsToUser()
    {
        return $this->belongsTo(Clerk::class, 'userID', 'userName');
    }
}
