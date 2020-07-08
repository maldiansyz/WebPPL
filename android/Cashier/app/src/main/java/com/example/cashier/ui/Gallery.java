package com.example.cashier.ui;

import android.app.Fragment;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;

import com.example.cashier.R;

public class Gallery extends Fragment {

    public Gallery(){}
    RelativeLayout view;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        view = (RelativeLayout) inflater.inflate(R.layout.fragment_gallery,container,false);

        getActivity().setTitle("jsdj");
        Log.e("Gallery", "Gallery");

        return view;
    }
}