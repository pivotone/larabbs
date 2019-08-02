<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/2
 * Time: 8:59
 */

namespace App\Observers;
use App\Models\Link;
use Cache;

class LinkObserver
{
    public function saved(Link $link){
        Cache::forget($link->cache_key);
    }
}