<?php 
require("navi.php");
require("db.classe.php");
$sql = "SELECT * FROM onaserdb";
$result = $conn->query($sql);
?>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">
    <div class="jouer"> <button class="btn btn-primary"> <a href="index.php" class="text-white text-decoration-none">Ajouter</a></button></div>
    <div class='kan'>
        <table id="myTable" class="display nowrap" style="width:100%"> 
            <thead> 
                <tr>
                   
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Morts</th> 
                    <th>Blessés</th>
                    <th>Collision</th>
                    <th>Lien</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                while ($obj = mysqli_fetch_object($result)) {
                ?>
                <tr>
                    
                    <td><?php echo $obj->Lieu; ?></td>
                    <td><?php echo $obj->date; ?></td>
                    <td><?php echo $obj->morts; ?></td>
                    <td><?php echo $obj->blesse; ?></td>
                    <td><?php echo $obj->collision; ?></td>
                    <td><a href="<?php echo $obj->lien; ?>" target="_blank">Lien</a></td>
                    <td>
                        <a href="edit.php?id=<?php echo $obj->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Modifier</a>
                        <a href="delete.php?id=<?php echo $obj->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');"><i class="fas fa-trash-alt"></i>sup</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
<tr>
            
            <th>lieu</th>
            <th>Date</th>
            <th>Morts</th> 
            <th>Blessés</th>
            <th>Collision</th>
            <th>Lien</th>
            <th>Actions</th>
        </tr>
</tfoot>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>

<script>
 new DataTable('#myTable', {
    layout: {
        topStart: {
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
                'colvis',
            ]
        }
    },
    columnDefs: [
        {
            targets: -2,
            visible: false
        }
    ]
});

 
</script>
</html>