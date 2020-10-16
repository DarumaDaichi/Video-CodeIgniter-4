<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class user_m extends Model 
    {
        protected $table                = 'tbluser';
        protected $primaryKey           = 'iduser';
        protected $allowedFields        = ['user' , 'email' , 'password' , 'level' , 'aktif'];
    }

?>