<?php

namespace App;

use App\Category;
use App\CartDetail;
use App\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }

    public function getFeaturedImageUrlAttribute(){
        $featuredImage = $this->formatSrcUrlImage($this->images()->where('featured', true)->first());

        if (!$featuredImage) {
            $featuredImage =  $this->formatSrcUrlImage($this->images()->first());
        }

        if ($featuredImage === null) {
            return url('img/no-image.jpg');
        } else {
            return $featuredImage;
        }

    }

    public function formatSrcUrlImage($image){
        if ($image) {
            if (substr($image->image, 0, 4) === 'http') {
                return $image->image;
            } else {
                return url('img/'.$image->image);
            }
        } else {
            return null;
        }
    }


}
