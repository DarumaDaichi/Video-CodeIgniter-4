<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class kategori_M extends Model 
    {
        protected $table            = 'tblkategori';
        protected $allowedFields    = ['kategori','keterangan'];
        protected $primaryKey       = 'idkategori';
    }

?>