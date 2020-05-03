package com.optiksurya.artikelapps.model;

import android.os.Parcel;
import android.os.Parcelable;

public class Artikel implements Parcelable {
    private String Judul;
    private String deskripsi;
    private int logo;

    public String getJudul() {
        return Judul;
    }

    public void setJudul(String judul) {
        Judul = judul;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public int getLogo() {
        return logo;
    }

    public void setLogo(int logo) {
        this.logo = logo;
    }



    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.Judul);
        dest.writeString(this.deskripsi);
        dest.writeInt(this.logo);

    }
    public Artikel() {

    }
    protected Artikel(Parcel in){
        this.Judul = in.readString();
        this.deskripsi = in.readString();
        this.logo = in.readInt();

    }

    public static final Creator<Artikel> CREATOR = new Creator<Artikel>() {
        @Override
        public Artikel createFromParcel(Parcel source) {
            return new Artikel(source);
        }

        @Override
        public Artikel[] newArray(int size) {
            return new Artikel[size];
        }
    };
}
