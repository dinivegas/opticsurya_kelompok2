package com.optiksurya.artikelapps;

import android.content.Context;
import android.content.res.TypedArray;
import android.net.Uri;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.optiksurya.artikelapps.adapter.ArtikelAdapter;
import com.optiksurya.artikelapps.model.Artikel;

import java.util.ArrayList;



public class ArtikelFragment extends Fragment {
    private String[] judul, deskripsi;
    private TypedArray logo;
    private ArtikelAdapter artikelAdapter;
    private RecyclerView rvartikel;
    private ArrayList<Artikel> listArtikel = new ArrayList<>();



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_artikel, container, false);
        artikelAdapter = new ArtikelAdapter(getContext());
        rvartikel = view.findViewById(R.id.rvartikel);
        rvartikel.setLayoutManager(new LinearLayoutManager(getContext()));
        rvartikel.setAdapter(artikelAdapter);

        addItem();

        return view;


    }

    private void addItem() {
        judul = getResources().getStringArray(R.array.nama_artikel);
        deskripsi = getResources().getStringArray(R.array.artikel);
        logo = getResources().obtainTypedArray(R.array.logo_artikel);
        listArtikel = new ArrayList<>();

        for (int i = 0; i < judul.length; i++){
            Artikel artikel = new Artikel();
            artikel.setJudul(judul[i]);
            artikel.setDeskripsi(deskripsi[i]);
            artikel.setLogo(logo.getResourceId(i, -1));
            listArtikel.add(artikel);

        }

        artikelAdapter.setListArtikel(listArtikel);
    }


}
