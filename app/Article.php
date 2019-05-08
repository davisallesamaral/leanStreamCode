<?php
namespace leanStreamTest;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = ['source_id','author','title','description','url','urlToImage','publishedAt','content'];

    public function source(){
        return $this->belongsTo('leanStreamTest\Source');
    }


}
