<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $liste->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $liste->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Listes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fournisseurs'), ['controller' => 'Fournisseurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fournisseur'), ['controller' => 'Fournisseurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listeitems'), ['controller' => 'Listeitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listeitem'), ['controller' => 'Listeitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="listes form large-9 medium-8 columns content">
    <?= $this->Form->create($liste) ?>
    <fieldset>
        <legend><?= __('Edit Liste') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('fournisseur_id', ['options' => $fournisseurs]);
            echo $this->Form->input('active');
            echo $this->Form->input('default');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
