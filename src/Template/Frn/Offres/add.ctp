<div class="page-header">
    <?php
    $this->Breadcrumbs->add(
        'ACCUEIL',
        ['controller' => 'Front', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'ARTICLES',
        ['controller' => 'Offres', 'action' => 'index']
    );
    $this->Breadcrumbs->add(
        'NOUVEL ARTICLE'

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
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> NOUVEL ARTICLE</h3>
    </div>
    <div class="card-body">
        <form id="myForm" enctype="multipart/form-data" action="<?= $this->Url->build(['action'=>'add']) ?>" class="form contents" method="post">
            <input type="hidden" name="_csrfToken" value="<?= $token ?>"/>
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <label for="">NOM </label>
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Intitule de l'offre"/>

                    </div>
                </div>

                <div class="col-5">
                    <div class="card">
                        <h5 class="card-header">CATEGORIES</h5>
                        <div class="card-body">
                            <select multiple="multiple" id="my-select" name="my-select[]">
                                <?php foreach($categories as $s): ?>
                                    <option value="<?= $s->id ?>"><?= $s->name ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">PHOTO </label>
                        <input type="file" class="form-control-file" name="photo" placeholder="image associee a l'offre ..."/>

                    </div>
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description" id="description" class="form-text form-control form-control-sm" cols="20" rows="3"></textarea>

                    </div>
                </div>
            </div>
            <hr/>
            <div>
                <div style="margin: 10px auto; max-width: 400px " class="">
                    <button id="btn_save" type="submit" class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i>&nbsp; Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->Html->css('../assets_concept_template/vendor/multi-select/css/multi-select.css') ?>
<?= $this->Html->script('../assets_concept_template/vendor/slimscroll/jquery.slimscroll.js') ?>
<?= $this->Html->script('../assets_concept_template/vendor/multi-select/js/jquery.multi-select.js') ?>
<?= $this->Html->script('../assets_concept_template/libs/js/main-js.js') ?>
<script>

    $('#my-select, #pre-selected-options').multiSelect()
</script>
