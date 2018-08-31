<?php
namespace App\Controller;

class IkoController extends
AppController{

// 初期設定
public function initialize(){
  parent::initialize();
  // レイアウトファイルの指定
  $this -> viewBuilder()->layout("template1");
}



  public function student($n){   //「=''」は、何もないときはそのまんまになる。
  //  echo "iko".$n;
  //  $nをビューに渡す   viewに渡す名前　コントローラー側にある変数の順番
    $this->set("num", $n);
  }



/*

/iko/teacher/
にアクセスして画面表示されるようにする

/iko/teacher/1
というように、最後の数字が奇数であれば、
１は奇数です。　とviewに表示

偶数であれば、　たとえば
１３５は偶数です　とviewに表示される

/iko/teacher/ というように数字が無い場合は、
今日は節分です。豆まきします！

*/






  // teacherアクションを作る。/iko/teacher/1にアクセスしたら、halと表示
    public function teacher($num=''){   //「=''」は、何もないときはそのまんまになる。
//      $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味

      if($num%2==1){
        $text = $num."は奇数です！";
      }
      if($num%2==0){
        $text = $num."は偶数です！";
      }
      if($num==""){
      $text = "今日は節分です。豆まきします！";
      }
      // $textをviewに渡す
      $this->set("text",$text);
    }


    public function formcheck(){
    }

    public function search(){
      // フォームからデータがＰＯＳＴで送られてくる
      $data = $this->request->data('keyword');

      //ビューに$dataをわたす
      $this->set('data', $data);
    }



    // honjamakaアクションを作る。/iko/teacher/1にアクセスしたら、halと表示
      public function honjamaka($num=''){   //「=''」は、何もないときはそのまんまになる。
  //      $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
  // レイアウトファイルの指定
  $this -> viewBuilder()->layout("template2");
        if($num==2){
          $text = $num;
        }
        if($num==""){
        $text = "てすと";
        }
        // $textをviewに渡す
        $this->set("text",$text);
      }







/*
/iko/student/
にアクセスすると、
テンプレートの画面が表示され、
上の青緑のヘッダーの上に赤い文字で
２と表示され、
上の青緑のヘッダーの下に赤い文字で
PIKO と表示されるようにする

*/

    }




/*

********************************************************************
                              1月27日のメモ
********************************************************************

    ☆ リダイレクト
    $this -> redirect('リダイレクト先パス');
    例) $this -> redirect('/test/hello');

    ☆ setAction
    URLを変えずに別のアクションメソッドを実行したい場合は、setActionを使う
    $this -> setAction('アクション名');
    例) $this -> setAction('error');
    return; ←ないと下の行が実行される

    ☆ Ｖｉｅｗ(ビュー)
    HTML,JSON,PDFなどの出力を担当
    実際に表示するHTMLなどはTemplateフォルダ内にファイルを置く
    コントローラーに設定したアクションメソッドには自動的にビューが割り当てられる。
    例) コントローラー
    public function index(){
    }
    ビューテンプレート
    index.ctp


    ☆ ビューファイル命名規則
    src/Template/コントローラー名/アクション名.ctp
    例) testController内のstudentメソッドに対応するviewは
    src/template/Test/student.ctp
    　　　　　　　↑キャメルケースで
    ※ アクションメソッド名をキャメルでかいている場合は
    アンダースユア記法でビューファイルの名前を付ける
    例) コントローラー viewAll() → ビュー view_all.ctp




    ********************************************************************
                                  2月3日のメモ
    ********************************************************************



    Maru Controller extends {　　　　　　　　　　　　　＜ｈｔｍｌ＞
      public function maruno(){
                                　⇐＝＝＝＝＝＝＝＝⇒
      }
    }　　　　　　　　　　　　　　　　　　　　　　　　　　＜ｈｔｍｌ＞


    /maru/maruno.ctp
    maruがコントローラー　marunoがビュー




*/
