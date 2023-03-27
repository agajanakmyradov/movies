<?php
namespace App\Actions\Movie;

class StorePoster
{
    public function handle($file = null)
    {
        if ($file == null) {
            $posterName = time() . '_' . 'default.jpg';
            $path = storage_path('app/public/images/posters/' . $posterName);
            $poster = \Intervention\Image\Facades\Image::make('images/poster/default.jpg')->fit(200, 300)->save($path);

            return 'images/posters/' . $posterName;
        }

        $posterName = time() . '_' . $file->getClientOriginalName();
        $path = storage_path('app/public/images/posters/' . $posterName);
        $poster = \Intervention\Image\Facades\Image::make($file)->fit(200, 300)->save($path);

        return 'images/posters/' . $posterName;
    }
}
