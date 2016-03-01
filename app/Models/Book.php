<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'book_id';

    protected $fillable = ['isbn', 'book_title', 'publisher', 'filepath'];


}
