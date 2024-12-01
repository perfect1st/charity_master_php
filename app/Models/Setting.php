<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='settings';
    protected $fillable = [
        'setting_title_ar',
        'setting_title_en',
        'setting_site_email',
        'setting_keywords',
        'setting_description',
        'setting_site_address_ar',
        'setting_site_address_en',
        'setting_googlemap',
        'setting_googlemap2',
        'setting_facebookurl',
        'setting_twitterurl',
        'setting_googleplusurl',
        'setting_instgramurl',
        'setting_sitetell1',
        'setting_snapchaturl',
        'setting_linkedinurl',
        'setting_youtubeurl',
        'setting_whatsappurl',
        'branch1_ar',
        'branch1_en',
        'branch2_ar',
        'branch2_en',
        'work_time',
        'fast_whatsapp'
    ];
}
