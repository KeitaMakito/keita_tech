iko<?= $num ?>

ビューブロックの定義

<?php
$this->start('sidebar');

echo $this->element('element2');
echo $this->element('element3');
echo $this->element('element4');
$this->end();

 ?>



<!--


/*

/iko/student/
にアクセスすると、
テンプレートの画面が表示され、
上の青緑のヘッダーの上に赤い文字で
２と表示され、
上の青緑のヘッダーの下に赤い文字で
PIKO と表示されるようにする

*/

// ppapアクションを作る。
  public function ppap($num=''){   //「=''」は、何もないときはそのまんまになる。
//        $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
    echo 'mode'.$num;

    // 他のメソッドを実行
    $this -> setAction('index');
    echo 'PIKO';
  }

*/

-->
