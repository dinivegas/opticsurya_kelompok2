package com.optiksurya.produk;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.Intent;
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
import com.optiksurya.produk.Adapter.DetailAdapter;
import com.optiksurya.produk.model.ModelProduk;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;

public class DetailProdukActivity extends AppCompatActivity {
    private static final String TAG = KategoriActivity.class.getSimpleName();
    private List<ModelProduk> listModelProduk = new ArrayList<>();
    private RecyclerView recyclerView;


    @RequiresApi(api = Build.VERSION_CODES.KITKAT)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_produk);
        Objects.requireNonNull(getSupportActionBar()).setTitle("Data Produk");

        recyclerView = findViewById(R.id.recycleview_id);
        getListModelProduk();

    }

    private void getListModelProduk() {
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        Intent data = getIntent();
        String data_url = "http://192.168.1.27/optik/det_kategori/det_kategori?id_kategori="+data.getStringExtra("id");
        StringRequest stringRequest = new StringRequest(Request.Method.GET, data_url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG,response);
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                           // String error = jsonObject.getString("error");
                            if (success.equals("200")){
                                JSONArray jsonArray = jsonObject.getJSONArray("detail");
                                for (int i=0; i < jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String strId_produk = object.getString("id_produk").trim();
//                                    String strId_user = object.getString("id_user").trim();
//                                    String strId_kategori = object.getString("id_kategori").trim();
//                                    String strKd_produk = object.getString("kd_produk").trim();
                                    String strNama_produk = object.getString("nama_produk").trim();
//                                    String strSlug_produk = object.getString("slug_produk").trim();
//                                    String strKeterangan = object.getString("keterangan").trim();
//                                    String strKeyword = object.getString("keyword").trim();
                                    String strHarga = object.getString("harga").trim();
                                    String strStok = object.getString("stok").trim();
                                    String strGambar = object.getString("gambar").trim();
//                                    String strBerat = object.getString("berat").trim();
//                                    String strStatus_produk = object.getString("status_produk").trim();
//                                    String strTgl_post = object.getString("tgl_post").trim();
//                                    String strTgl_update = object.getString("tgl_update").trim();

                                    ModelProduk data = new ModelProduk();
                                    data.setId_produk(strId_produk);
                                    data.setNama_produk(strNama_produk);
                                    data.setHarga(strHarga);
                                    data.setStok(strStok);
                                    data.setGambar("http://192.168.1.27/optik/assets/upload/image/thumbs/"+strGambar);

                                    listModelProduk.add(data);
                                    //Toast.makeText(MhsActivity.this, strNim+"\n"+strNama+"\n"+strFoto+"\n\n", Toast.LENGTH_SHORT).show();
                                }
                                //Toast.makeText(MhsActivity.this,"Size of Liste "+String.valueOf(listMhs.size()),Toast.LENGTH_SHORT).show();
                                //Toast.makeText(MhsActivity.this,listMhs.get(1).toString(),Toast.LENGTH_SHORT).show();
                              setuprecyclerview(listModelProduk);
                            } else {
                                Toast.makeText(DetailProdukActivity.this, "Tidak dapat memuat data", Toast.LENGTH_SHORT).show();
                            }
                            //setuprecyclerview(listMhs);
                        } catch (JSONException e){
                            e.printStackTrace();
                            Toast.makeText(DetailProdukActivity.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(DetailProdukActivity.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
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

    public void setuprecyclerview(List<ModelProduk> listModelProduk){
        DetailAdapter detailAdapter = new DetailAdapter(this, listModelProduk);
        recyclerView.setLayoutManager(new LinearLayoutManager(getBaseContext(),LinearLayoutManager.VERTICAL,false));
        recyclerView.setAdapter(detailAdapter);
    }
}
