<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @package App\Models
 * @property int    $id
 *
 * @property string $loc
 * @property string $type
 * @property string $post_url
 * @property string $video_url
 * @property int    $likes
 * @property int    $comments
 * @property string $views
 * @property string $image_url
 * @property string $caption
 * @property int    $iran_year
 * @property string $iran_month
 * @property string $iran_weekday
 *
 * @property string $gallery
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    const GALLERY_KIA      = 'kia_gold_gallery';
    const GALLERY_PARASTEH = 'parasteh_gold_gallery';
    const GALLERY_SANJAAQ  = 'sanjaaq_gold_gallery';
    const GALLERY_DORIS    = 'doris_gol_gallery';
    const GALLERY_ELI      = 'eli_gold_gallery';
    const GALLERY_KIMIA    = 'kimia_gold_gallery';
    const GALLERY_LAVEEN   = 'loveen_gold_gallery';
    const GALLERY_MAH      = 'mah_gold_gallery';
    const GALLERY_NINA     = 'nina_gold_gallery';
    const GALLERY_RUBY     = 'ruby_gold_gallery';
    const GALLERY_MIO      = 'mio_gold_gallery';
    const GALLERY_DIBA     = 'diba_gold_gallery';
    const GALLERIES        = [
        self::GALLERY_KIA,
        self::GALLERY_PARASTEH,
        self::GALLERY_SANJAAQ,
        self::GALLERY_DORIS,
        self::GALLERY_ELI,
        self::GALLERY_KIMIA,
        self::GALLERY_LAVEEN,
        self::GALLERY_MAH,
        self::GALLERY_NINA,
        self::GALLERY_RUBY,
        self::GALLERY_MIO,
        self::GALLERY_DIBA,
    ];

}
