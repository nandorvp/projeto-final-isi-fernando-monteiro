<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function getAlbum () {
        $albums = DB::table('album')->get();
        return view('album.all', compact('albums'));
    }

    public function viewAlbum($id) {
        $album = DB::table('album')
            ->where('album.id',$id)
            ->join('band', 'band.id','=', 'album.band_id')
            ->select('album.*','band.name as bandName')
            ->first();

        $bands = DB::table('band')->get();
        return view('album.view', compact('album','bands'));
    }

    public function storeAlbum(Request $request) {
        $picture = null;
        if ($request->hasFile('picture')) {
            $picture = Storage::putFile('albumPictures', $request->picture);
        }
        if ($request->album_id) {
            $request->validate([
                'name' => 'string|max:50',
                'band_id' =>'integer'
            ]);
            DB::table('album')
                ->where('id', $request->album_id)
                ->update([
                    'name' => $request->name,
                    'picture' => $picture,
                    'duration' => $request->duration,
                    'band_id' => $request->band_id,
                    'data_lancamento' => $request->data_lancamento,
                ]);
        } else {
            $request->validate([
                'name' => 'string|max:50',
                'band_id' =>'integer'
            ]);
            DB::table('album')
                ->insert([
                    'name' => $request->name,
                    'picture' => $picture,
                    'duration' => $request->duration,
                    'band_id' => $request->band_id,
                    'data_lancamento' => $request->data_lancamento,
                ]);
        }
        return redirect()->route('all_albums');
    }

    public function addAlbum() {
        $bands = DB::table('band')->get();
        return view('album.view',compact('bands'));
    }

    public function deleteAlbum($id)
    {
        DB::table('album')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('all_albums');
    }

}
