package com.optiksurya.produk;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.optiksurya.produk.Adapter.ProdukAdapter;
import com.optiksurya.produk.model.ModelData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;

public class KategoriActivity extends AppCompatActivity {

    private static final String TAG = KategoriActivity.class.getSimpleName();
    private List<ModelData> listModelData = new ArrayList<>();
    private RecyclerView recyclerView;



    @RequiresApi(api = Build.VERSION_CODES.KITKAT)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kategori);
        Objects.requireNonNull(getSupportActionBar()).setTitle("Kategori");

        recyclerView = findViewById(R.id.recycleview_id);
        getListModelData();

    }

    private void getListModelData() {
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        String data_url = "http://192.168.43.146/katalog/kategori.php";
        StringRequest stringRequest = new StringRequest(Request.Method.GET, data_url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG,response);
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String error = jsonObject.getString("error");
                            if (status.equals("200") && error.equals("false")){
                                JSONArray jsonArray = jsonObject.getJSONArray("data");
                                for (int i=0; i < jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String strId_kategori = object.getString("id_kategori").trim();
//                                    String strSlug_kategori = object.getString("slug_kategori").trim();
                                    String strNama_kategori = object.getString("nama_kategori").trim();
//                                    String strUrutan = object.getString("urutan").trim();
//                                    String strTgl_update = object.getString("tgl_update").trim();

                                    ModelData data = new ModelData();
                                   data.setId_kategori(strId_kategori);
                                    data.setNama_kategori(strNama_kategori);

                                    listModelData.add(data);
                                    //Toast.makeText(MhsActivity.this, strNim+"\n"+strNama+"\n"+strFoto+"\n\n", Toast.LENGTH_SHORT).show();
                                }
                                //Toast.makeText(MhsActivity.this,"Size of Liste "+String.valueOf(listMhs.size()),Toast.LENGTH_SHORT).show();
                                //Toast.makeText(MhsActivity.this,listMhs.get(1).toString(),Toast.LENGTH_SHORT).show();
                                setuprecyclerview(listModelData);
                            } else {
                                Toast.makeText(KategoriActivity.this, "Tidak dapat memuat data", Toast.LENGTH_SHORT).show();
                            }
                            //setuprecyclerview(listMhs);
                        } catch (JSONException e){
                            e.printStackTrace();
                            Toast.makeText(KategoriActivity.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(KategoriActivity.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    public void setuprecyclerview(List<ModelData> listModelData){
        ProdukAdapter produkAdapter = new ProdukAdapter(this, listModelData);
        recyclerView.setLayoutManager(new LinearLayoutManager(getBaseContext(),LinearLayoutManager.VERTICAL,false));
        recyclerView.setAdapter(produkAdapter);
    }
    }


