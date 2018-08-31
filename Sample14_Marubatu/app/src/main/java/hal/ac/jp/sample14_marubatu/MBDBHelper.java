package hal.ac.jp.sample14_marubatu;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by android_user on 2018/02/28.
 */

// データベース情報を定義する
public class MBDBHelper extends SQLiteOpenHelper {

    // データベース名
    private static final String DB_NAME="marubatu.db";

    // データベースバージョン
    private static final int DB_VERSION=1;

    // テーブル名
    public static final String TABLE_NAME = "record";

    // ○勝数カラム
    public static final String MARU_WIN = "maru_win";

    // ×勝数カラム
    public static final String BATU_WIN = "batu_win";

    // 引き分け数カラム
    public static final String DRAW = "draw";

    public MBDBHelper(Context context) {
        super(context, DB_NAME, null, DB_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createTable=
                "CREATE TABLE " + TABLE_NAME + "("+ MARU_WIN +" INTEGER," + BATU_WIN +" INTEGER," + DRAW +" INTEGER" +")";
        db.execSQL(createTable);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
