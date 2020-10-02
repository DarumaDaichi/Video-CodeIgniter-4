<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Layout</title>
</head>
<body>
    
    <nav>
        <ul>
            <a href="<?php echo base_url('/admin')?>">         
                <li>Home</li> 
            </a>

            <a href="<?php echo base_url('/admin/kategori')?>">         
                <li>Kategori</li> 
            </a>

            <a href="<?php echo base_url('admin/menu')?>">         
                <li>Menu</li> 
            </a>

            <a href="<?php echo base_url('admin/user')?>">         
                <li>User</li> 
            </a>
        </ul>

        
    </nav>

    <?= $this->renderSection('content')?>

</body>
</html>