<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    

//creo el metodo para que se relaciones con la tabla role
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

/****************************************************************************/
// validacion de roles

public function authorizeRoles($roles){//recibira los roles , dentro de los roles validaremos los roles(autorizamos) 
             if ($this->hasAnyRole($roles)) {//
                 return true;
             }
             abort(401,'Esta accion es no autorizada');//
}

//un usuario puede tener varios roles asi que hacemos una cuncion para iterar todos esos roles.
//recibimos bastantes roles, nos permite iterar entre roles
public function hasAnyRole($roles){
       if (is_array($roles)) {//validamos que ese sea un array
             foreach ($roles as $role) {//para iterar todos los roles del arreglo
                 if ($this->hasRole($role)) {//repetimos el is de mas abajo
                     return true;
                 }
             }
       }else{
           if($this->hasRole($roles)){//si es un rol , solo validamos que tenga ese rol
               return true;
           }
       }
       return false;
}

  //validar si mi usuario tiene ese rol que yo estoy preguntando
public function hasRole($role){
    if ($this->roles()->where('name',$role)->first()){//si mi usuario actual dentro de rol que tiene existe, y me mande el primero que existe
        return true;
    }
    return false;
}
/************************************************************************/
 


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
