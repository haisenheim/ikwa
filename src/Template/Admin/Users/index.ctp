<div class="card">
    <div class="card-header">
        <h2 class="page-header">Liste des utilisateurs  <a style="float: right;" class="btn btn-success btn-xs btn-rounded" href="<?= $this->Url->build(['action'=>'add']) ?>"><i class="fa fa-plus-circle"></i> NOUVEL UTILISATEUR</a></h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered second" style="width:100%">
            <thead>
            <tr>
                <th>NOM</th>
                <th>ADRESSE EMAIL</th>
                <th>TELEPHONE</th>
                <th>ROLE</th>
                <th>Fournisseur</th>
                <th>GROUPE</th>
                <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>

                    <td><?= $user->name ?>                     </td>
                    <td><?= $user->email ?>                    </td>
                    <td><?= $user->phone ?>                    </td>
                    <td><?= $user->role?$user->role->name:"" ?></td>
                    <td><?= $user->fournisseur?$user->fournisseur->name:'-' ?></td>
                    <td><?= $user->groupe?$user->groupe->name:'-' ?></td>




                    <td class="actions">
                        <?php echo $this->Html->link('Details', array('action' => 'view', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
                        <?php echo $this->Html->link('Modifier le mot de passe', array('action' => 'password', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
                        <?php echo $this->Html->link('Modifier', array('action' => 'edit', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    </div>
</div>

<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/buttons.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/select.bootstrap4.css') ?>
<?= $this->Html->css('../assets_concept_template/vendor/datatables/css/fixedHeader.bootstrap4.css') ?>


<?= $this->Html->script('../assets_concept_template/vendor/jquery/jquery-3.3.1.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/bootstrap/js/bootstrap.bundle.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/slimscroll/jquery.slimscroll.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/multi-select/js/jquery.multi-select.js') ?>
<?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/jquery.dataTables.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/data-table.js') ?>

<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/jszip.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/pdfmake.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/vfs_fonts.js') ?>

<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.html5.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.print.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/buttons.colVis.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.rowGroup.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.select.min.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/datatables/js/dataTables.fixedHeader.min.js') ?>





<!--<script>
    $(document).ready(function(){
        $('#example').DataTable({
            "language": {
                "paginate": {
                    "previous": "PRECEDENT",
                    "search":"CHERCHER",
                    "next":"SUIVANT"
                }
            }
        });
    })
</script>
-->

