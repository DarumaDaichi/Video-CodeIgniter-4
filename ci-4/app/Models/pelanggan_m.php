<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class pelanggan_m extends Model 
    {
        protected $table                = 'tblpelanggan';
        protected $allowedFields        = ['aktif'];
        protected $primaryKey           = 'idpelanggan';
    }

?>