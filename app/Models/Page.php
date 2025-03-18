<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = ['title', 'content'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($page) {
            $page->uuid = Str::uuid();
        });
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}