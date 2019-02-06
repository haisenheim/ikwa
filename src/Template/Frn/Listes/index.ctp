
<div class="">
    <div class="page-header">
        <?php
        $this->Breadcrumbs->add(
            'ACCUEIL',
            ['controller' => 'Front', 'action' => 'index']
        );
        $this->Breadcrumbs->add(
            'LISTES DE PRIX'
        );


        ?>
        <div class="page-breadcrumb">
            <?php
            $this->Breadcrumbs->setTemplates([
                'wrapper' => '<nav class="breadcrumb"><ol{{attrs}}>{{content}}</ol></nav>',
            ]);
            echo $this->Breadcrumbs->render(
                ['class' => 'breadcrumb'],
                ['separator' => '&nbsp; <i class="fa fa-angle-right"></i> &nbsp;']
            );
            ?>

        </div>

    </div>
  <div>
     <div class="card">
         <div class="card-header">
             <h3 class="card-title">LISTES DE PRIX</h3>
             <a style="float: right;" class="btn btn-success btn-xs" href="<?= $this->Url->build(['action'=>'create']) ?>"><i class="fa fa-plus-circle"></i> NOUVELLE LISTE</a>
         </div>
         <div class="card-body">
             <table  class="table table-bordered table-hover table-striped">
                 <thead>
                 <tr>
                     <th>NUMERO DE LISTE</th>
                     <th>DATE DE CREATION</th>
                     <th>STATUT</th>
                     <th>EN COURS ?</th>

                     <th></th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php foreach ($listes as $liste): ?>
                     <tr>
                         <td><?= h($liste->name) ?></td>
                         <td><?= $liste->created?date_format($liste->created, 'd/m/Y'):'-' ?></td>
                         <td><?= $liste->active?'ACTIVE':'DESACTIVEE' ?></td>
                         <td><?= $liste->actuel?'<span style="color: #008000; font-weight: 900"> OUI</span>':'<span style="color: red; font-weight: 900"> NON</span>' ?></td>

                         <td class="">
                             <ul class="list-inline" style="margin-bottom: 0">
                                 <li class="list-inline-item"><a title="Afficher" href="<?= $this->Url->build(['action'=>'view',$liste->id]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye-slash"></i></a></li>
                                 <li class="list-inline-item"><a title="Modifier" href="<?= $this->Url->build(['action'=>'edit',$liste->id]) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></li>
                                 <?php if($liste->active): ?>
                                     <li class="list-inline-item"><a title="Desactiver" href="<?= $this->Url->build(['action'=>'disable',$liste->id]) ?>" class="btn btn-xs btn-danger"><i class="fa fa-stop-circle"></i></a></li>
                                     <li class="list-inline-item"><a title="METTRE EN AVANT" href="<?= $this->Url->build(['action'=>'current',$liste->id]) ?>" class="btn btn-xs btn-info"><i class="fa fa-check-circle"></i></a></li>
                                 <?php else: ?>
                                     <li class="list-inline-item"><a title="Activer" href="<?= $this->Url->build(['action'=>'enable',$liste->id]) ?>" class="btn btn-xs btn-info"><i class="fa fa-play-circle"></i></a></li>
                                     <li class="list-inline-item" title="Supprimer" >
                                         <form name="post_5af572b6820d7500678848" class="form-delete" style="display:none;" method="post" action="<?= $this->Url->build(['action'=>'delete',$category->id]) ?>">
                                             <input name="_method" value="POST" type="hidden">
                                         </form>
                                         <a class="btn btn-danger btn-xs" href="#" onclick="$('.form-delete').submit()"><i class="fa fa-trash"></i></a>
                                     </li>
                                 <?php endif; ?>

                             </ul>
                         </td>
                     </tr>
                 <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
  </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
