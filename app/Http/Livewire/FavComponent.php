<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Favs;
use Illuminate\Support\Facades\Auth;

class FavComponent extends Component
{

    protected $personajes, $episodios;
    protected $favoritos = array();
    public $url;

    public function mount()
    {
        $this->url = "https://rickandmortyapi.com/api/character";
        $response = Http::get($this->url);
        $this->personajes = $response->object();
    }

    public function render()
    {
        $this->getFavs();
        return view('livewire.fav-component', [
            'personajes' => $this->personajes,
            'favoritos' => $this->favoritos
        ]);
    }

    public function getFavs()
    {
        $favs = Favs::all();
        foreach($favs as $fav)
        {
            $personaje = Http::get($fav->ref_api);
            $this->favoritos[] = $personaje->object();
        }
    }

    public function addFav($ref_api)
    {
        $user = Auth::user();
        $fav = Favs::where('user_id', $user->id)->where('ref_api', $ref_api);
        if ( $fav->count() == 0 ) {
            $fav = new Favs;
            $fav->user_id = $user->id;
            $fav->ref_api = $ref_api;
            $fav->save();
        }
    }

    public function remFav($ref_api)
    {
        $user = Auth::user();
        $fav = Favs::where('user_id', $user->id)->where('ref_api', $ref_api);
        $fav->delete();
    }

    public function pagina($url)
    {
        $this->personajes = "";
        $this->url = $url;
        $response = Http::get($url);
        $this->personajes = $response->object();
    }


}
