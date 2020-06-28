package com.optiksurya.produk.Adapter;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.optiksurya.produk.R;
import com.optiksurya.produk.model.ModelProduk;


import java.util.List;

public class DetailAdapter extends RecyclerView.Adapter<DetailAdapter.DetailViewHolder> {
   private Context context;
    private List<ModelProduk> Ditem;


    public DetailAdapter(Context context, List<ModelProduk> Ditem) {
        this.context = context;
        this.Ditem = Ditem;
    }


    @NonNull
    @Override
    public DetailAdapter.DetailViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context)
                .inflate(R.layout.produk_list, parent, false);

        return new DetailViewHolder(view);
//        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.produk_list, parent,
//                false);
//        DetailViewHolder detailHolder = new DetailViewHolder(view);
//        return detailHolder;
    }




    @Override
    public void onBindViewHolder(@NonNull DetailAdapter.DetailViewHolder holder, int position) {
        holder.bind(Ditem.get(position));
    }


    @Override
    public int getItemCount() {
        return Ditem.size();
    }

    class DetailViewHolder extends RecyclerView.ViewHolder {
        TextView nama_produk, harga, stok;
        ImageView gambar;
        ConstraintLayout linearLayout;


        public DetailViewHolder(@NonNull View itemView) {
            super(itemView);

            nama_produk = itemView.findViewById(R.id.nama_produk);
            harga = itemView.findViewById(R.id.harga);
            stok = itemView.findViewById(R.id.stok);
            gambar = itemView.findViewById(R.id.gambar);


        }


        public void bind(ModelProduk modelProduk) {
            nama_produk.setText(modelProduk.getNama_produk());
            harga.setText(modelProduk.getHarga());
            stok.setText(modelProduk.getStok());


            Glide.with(context)
                    .load(modelProduk.getGambar())
                    .placeholder(R.mipmap.ic_launcher)
                    .into(gambar);
        }
    }
}



