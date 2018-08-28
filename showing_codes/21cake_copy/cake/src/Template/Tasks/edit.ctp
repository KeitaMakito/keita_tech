<?= $this->Form->create($task) ?>

<?= $this->Form->input("id") ?>
<?= $this->Form->input("title") ?>
<?= $this->Form->input("etc") ?>

<?= $this->Form->button("登録") ?>
<?= $this->Form->end() ?>
