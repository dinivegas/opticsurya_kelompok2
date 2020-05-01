package com.example.formloginregister;
import androidx.appcompat.app.AppCompatActivity;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {

    EditText FullName, Email, Password, Alamat, Telepon;
    Button button_daftar;
    RequestQueue requestQueue;
    String NameHolder, EmailHolder, PasswordHolder, AlamatHolder, TeleponHolder;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.43.112:8080/optikmobile/registrasi.php";
    Boolean CheckEditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        // Assigning ID's to EditText.
        FullName = (EditText) findViewById(R.id.nama);

        Email = (EditText) findViewById(R.id.email);

        Password = (EditText) findViewById(R.id.password);
        Alamat = (EditText) findViewById(R.id.alamat);
        Telepon = (EditText) findViewById(R.id.telepon);

        // Assigning ID's to Button.
        button_daftar = (Button) findViewById(R.id.button_daftar);

        // Creating Volley newRequestQueue .
        requestQueue = Volley.newRequestQueue(RegisterActivity.this);

        // Assigning Activity this to progress dialog.
        progressDialog = new ProgressDialog(RegisterActivity.this);

        // Adding click listener to button.
        button_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                CheckEditTextIsEmptyOrNot();
                if(CheckEditText){
                    UserRegistration();
                }
                else {
                    Toast.makeText(RegisterActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();
                }

            }
        });

    }

    public void UserRegistration(){

        // Showing progress dialog at user registration time.
        progressDialog.setMessage("Please Wait, We are Inserting Your Data on Server");
        progressDialog.show();

        // Creating string request with post method.
        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String ServerResponse) {

                        // Hiding the progress dialog after all task complete.
                        progressDialog.dismiss();

                        // Showing Echo Response Message Coming From Server.
                        Toast.makeText(RegisterActivity.this, ServerResponse, Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {

                        // Hiding the progress dialog after all task complete.
                        progressDialog.dismiss();

                        // Showing error message if something goes wrong.
                        Toast.makeText(RegisterActivity.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {

                // Creating Map String Params.
                Map<String, String> params = new HashMap<String, String>();

                // Adding All values to Params.
                // The firs argument should be same as your MySQL database table columns.
                params.put("email", EmailHolder);
                params.put("password", PasswordHolder);
                params.put("nama_pelanggan", NameHolder);
                params.put("alamat", AlamatHolder);
                params.put("telepon", TeleponHolder);
                return params;
            }
        };

        // Creating RequestQueue.
        RequestQueue requestQueue = Volley.newRequestQueue(RegisterActivity.this);

        // Adding the StringRequest object into requestQueue.
        requestQueue.add(stringRequest);

    }


    public void CheckEditTextIsEmptyOrNot(){

        // Getting values from EditText.
        NameHolder = FullName.getText().toString().trim();
        EmailHolder = Email.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();
        AlamatHolder = Alamat.getText().toString().trim();
        TeleponHolder = Telepon.getText().toString().trim();

        // Checking whether EditText value is empty or not.
        if(TextUtils.isEmpty(NameHolder) || TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder) || TextUtils.isEmpty(AlamatHolder) || TextUtils.isEmpty(TeleponHolder))
        {

            // If any of EditText is empty then set variable value as False.
            CheckEditText = false;

        }
        else {

            // If any of EditText is filled then set variable value as True.
            CheckEditText = true ;
        }
    }

}

