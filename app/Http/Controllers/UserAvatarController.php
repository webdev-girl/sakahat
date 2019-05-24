<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
 * Update the avatar for the user.
 *
 * @param  Request  $request
 * @return Response
 */
public function update(Request $request)
{
    // $path = $request->file('avatar')->store('avatars');
    // Storage::put('avatars/1', $fileContents);
    // Storage::disk('s3')->put('avatars/1', $fileContents);
    // $contents = Storage::get('file.jpg');
    // $exists = Storage::disk('s3')->exists('file.jpg');
    // $url = Storage::url('file.jpg');
    // echo asset('storage/file.txt');
    // $url = Storage::temporaryUrl(
    //     'file.jpg', now()->addMinutes(5)
    // );

    // $url = Storage::temporaryUrl(
    // 'file.jpg',
    // now()->addMinutes(5),
    // ['ResponseContentType' => 'application/octet-stream'],
    // );

    // 'public' =>[
    // 'driver' => 'local',
    // 'root' => storage_path('app/public'),
    // 'url' => env('APP_URL').'/storage',
    // 'visibility' => 'public',
    // ],

    // $size = Storage::size('file.jpg');
    // $time = Storage::lastModified('file.jpg');

    // Storage::put('file.jpg', $contents);
    // Storage::put('file.jpg', $resource);

    // Automatically generate a unique ID for file name...
    // Storage::putFile('photos', new File('/path/to/photo'));

    // Manually specify a file name...
    // Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');
    // Storage::putFile('photos', new File('/path/to/photo'), 'public');

    // Storage::prepend('file.log', 'Prepended Text');
    // Storage::append('file.log', 'Appended Text');

    // Storage::copy('old/file.jpg', 'new/file.jpg');
    // Storage::move('old/file.jpg', 'new/file.jpg');

    // $path = Storage::putFile('avatars', $request->file('avatar'));

    // $path = $request->file('avatar')->storeAs(
    // 'avatars', $request->user()->id
    // );

    // $path = Storage::putFileAs(
    // 'avatars', $request->file('avatar'), $request->user()->id
    // );

    $path = $request->file('avatar')->store(
        'avatars/'.$request->user()->id, 's3'
    );

    // Storage::put('file.jpg', $contents, 'public');
    //
    // $visibility = Storage::getVisibility('file.jpg');
    // Storage::setVisibility('file.jpg', 'public');
    //
    // Storage::delete('file.jpg');
    // Storage::delete(['file.jpg', 'file2.jpg']);
    //
    // Storage::disk('s3')->delete('folder_path/file_name.jpg');
    //
    // $files = Storage::files($directory);
    // $files = Storage::allFiles($directory);
    //
    // return Storage::download('file.jpg');
    // return Storage::download('file.jpg', $name, $headers);

    return $path;
}
}
