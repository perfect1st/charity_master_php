<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
class Article extends Model
{
    use HasFactory;
    protected $table='articles';
    protected $fillable = [
        'departement_id',
        'articles_title_ar',
        'articles_title_en',
        'articles_subject_ar',
        'articles_subject_en',
        'articles_isactive',
        'articles_image',
        'articles_image2',
        'articles_date',
        'articles_address_ar',
        'articles_address_en',
        'articles_subject_ar2',
        'articles_subject_en2',
        'articles_keyword',
        'articles_desc',
        'price'
    ];
    public function departement()
    {
        return $this->belongsTo(Department::class,'departement_id','id');
    }
}
