<?php

namespace App\PathGenerator;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media) : string
    {
        return sprintf('%s/%d/', auth()->user()->mediaCollectionName, $media->id);
    }

    public function getPathForConversions(Media $media) : string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media) : string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
