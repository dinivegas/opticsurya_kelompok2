package com.example.logindanprofilefix;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class ProfileActivity extends AppCompatActivity {
    private static final String TAG = ProfileActivity.class.getSimpleName();
    private TextView nama_pelanggan, alamat, telepon;
    private Button button_logout;
    SessionManager sessionManager;
    String getId_pelanggan;

    private String URL="http://192.168.1.6:8080/optikrestapi/profile/readdetail";
    private String URL_Edit="http://192.168.1.6:8080/optikrestapi/profile/edit";
    private Menu action;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);
        // Assign ID's to textview and button.
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();

        nama_pelanggan = findViewById(R.id.nama_pelanggan);
        alamat = findViewById(R.id.alamat);
        telepon = findViewById(R.id.telepon);
        button_logout = findViewById(R.id.btn_logout);

        HashMap<String, String> pelanggan = sessionManager.getUserDetail();
        getId_pelanggan = pelanggan.get(sessionManager.ID_PELANGGAN);


        button_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                sessionManager.logout();
            }
        });
    }
    private void getUserDetail(){
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>(){
                    @Override
                    public void onResponse(String response){
                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("read");
                            if (success.equals("1")){
                                for (int i=0; i < jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    String strNama_pelanggan = object.getString("nama_pelanggan").trim();
                                    String strAlamat = object.getString("alamat").trim();
                                    String strTelepon = object.getString("telepon").trim();

                                    nama_pelanggan.setText(strNama_pelanggan);
                                    alamat.setText(strAlamat);
                                    telepon.setText(strTelepon);
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(ProfileActivity.this, "Error Membaca Detail" + e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error){
                        Toast.makeText(ProfileActivity.this, "Error Membaca Detail" + error.toString(), Toast.LENGTH_SHORT).show();

                    }
                })
        {
            @Override
            protected Map<String,String> getParams(){
                Map<String, String> params = new HashMap<>();

                // Adding All values to Params.
                // The firs argument should be same sa your MySQL database table columns.
                params.put("id_pelanggan", getId_pelanggan);
                return params;

            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        // Adding the StringRequest object into requestQueue.
        requestQueue.add(stringRequest);

    }

    @Override
    protected void onResume() {
        super.onResume();
        getUserDetail();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.menu_action, menu);

        action = menu;
        action.findItem(R.id.menu_save).setVisible(false);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.menu_edit:

                nama_pelanggan.setFocusableInTouchMode(true);
                alamat.setFocusableInTouchMode(true);
                telepon.setFocusableInTouchMode(true);

                InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                imm.showSoftInput(nama_pelanggan, InputMethodManager.SHOW_IMPLICIT);

                action.findItem(R.id.menu_edit).setVisible(false);
                action.findItem(R.id.menu_save).setVisible(true);

                return true;

            case R.id.menu_save:

                SaveEditDetail();
                action.findItem(R.id.menu_edit).setVisible(true);
                action.findItem(R.id.menu_save).setVisible(false);

                nama_pelanggan.setFocusableInTouchMode(false);
                alamat.setFocusableInTouchMode(false);
                telepon.setFocusableInTouchMode(false);

                nama_pelanggan.setFocusable(false);
                alamat.setFocusable(false);
                telepon.setFocusable(false);

                return true;
            default:
                return super.onOptionsItemSelected(item);

        }
    }

    private void SaveEditDetail() {
        final String nama_pelanggan = this.nama_pelanggan.getText().toString().trim();
        final String alamat = this.alamat.getText().toString().trim();
        final String telepon = this.telepon.getText().toString().trim();
        final String id_pelanggan = getId_pelanggan;

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("...Sedang Menyimpan");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_Edit,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")){
                                Toast.makeText(ProfileActivity.this, "Sukses!", Toast.LENGTH_SHORT).show();
                            }

                        } catch (JSONException e) {
                            progressDialog.dismiss();
                            e.printStackTrace();
                            Toast.makeText(ProfileActivity.this, "Error " + e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener(){
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(ProfileActivity.this, "Error " + error.toString(), Toast.LENGTH_SHORT).show();

                    }
                })
        {
            @Override
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<String, String>();

                // Adding All values to Params.
                // The firs argument should be same sa your MySQL database table columns.
                params.put("nama_pelanggan", nama_pelanggan);
                params.put("alamat", alamat);
                params.put("telepon", telepon);
                params.put("id_pelanggan", id_pelanggan);

                return params;

            }
        };
        // Creating RequestQueue.
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        // Adding the StringRequest object into requestQueue.
        requestQueue.add(stringRequest);
    }
}