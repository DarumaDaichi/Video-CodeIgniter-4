<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class pelanggan_m extends Model 
    {
        protected $table                = 'tblpelanggan';
        // protected $allowedFields        = ['pelanggan','keterangan'];
        // protected $primaryKey           = 'idpelanggan';

        // protected $validationRules      = [
        //     'pelanggan'  => 'alpha_numeric_space|min_length[3]|is_unique[tblpelanggan.pelanggan]'
        // ];
        
        // protected $validationMessages   = [
        //     'pelanggan' =>   [
        //         'alpha_numeric_space'   => 'Tidak boleh menggunakan symbol',
        //         'min_length'            => 'Minimal 3 huruf',
        //         'is_unique'             => 'Nama telah digunakan'
        //     ]
        // ];
    }

?>