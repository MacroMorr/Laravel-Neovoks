<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Messages extends Model
{
    public function escapeString(string $string): string
    {
        return str_replace('\'', '\'\'', stripslashes($string));
    }
}

