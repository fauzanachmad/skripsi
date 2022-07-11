<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleSet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const METHOD_SELECT = [
        'scrape' => 'Scrape',
        'csv'    => 'CSV',
    ];

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'deactive' => 'Deactive',
    ];

    public $table = 'article_sets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'method',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
