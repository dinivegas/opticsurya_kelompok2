package com.optiksurya.artikelapps;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.optiksurya.artikelapps.model.Artikel;

public class DetailActivity extends AppCompatActivity {

    public static final String EXTRA_ARTIKEL = "extra_artikel";

    @Override
    public boolean onSupportNavigateUp() {
                finish();
                return true;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        TextView judul, tvdeskripsi;
        ImageView Gambar;

        judul = findViewById(R.id.JudulArtikel);
        tvdeskripsi=  findViewById(R.id.tvOverview);
        Gambar = findViewById(R.id.LogoArtikel);

        Artikel artikel = getIntent().getParcelableExtra(EXTRA_ARTIKEL);
        setTitle(artikel.getJudul());

        judul.setText(artikel.getJudul());
        tvdeskripsi.setText(artikel.getDeskripsi());
        Gambar.setImageResource(artikel.getLogo());


    }
}
