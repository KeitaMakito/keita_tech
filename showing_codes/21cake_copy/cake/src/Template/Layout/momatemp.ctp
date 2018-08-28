<!DOCTYPE html>
<html lang="ja">
  <head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->css('moma') ?>
  </head>
  <body>
    <header>
      <?= $this->Html->image('logo.gif') ?>
    </header>
    <div id="center">
      <?= $this->fetch("content") ?>
    </div>
    <div id="right">
    </div>
  </body>
</html>
