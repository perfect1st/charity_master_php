<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;


class Donate extends Model
{
    use HasFactory;
    protected $table='donates';
    protected $fillable = [
        'articleID',
        'transactionID',
        'userID',
        'notes',
        'amount'
    ];

    // Define the relationship
    public function article()
    {
        return $this->belongsTo(Article::class, 'articleID', 'id'); // 'articleID' is the foreign key, 'id' is the primary key in the related table
    }

}
