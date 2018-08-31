<?php
namespace App\Controller;

class Temp3Controller extends AppController{
  // 初期設定
  public function initialize(){
    parent::initialize();
    // レイアウトファイルの指定
    $this -> viewBuilder()->layout("template3");
  }


  // indexアクションを作る。
  // http://localhost/21cake/cake/temp3/index にアクセスすることが出来る
    public function index($n=""){   //「=''」は、何もないときはそのまんまになる。
      if($n==""){
        $n = "index";
      }
      // viewに値を渡す
      $this ->set("atai",$n);
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
