<div class="card">
    <div class="card-header">
        <h3 class="card-title">LISTE DES CAISSIERS IKWA</h3>
        <span><a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> AJOUTER</a></span>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>ADRESSE</th>
                    <th>TELEPHONE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->last_name ?></td>
                        <td><?= $user->first_name ?></td>
                        <td><?= $user->address ?></td>
                        <td><?= $user->phone ?></td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a title="Afficher" href="<?= $this->Url->build(['action'=>'view',$user->id]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye-slash"></i></a></li>
                                <li class="list-inline-item"><a title="Modifier" href="<?= $this->Url->build(['action'=>'edit',$user->id]) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></li>
                                <?php if($user->active): ?>
                                <li class="list-inline-item"><a title="Bloquer" href="<?= $this->Url->build(['action'=>'disable',$user->id]) ?>" class="btn btn-xs btn-danger"><i class="fa fa-stop-circle"></i></a></li>
                                <?php else: ?>
                                    <li class="list-inline-item"><a title="Debloquer" href="<?= $this->Url->build(['action'=>'enable',$user->id]) ?>" class="btn btn-xs btn-info"><i class="fa fa-play-circle"></i></a></li>
                                <?php endif; ?>

                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

