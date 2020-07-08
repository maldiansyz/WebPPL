package com.example.cashier;


import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import java.text.NumberFormat;
import java.util.List;
import java.util.Locale;

public class BarangAdapter extends RecyclerView.Adapter<BarangAdapter.ProductViewHolder> {

    private Context mCtx;
    private List<Barang> barangList;
    Locale localeID = new Locale("in", "ID");
    NumberFormat formatRupiah = NumberFormat.getCurrencyInstance(localeID);

    public BarangAdapter(Context mCtx, List<Barang> productList) {
        this.mCtx = mCtx;
        this.barangList = productList;
    }

    @Override
    public ProductViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.product_list, null);
        return new ProductViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ProductViewHolder holder, int position) {
        Barang barang = barangList.get(position);

        //loading the image
        Glide.with(mCtx)
                .load(barang.getGbr())
                .into(holder.imageView);

        holder.textViewTitle.setText(barang.getNama());
        holder.textViewShortDesc.setText(barang.getDetail());
        holder.textViewRating.setText(String.valueOf(barang.getNilai()));
        holder.textViewPrice.setText(formatRupiah.format((barang.getHarga())));
    }
    @Override
    public int getItemCount() {
        return barangList.size();
    }

    class ProductViewHolder extends RecyclerView.ViewHolder {

        TextView textViewTitle, textViewShortDesc, textViewRating, textViewPrice;
        ImageView imageView;

        public ProductViewHolder(View itemView) {
            super(itemView);

            textViewTitle = itemView.findViewById(R.id.textViewTitle);
            textViewShortDesc = itemView.findViewById(R.id.textViewShortDesc);
            textViewRating = itemView.findViewById(R.id.textViewRating);
            textViewPrice = itemView.findViewById(R.id.textViewPrice);
            imageView = itemView.findViewById(R.id.imageView);
        }
    }
}