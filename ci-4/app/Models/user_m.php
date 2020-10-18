<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class user_m extends Model 
    {
        protected $table                = 'tbluser';
        protected $primaryKey           = 'iduser';
        protected $allowedFields        = ['user' , 'email' , 'password' , 'level' , 'aktif'];

        protected $validationRules      = [
            'user'  => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
            'email'  => 'valid_email'
        ];
        
        protected $validationMessages   = [
            'user' =>   [
                'alpha_numeric_space'   => 'Tidak boleh menggunakan symbol',
                'min_length'            => 'Minimal 3 huruf',
                'is_unique'             => 'Nama telah digunakan'
            ],

            'email' => [
                'valid_email'   => 'Email salah'
            ]
        ];
    }

?>