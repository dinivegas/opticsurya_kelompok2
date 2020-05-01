package com.example.formloginregister;
import androidx.appcompat.app.AppCompatActivity;
import android.app.ProgressDialog;
import android.content.Intent;
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

public class MainActivity extends AppCompatActivity {

    // Creating EditText.
    EditText Email, Password;

    // Creating button;
    Button LoginButton, button_daftar;

    // Creating Volley RequestQueue.
    RequestQueue requestQueue;

    // Create string variable to hold the EditText Value.
    String EmailHolder, PasswordHolder;

    // Creating Progress dialog.
    ProgressDialog progressDialog;

    // Storing server url into String variable.
    String HttpUrl = "http://192.168.43.112:8080/optikmobile/login.php";

    Boolean CheckEditText;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        // Assigning ID's to EditText.
        Email = (EditText) findViewById(R.id.email);

        Password = (EditText) findViewById(R.id.password);

        // Assigning ID's to Button.
        LoginButton = (Button) findViewById(R.id.button_login);

        button_daftar = (Button) findViewById(R.id.button_daftar);

        // membuat Volley newRequestQueue .
        requestQueue = Volley.newRequestQueue(MainActivity.this);

        // Assigning Activity this to progress dialog.
        progressDialog = new ProgressDialog(MainActivity.this);



        // menambah click listener ke button.
        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                CheckEditTextIsEmptyOrNot();

                if (CheckEditText) {

                    UserLogin();

                } else {

                    Toast.makeText(MainActivity.this, "Form harus terisi.", Toast.LENGTH_LONG).show();

                }

            }
        });
        //menambah click listener button form daftar
        button_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this, RegisterActivity.class));
            }
        });
    }


    // Creating user login function.
    public void UserLogin() {

        // menampilkan progress dialog saat proses login
        progressDialog.setMessage("Please Wait");
        progressDialog.show();

        // Creating string request with post method.
        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {

                        // Hiding the progress dialog after all task complete.
                        progressDialog.dismiss();

                        // Matching server responce message to our text.
                        if(ServerResponse.equalsIgnoreCase("Data Matched")) {

                            // If response matched then show the toast.
                            Toast.makeText(MainActivity.this, "Log In Sukses", Toast.LENGTH_LONG).show();

                            // Finish the current Login activity.
                            finish();

                            // Opening the user profile activity using intent.
                            Intent intent = new Intent(MainActivity.this, ProfileActivity.class);

                            // Sending User Email to another activity using intent.
                            intent.putExtra("UserEmailTAG", EmailHolder);

                            startActivity(intent);
                        }
                        else {

                            // Showing Echo Response Message Coming From Server.
                            Toast.makeText(MainActivity.this, ServerResponse, Toast.LENGTH_LONG).show();

                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {

                        // Hiding the progress dialog after all task complete.
                        progressDialog.dismiss();

                        // Showing error message if something goes wrong.
                        Toast.makeText(MainActivity.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {

                // Creating Map String Params.
                Map<String, String> params = new HashMap<String, String>();

                // Adding All values to Params.
                // The firs argument should be same sa your MySQL database table columns.
                params.put("email", EmailHolder);
                params.put("password", PasswordHolder);

                return params;
            }

        };

        // Creating RequestQueue.
        RequestQueue requestQueue = Volley.newRequestQueue(MainActivity.this);

        // Adding the StringRequest object into requestQueue.
        requestQueue.add(stringRequest);

    }


    public void CheckEditTextIsEmptyOrNot() {

        // Getting values from EditText.
        EmailHolder = Email.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();

        // Checking whether EditText value is empty or not.
        if (TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder)) {

            // If any of EditText is empty then set variable value as False.
            CheckEditText = false;

        } else {

            // If any of EditText is filled then set variable value as True.
            CheckEditText = true;
        }
    }
}