<?php
namespace App\Controller;

class TestController extends
AppController{
  public function index(){
    // 対応するviewファイルを無視
//    $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
//    echo 'abc';
  }

  /*
      testControllerにアクションメソッドを作って画面表示

      ..../test/mode/5
      にアクセスすると、mode5と表示

      ..../test/mode/3
      にアクセスすると、
      mode3と表示
  */

  // modeアクションを作る。
    public function mode($num=''){   //「=''」は、何もないときはそのまんまになる。
      $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
      echo 'mode'.$num;

      // 他のメソッドを実行
      $this -> setAction('index');
      echo 'end';


      if($num=='5'){
        // リダイレクト
        echo "5";
      }
      if($num=='3'){
        // リダイレクト
        echo "3";
      }
    }



// helloアクションを作る。helloと表示されるようにする
  public function hello($num=''){   //「=''」は、何もないときはそのまんまになる。
    $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味

    if($num==''){
      // リダイレクト
      $this->redirect('/test/error');
    }else{
      echo 'hello'.$num;
    }
  }

  // studentアクションを作る。/test/student/1にアクセスしたら、halと表示
    public function student($num=''){   //「=''」は、何もないときはそのまんまになる。
      $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
      if($num==1){
        echo "hal";
      }else{
        echo "mode";
      }
    }

      public function error(){
        $this->autoRender = false; // これはテンプレートで決まってるデザインを無視するという意味
        echo 'error!';
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











*/
