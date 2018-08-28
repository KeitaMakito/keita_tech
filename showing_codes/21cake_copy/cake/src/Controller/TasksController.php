<?php
namespace App\Controller;

use App\Controller\AppController;

class TasksController extends AppController
{

	//初期設定
	public function initialize(){

		parent::initialize();
		//共通のテンプレートtemplate1を指定
//		$this->viewBuilder()->layout('template1');
	}


	public function index()
    {
			// DBから全データ抽出
			$all = $this->Tasks->find('all');
			// ビューにわたす
			$this->set('all',$all);
    }

	// 新規追加と修正
	// tasks/ にアクセスすると　新規作成
	// tasks/id番号　にアクセスすると　編集　
	public function edit($id="")
    {

			if($id==""){
				//新規登録
				$task = $this->Tasks->newEntity();
			}else{
				// 更新 idがあった場合
				// 指定idのエンティティを取得
				$task = $this->Tasks->get($id);
			}

			// ビューに渡す
			$this->set('task',$task);

			// 登録ボタンを押されたとき
			// ＰＯＳＴでデータが送られてきた時
			if($this->request->is(['post','put'])){
				// ＤＢに保存
				// 送られてきたデータをセット
				$task = $this->Tasks->patchEntity($task,$this->request->data);
				// 保存
				if($this->Tasks->save($task)){
					// リダイレクト
					$this->redirect('/tasks/index');
				}
			}
    }

	public function search(){

	}

	public function delete()
    {

    }

}
