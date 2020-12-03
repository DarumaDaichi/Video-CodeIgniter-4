<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class pelanggan_m extends Model 
    {
        protected $table                = 'tblpelanggan';
        protected $primaryKey           = 'idpelanggan';
        protected $allowedFields        = ['pelanggan' , 'alamat', 'telpon' , 'email' , 'password' ,'aktif'];

        protected $validationRules      = [
            'pelanggan'  => 'alpha_numeric_space|min_length[3]|is_unique[tblpelanggan.pelanggan]',
            'email'  => 'valid_email|is_unique[tblpelanggan.email]',
            'telpon'   => 'numeric',
            'alamat'    => 'alpha_numeric_space'
        ]; 
        
        protected $validationMessages   = [
            'pelanggan' =>   [
                'alpha_numeric_space'   => 'Tidak boleh menggunakan symbol',
                'min_length'            => 'Minimal 3 huruf',
                'is_unique'             => 'Nama telah digunakan'
            ],

            'alamat'    =>[
                'alpha_numeric_space' => 'Tidak boleh menggunakan email'
            ],

            'telpon' => [
                'numeric'   => 'tidak boleh menggunakan huruf'
            ],

            'email' => [
                'valid_email'   => 'Email salah',
                'is_unique'     => 'Email telah digunakan'
            ]
        ];
    }

?>