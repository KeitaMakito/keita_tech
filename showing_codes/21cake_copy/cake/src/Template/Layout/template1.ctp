<!DOCTYPE html>
<html lang="ja">
<head>
<?= $this->Html->charset() ?>
<?= $this->Html->css("style") ?>
<?= $this->Html->script("sample") ?>
<title><?= $this->fetch('title') ?></title>
</head>
<body>

<header>
  <?= $this->Html->link('logo',array('controller'=>'test','action'=>'mode')) ?>
</header>
<nav>
  <?= $this->Html->nestedList(array('home','service','contact'),array('class'=>'g-navi'),array('class'=>'g-navi-item')) ?>
</nav>

<div id="contents">


	<div class="sidebar">
  <?= $this->Html->image('person1.jpg') ?>
  <?= $this->element('element1') ?>
  <?= $this->fetch('slidebar') ?>

	</div>

<?= $this->fetch('content') ?>

 </div>

<footer></footer>
</body>
</html>
