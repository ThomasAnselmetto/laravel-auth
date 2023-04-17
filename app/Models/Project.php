<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    public function getAbstract($max = 20) {
        return substr($this->description, 0 , $max) . "...";
    }

    protected $fillable = ["project_preview_img",
    "name","commits",
    "contributors",
    "description"];
// ci creiamo la nostra funzione per la logica di creazione dello slug
    public static function generateSlug($name){

        $possible_slug = Str::of($name)->slug('-'); 
        // controllo che sia unico senno ciclo
        $projects = Project::where('slug',$possible_slug)->get();

        $original_slug = $possible_slug;

        $i = 2;
        // usiamo il count al posto di !empty per non finire in un loop infinito
        while (count($projects)){
            $possible_slug = $original_slug . "-" . $i;
            $projects = Project::where('slug',$possible_slug)->get();
            $i++;
        }

        return $possible_slug;

    }

    // questo tradotto sarebbe (trovami tutti i projects dove lo slug e' uguale allo slug che ho appena generato)
}