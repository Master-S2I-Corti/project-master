<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personne extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Personne";

    protected $fillable = [
        'login', 'password','nom','prenom','naissance','email','email_sos','code_postal','ville','adresse','admin','code_professeur','code_etudiant','tel'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isEtudiant() {
        return $this->code_etudiant != null;
    }
    public function isEnseignant() {
        return $this->code_professeur != null;
    }

    public function isAdmin() {
        return $this->admin == 1;
    }


    public function getPath() {
        return $this->isEtudiant() ? "/etudiant" : "/enseignant";
    }

    public function Etudiant()
    {
            return $this->belongsTo('App\Etudiant','code_etudiant','code_etudiant');
    }
    
    public function Enseignant()
    {  
        return $this->belongsTo('App\Enseignant','code_professeur','code_professeur');
    }
    


}
