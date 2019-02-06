
<div class="paiements form large-9 medium-8 columns content">
    <?= $this->Form->create($paiement) ?>
    <fieldset>
        <legend><?= __('Add Paiement') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('total');
            echo $this->Form->control('percu');
            echo $this->Form->control('reste');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
