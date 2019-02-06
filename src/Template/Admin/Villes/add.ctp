
<div class="villes form large-9 medium-8 columns content">
    <?= $this->Form->create($ville) ?>
    <fieldset>
        <legend><?= __('Add Ville') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('pay_id', ['options' => $pays]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
