<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function getBand () {
        $bands = DB::table('band')
            ->select('band.*', DB::raw('COUNT(album.id) as albunsNumber'))
            ->leftJoin('album', 'band.id', '=', 'album.band_id')
            ->groupBy('band.id')
            ->get();

        return view('band.all', compact('bands'));
    }

    public function viewBand($id)
    {
        $band = Db::table('band')
            ->where('band.id',$id)
            ->first();
        return view('band.view', compact('band'));
    }

    public function viewBandAlbums($id) {
        $albums = DB::table('band')
            ->where('band.id',$id)
            ->join('album', 'band.id','=', 'album.band_id')
            ->select('album.*','band.name as bandName')
            ->get();
        return view('album.all', compact('albums'));
    }

    public function storeBand(Request $request) {
        $picture = null;
        if ($request->hasFile('picture')) {
            $picture = Storage::putFile('bandPictures', $request->picture);
        }
        if ($request->band_id) {
            $request->validate([
                'name' => 'string|max:50'
            ]);
            DB::table('band')
                ->where('id', $request->band_id)
                ->update([
                    'name' => $request->name,
                    'country' => $request->country,
                    'picture' => $picture
                ]);
        } else {
            $request->validate([
                'name' => 'string|max:50'
            ]);
            DB::table('band')
                ->insert([
                    'name' => $request->name,
                    'country' => $request->country,
                    'picture' => $picture
                ]);
        }
        return redirect()->route('all_bands');
    }

    public function addBand() {
        return view('band.view');
    }

    public function deleteBand($id)
    {
        DB::table('band')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('all_bands');
    }

}
