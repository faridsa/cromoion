<?php
namespace App\Http\Controllers\Traits;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {
        $target_folder = $request->target_folder;

       

        
       /*if (! file_exists(public_path('images/'.$target_folder))) {
            mkdir(public_path('images/'.$target_folder), 0777);
        }*/


        $finalRequest = $request;
        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                    
                if ($key == 'pdf'){
                    
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move(realpath('pdf'), $filename);
                    //$request->file($key)->move(public_path('pdf'), $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                   if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                        // Check file width
                        $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                        $file     = $request->file($key);
                        $image    = Image::make($file);
                        if (! file_exists(public_path('images/'.$target_folder.'/thumb'))) {
                            mkdir(public_path('images/'.$target_folder.'/thumb'), 0777, true);
                        }
                        $width  = $image->width();
                        $height = $image->height();
                        if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                            $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                        } elseif ($width > $request->{$key . '_max_width'}) {
                            $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        } elseif ($height > $request->{$key . '_max_width'}) {
                            $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        $image->save(public_path('images') . '/'.$target_folder. '/' . $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                    } else {
                        $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                        $request->file($key)->move(public_path('images'. '/'.$target_folder), $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                    }
                }
            }
        }
        return $finalRequest;
    }
}