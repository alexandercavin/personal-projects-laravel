<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // public function getRouteKeyName() {
    //     return "slug";
    // } unique identifier nya jadi slug

        //protection againts mass assigned (using create and update eloquent function is called mass assigned)
        protected $fillable = ["title", "description", "long_description"];
        // protected $guarded = ["secrete"]; // opposite of fillable. all the other properties besides secrete is fillable
        
        public function toggleCompleted(){
            $this->completed = !$this->completed;
            $this->save(); 
        }

}
