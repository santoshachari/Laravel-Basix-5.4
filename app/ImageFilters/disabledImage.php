<?php
/**
 * Sample filter for image manipulation
 * via image cache
 */

namespace App\ImageFilters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class DisabledImage implements FilterInterface
{

    /**
     * Applies filter to given image
     *
     * @param  Image $image
     * @return Image
     */
    public function applyFilter(Image $image)
    {
        return $image->fit(120, 90)->greyscale();
    }
}