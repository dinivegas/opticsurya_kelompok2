package com.optiksurya.produk.model;


import android.os.Parcel;
import android.os.Parcelable;

public class ModelProduk implements Parcelable {

    private String id_produk, nama_produk, harga, stok, gambar;



    public String getId_produk() {
        return id_produk;
    }

    public void setId_produk(String id_produk) {
        this.id_produk = id_produk;
    }

    public String getNama_produk() {
        return nama_produk;
    }

    public void setNama_produk(String nama_produk) {
        this.nama_produk = nama_produk;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public String getStok() {
        return stok;
    }

    public void setStok(String stok) {
        this.stok = stok;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
    dest.writeString(this.nama_produk);;
    dest.writeString(this.harga);
    dest.writeString(this.stok);
    dest.writeString(this.gambar);
    }

    public ModelProduk() {
    }

    protected ModelProduk(Parcel in){
        this.nama_produk = in.readString();
        this.harga = in.readString();
        this.stok = in.readString();
        this.gambar = in.readString();
    }

    public static final Creator<ModelProduk> CREATOR = new Creator<ModelProduk>() {
        @Override
        public ModelProduk createFromParcel(Parcel source) {
            return new ModelProduk(source);
        }

        @Override
        public ModelProduk[] newArray(int size) {
            return new ModelProduk[size];
        }
    };
}

