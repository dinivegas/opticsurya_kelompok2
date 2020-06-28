package com.optiksurya.produk.Adapter;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.recyclerview.widget.RecyclerView;

import com.optiksurya.produk.DetailProdukActivity;
import com.optiksurya.produk.R;
import com.optiksurya.produk.model.ModelData;

import java.util.List;

public class ProdukAdapter extends RecyclerView.Adapter<ProdukAdapter.ProdukViewHolder> {
    Context context;
    private List<ModelData> item;

    public ProdukAdapter(Context context, List<ModelData> item) {
        this.context = context;
        this.item = item;
    }

    @NonNull
    @Override
    public ProdukViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.kategori_list, parent,
                false);
        ProdukViewHolder produkHolder = new ProdukViewHolder(view);
        return produkHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull ProdukViewHolder produkViewHolder, @SuppressLint("RecyclerView") final int i) {

        produkViewHolder.nama_kategori.setText(item.get(i).getNama_kategori());

        produkViewHolder.linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, DetailProdukActivity.class);
                intent.putExtra("id", item.get(i).getId_kategori());
                context.startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return item.size();
    }

    static  class ProdukViewHolder extends  RecyclerView.ViewHolder{

        TextView  nama_kategori;
        ConstraintLayout linearLayout;

        public ProdukViewHolder(View itemView) {
            super(itemView);

            nama_kategori = itemView.findViewById(R.id.nama_kategori);
            linearLayout = itemView.findViewById(R.id.linearLayout2);

        }
    }
    }

