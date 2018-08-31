<?php
namespace App\Controller;

class MomaController extends AppController{
  // 初期設定
  public function initialize(){
    parent::initialize();
    // レイアウトファイルの指定
    $this -> viewBuilder()->layout("momatemp");
  }


  // indexアクションを作る。
  // http://localhost/21cake/cake/moma/ にアクセスすることが出来る
    public function index($n=""){   //「=''」は、何もないときはそのまんまになる。
      if($n==""){
        $n = "<a href='http://localhost/21cake/cake/moma/goods/1'>goods1</a><br><a href='http://localhost/21cake/cake/moma/goods/2'>goods2</a><br><a href='http://localhost/21cake/cake/moma/goods/3'>goods3</a><br><a href='http://localhost/21cake/cake/moma/goods/4'>goods4</a><br><a href='http://localhost/21cake/cake/moma/goods/5'>goods5</a><br><a href='http://localhost/21cake/cake/moma/goods/6'>goods6</a><br><a href='http://localhost/21cake/cake/moma/goods/7'>goods7</a><br><a href='http://localhost/21cake/cake/moma/goods/8'>goods8</a><br><a href='http://localhost/21cake/cake/moma/goods/9'>goods9</a><br><a href='http://localhost/21cake/cake/moma/goods/10'>goods10</a>";
      }
      // viewに値を渡す
      $this ->set("atai",$n);
    }


  // goodsアクションを作る。
  // http://localhost/21cake/cake/moma/goods/ にアクセスすることが出来る
    public function goods($n=""){   //「=''」は、何もないときはそのまんまになる。 ここでは、goods.ctpが対応する
      if($n==""){
        $n = "<a href='http://localhost/21cake/cake/moma/goods/1'>goods1</a><br><a href='http://localhost/21cake/cake/moma/goods/2'>goods2</a><br><a href='http://localhost/21cake/cake/moma/goods/3'>goods3</a><br><a href='http://localhost/21cake/cake/moma/goods/4'>goods4</a><br><a href='http://localhost/21cake/cake/moma/goods/5'>goods5</a><br><a href='http://localhost/21cake/cake/moma/goods/6'>goods6</a><br><a href='http://localhost/21cake/cake/moma/goods/7'>goods7</a><br><a href='http://localhost/21cake/cake/moma/goods/8'>goods8</a><br><a href='http://localhost/21cake/cake/moma/goods/9'>goods9</a><br><a href='http://localhost/21cake/cake/moma/goods/10'>goods10</a>";
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
