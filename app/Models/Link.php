<?php

namespace App\Models;

use App\Service\LinkService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'link_short', 'redirects_max', 'redirects_current'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::retrieved(function ($link) {
            $link->redirects_current++;
            $link->save();
        });

        static::creating(function ($link) {
            $link->expired_at = Carbon::now()->addHours(request()->hours_max );
            $link->link_short = (new LinkService())->getRandomString();
        });
    }

    public function scopeLinkShort($query, $link)
    {
        return $query->where('link_short', $link);
    }

    public function scopeAvailable($query)
    {
        return $query->where(function($query){
            $query->whereRaw('redirects_current < redirects_max');
            $query->orWhere('redirects_max', 0);
        })
            ->where('expired_at', '>=', now());
    }
}
