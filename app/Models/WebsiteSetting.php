<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $table = 'website_settings';
    protected $fillable = [ 'site_name', 'site_url','site_email', 'site_phone', 'address', 'logo', 'favicon', 'meta_title', 'meta_description', 'meta_keywords', 'og_image', 'facebook', 'twitter', 'instagram','youtube', 'google_analytics_id','footer_text','additional_setting'];
}
