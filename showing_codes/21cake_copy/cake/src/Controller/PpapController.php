<?php
namespace App\Controller;

class PpapController extends
AppController{
    public function piko(){
      // 対応するviewファイルを無視
//      $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
//      echo 'abc';

/*

/ppap/piko/
にアクセスすると、
テンプレートの画面が表示され、
上の青緑のヘッダーの上に赤い文字で
２と表示され、
上の青緑のヘッダーの下に赤い文字で
PIKO と表示されるようにする

*/
echo "<h1 style='color:red'>2</h1>";


    }


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
