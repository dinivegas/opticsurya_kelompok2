package com.optiksurya.artikelapps.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.optiksurya.artikelapps.DetailActivity;
import com.optiksurya.artikelapps.R;
import com.optiksurya.artikelapps.model.Artikel;

import java.util.ArrayList;

public class ArtikelAdapter extends RecyclerView.Adapter<ArtikelAdapter.ArtikelViewHolder> {
    private Context context;
    private ArrayList<Artikel> listArtikel;

    public ArtikelAdapter(Context context) { this.context = context;}

    public ArrayList<Artikel> getListArtikel() {
        return listArtikel;
    }

    public void setListArtikel(ArrayList<Artikel> listArtikel) { this.listArtikel = listArtikel; }

    @NonNull
    @Override
    public ArtikelAdapter.ArtikelViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()). inflate(R.layout.list_item,parent, false);
        return new ArtikelViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ArtikelAdapter.ArtikelViewHolder holder, final int position) {
    holder.judul.setText(getListArtikel().get(position).getJudul());
    holder.Gambar.setImageResource(getListArtikel().get(position).getLogo());

        holder.itemView .setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent intent = new Intent (context, DetailActivity.class);
                intent.putExtra(DetailActivity.EXTRA_ARTIKEL, listArtikel.get(position));
                context.startActivity(intent);

            }

    });


    }

    @Override
    public int getItemCount() { return getListArtikel ().size(); }

    public class ArtikelViewHolder extends  RecyclerView.ViewHolder{
        TextView judul;
        ImageView Gambar;

        public ArtikelViewHolder(@NonNull View itemView) {
            super(itemView);

            judul = itemView.findViewById(R.id.judul);
            Gambar= itemView.findViewById(R.id.Gambar);

        }
    }

}
