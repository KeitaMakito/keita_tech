package com.example.android_user.iw14a_kadai12_13;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    // メンバ変数を宣言
    private int leftValue;
    private String operator;

    private TextView tvIndi; // インジケータ
    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tvIndi=(TextView)findViewById(R.id.txtIndicator); // ここで表示をクリアし始める
        tvIndi.setText(""); // ここで表示をクリアし終わった

        // 数値ボタン
//        Button btnN1 = (Button)findViewById(R.id.btnNum1); ←これは改良前のやつ

        // これを配列化

        Button btnN[]=new Button[10];
        btnN[0]=(Button)findViewById(R.id.btnNum1);
        btnN[1]=(Button)findViewById(R.id.btnNum2);
        btnN[2]=(Button)findViewById(R.id.btnNum3);
        btnN[3]=(Button)findViewById(R.id.btnNum4);
        btnN[4]=(Button)findViewById(R.id.btnNum5);
        btnN[5]=(Button)findViewById(R.id.btnNum6);
        btnN[6]=(Button)findViewById(R.id.btnNum7);
        btnN[7]=(Button)findViewById(R.id.btnNum8);
        btnN[8]=(Button)findViewById(R.id.btnNum9);
        btnN[9]=(Button)findViewById(R.id.btnNum10);


        // 演算子を配列化
        Button btnOpe[] = new Button[4];
        btnOpe[0] =(Button)findViewById(R.id.btnPlus);
        btnOpe[1] =(Button)findViewById(R.id.btnMinus);
        btnOpe[2] =(Button)findViewById(R.id.btnKakeru);
        btnOpe[3] =(Button)findViewById(R.id.btnWaru);

        // ここでその演算処理をやる関数を呼び出す
        for(int i=0;i<btnOpe.length;i++){
            // 数値の数だけその処理をやる
            btnOpe[i].setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    opeBtnClicked(view);
                }
            });
        }



        // クリックイベント of the クリアボタン
        Button btnC = (Button)findViewById(R.id.btnClear);
        btnC.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clearBtnClicked();
            }
        });

        // クリックイベント of the =ボタン
        Button btnE = (Button)findViewById(R.id.btnEqual);
        btnE.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                equalBtnClicked();
            }
        });



        // クリックイベント
/*
        btnN1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                numBtnClicked(view);
            }
        });                         ←これを改良する    */


// 数値を押されたときの処理
        for(int i=0;i<btnN.length;i++){
            btnN[i].setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    numBtnClicked(view);
                }
            });
        }


    }


    //ボタンの数値を表示
    private void numBtnClicked(View view){
        Button btn = (Button)view;
        String s = tvIndi.getText().toString();
        s = s + btn.getText().toString(); // ボタンの文字列を取ってくる
        tvIndi.setText(s);
    }

    // クリア処理
    private void clearBtnClicked(){
        tvIndi.setText("");
    }

    // =ボタンが押されたときの処理
    private void equalBtnClicked(){
        int value =0;

        if(operator.equals("＋")) {
            value = leftValue + Integer.parseInt(tvIndi.getText().toString());
        }

        if(operator.equals("－")) {
            value = leftValue - Integer.parseInt(tvIndi.getText().toString());
        }

        if(operator.equals("×")) {
            value = leftValue * Integer.parseInt(tvIndi.getText().toString());
        }

        if(operator.equals("÷")) {
            value = leftValue / Integer.parseInt(tvIndi.getText().toString());
        }

        tvIndi.setText(String.valueOf(value));
    }

    // 演算キーが押されたときの処理
    private void opeBtnClicked(View view) {
        Button btn = (Button) view;
        operator = btn.getText().toString(); // オペレーターを保存
        leftValue = Integer.parseInt(tvIndi.getText().toString()); // 保存している
        tvIndi.setText(""); // 画面に出力
    }
}
