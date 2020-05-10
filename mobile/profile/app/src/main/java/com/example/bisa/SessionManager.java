package com.example.bisa;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import java.util.HashMap;

public class SessionManager {

        SharedPreferences sharedPreferences;
        public SharedPreferences.Editor editor;
        public Context context;
        int PRIVATE_MODE=0;

        private static final String PREF_NAME = "LOGIN";
        private static final String LOGIN="IS_LOGIN";
        public static final String NAMA_PELANGGAN ="NAMA_PELANGGAN";
        public static final String EMAIL="EMAIL";
        public static final String ID_PELANGGAN="ID_PELANGGAN";


        public SessionManager(Context context){
            this.context = context;
            sharedPreferences = context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
            editor = sharedPreferences.edit();
        }

        public void createSession(String nama_pelanggan, String email, String id_pelanggan) {
        editor.putBoolean(LOGIN, true);
        editor.putString(NAMA_PELANGGAN, nama_pelanggan);
        editor.putString(EMAIL, email);
        editor.putString(ID_PELANGGAN, id_pelanggan);
        editor.apply();
        }

        public boolean isLogin(){

            return sharedPreferences.getBoolean(LOGIN,false);
        }
        public void checkLogin(){
        if (!this.isLogin()){
            Intent i = new Intent(context, LoginActivity.class);
            context.startActivity(i);
            ((ProfileActivity)context).finish();
            }
        }

        public HashMap<String, String> getUserDetail() {
        HashMap<String, String > pelanggan = new HashMap<>();
        pelanggan.put(NAMA_PELANGGAN, sharedPreferences.getString(NAMA_PELANGGAN, null));
        pelanggan.put(EMAIL, sharedPreferences.getString(EMAIL, null));
        pelanggan.put(ID_PELANGGAN, sharedPreferences.getString(ID_PELANGGAN, null));

        return pelanggan;
    }
    public void logout(){

        editor.clear();
        editor.commit();
        Intent i = new Intent(context, LoginActivity.class);
        context.startActivity(i);
        ((ProfileActivity) context).finish();

    }



}
