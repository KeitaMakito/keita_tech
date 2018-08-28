package hal.ac.jp.sample14_marubatu;

import android.content.DialogInterface;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    // -1:空白 0:○ 1:×
    private int imageViews[][] = {
            {-1,-1,-1},
            {-1,-1,-1},
            {-1,-1,-1}
    };

    private ImageView img[][] = new ImageView[3][3]; // 3*3のImageViewの配列
    private int player = 0; //0:○、1:×
    int maru_win = 0;
    int batu_win = 0;
    int draw = 0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        img[0][0] = (ImageView) findViewById(R.id.img00);
        img[0][1] = (ImageView) findViewById(R.id.img01);
        img[0][2] = (ImageView) findViewById(R.id.img02);
        img[1][0] = (ImageView) findViewById(R.id.img03);
        img[1][1] = (ImageView) findViewById(R.id.img04);
        img[1][2] = (ImageView) findViewById(R.id.img05);
        img[2][0] = (ImageView) findViewById(R.id.img06);
        img[2][1] = (ImageView) findViewById(R.id.img07);
        img[2][2] = (ImageView) findViewById(R.id.img08);



        img[0][0].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(0, 0);
            }
        });
        img[0][1].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(0, 1);
            }
        });
        img[0][2].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(0, 2);
            }
        });
        img[1][0].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(1, 0);
            }
        });
        img[1][1].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(1, 1);
            }
        });
        img[1][2].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(1, 2);
            }
        });
        img[2][0].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(2, 0);
            }
        });
        img[2][1].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(2, 1);
            }
        });
        img[2][2].setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                select(2, 2);
            }
        });

        MBDBHelper helper = new MBDBHelper(this);
        SQLiteDatabase database = helper.getWritableDatabase();

        Cursor cursor = database.rawQuery(
                "SELECT * FROM record", null);
        if(cursor.moveToNext()){

            // ○の勝数を取り出す
            maru_win = cursor.getInt(
                    cursor.getColumnIndex("maru_win"));

            // ×の勝数を取り出す
            batu_win = cursor.getInt(
                    cursor.getColumnIndex("batu_win"));

            // 引き分け数を取り出す
            draw = cursor.getInt(
                    cursor.getColumnIndex("draw"));

        }else{
            database.execSQL("INSERT INTO record VALUES (0, 0, 0)");
        }
        cursor.close();
        database.close();

        TextView txtRecord = (TextView)findViewById(R.id.txtRecord);
        txtRecord.setText(String.format(getString(R.string.record),maru_win,batu_win,draw));
    }

    private void select(int i, int j) {
        if (imageViews[i][j] == -1) {
            if (player == 0) {
                img[i][j].setImageResource(R.drawable.maru_t);
                imageViews[i][j] = 0;
                player = 1;
            } else {
                img[i][j].setImageResource(R.drawable.batu_t);
                imageViews[i][j] = 1;
                player = 0;
            }
        }

        TextView txtResult = (TextView)findViewById(R.id.textResult);

        // 一番上１列
        if(imageViews[0][0] == 0 && imageViews[0][1] == 0 && imageViews[0][2] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][0] == 1 && imageViews[0][1] == 1 && imageViews[0][2] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 上から２番目の１列
        if(imageViews[1][0] == 0 && imageViews[1][1] == 0 && imageViews[1][2] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[1][0] == 1 && imageViews[1][1] == 1 && imageViews[1][2] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 上から３番目の１列
        if(imageViews[2][0] == 0 && imageViews[2][1] == 0 && imageViews[2][2] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[2][0] == 1 && imageViews[2][1] == 1 && imageViews[2][2] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 一番左１行
        if(imageViews[0][0] == 0 && imageViews[1][0] == 0 && imageViews[2][0] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][0] == 1 && imageViews[1][0] == 1 && imageViews[2][0] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 左から２番目の１列
        if(imageViews[0][1] == 0 && imageViews[1][1] == 0 && imageViews[2][1] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][0] == 1 && imageViews[1][1] == 1 && imageViews[2][1] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 左から３番目の１列
        if(imageViews[0][2] == 0 && imageViews[1][2] == 0 && imageViews[2][2] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][0] == 1 && imageViews[1][2] == 1 && imageViews[2][2] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 斜め右上から左下
        if(imageViews[0][2] == 0 && imageViews[1][1] == 0 && imageViews[2][0] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][2] == 1 && imageViews[1][1] == 1 && imageViews[2][0] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        // 斜め左上から右下
        if(imageViews[0][0] == 0 && imageViews[1][1] == 0 && imageViews[2][2] == 0){
            txtResult.setText(R.string.result_maruwin);
            maru_win += 1;
        }
        if(imageViews[0][0] == 1 && imageViews[1][1] == 1 && imageViews[2][2] == 1){
            txtResult.setText(R.string.result_batuwin);
            batu_win += 1;
        }

        MBDBHelper helper = new MBDBHelper(this);
        SQLiteDatabase database = helper.getWritableDatabase();
                 database.execSQL("UPDATE record SET maru_win =" + maru_win + ", batu_win =" +batu_win );
            database.close();

        TextView txtRecord = (TextView)findViewById(R.id.txtRecord);
        txtRecord.setText(String.format(getString(R.string.record),maru_win,batu_win,draw));
    }
}
