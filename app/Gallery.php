<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function getImagesAttribute($value)
    {
        return empty($value) ? NULL : explode(',', $value);
    }

    public function setImagesAttribute($photos)
    {
        if (isset($this->attributes['images'])) {
            $this->attributes['images'] = explode(',', $this->attributes['images']);
            foreach ($this->attributes['images'] as $photo) {
                if (!in_array($photo, $photos)) {
                    $file = public_path() . DIRECTORY_SEPARATOR . $photo;
                    $smallFile = public_path() . '/images/uploads/small/' . basename($file);
                    if (file_exists($file)) {
                        @unlink($file);
                    }
                    if (file_exists($smallFile)) {
                        @unlink($smallFile);
                    }
                }
            }
        }
        if (empty($photos))
            $this->attributes['images'] = NULL;
        else
            $this->attributes['images'] = implode(',', $photos);
        if (!empty($photos)) {
            foreach ($photos as $photo) {
                $file = public_path() . DIRECTORY_SEPARATOR . $photo;
                $smallFile = public_path() . '/images/uploads/small/' . basename($file);

                $img = \Image::make($file);
                $img->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($file, 100);

                $img = \Image::make($file)->resize(630, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($smallFile, 100);
            }
        }
    }
}
