package com.example.cashier.ui;

import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.cashier.Barang;
import com.example.cashier.BarangAdapter;
import com.example.cashier.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Home extends Fragment{

    public Home(){}
    View homeView;
    private static final String URL_PRODUCTS = "http://192.168.35.87/Appkasir/Api.php";

    //a list to store all the products
    List<Barang> barangList;

    //the recyclerview
    RecyclerView recyclerView;
    BarangAdapter adapter;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        homeView = inflater.inflate(R.layout.fragment_home,container,false);
        //shopping cart

        //getting the recyclerview from xml
        recyclerView = homeView.findViewById(R.id.recylcerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
        barangList = new ArrayList<>();
        loadProducts();
        return homeView;


    }
    private void loadProducts() {
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL_PRODUCTS,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            //converting the string to json array object
                            JSONArray array = new JSONArray(response);

                            //traversing through all the object
                            for (int i = 0; i < array.length(); i++) {

                                //getting product object from json array
                                JSONObject productObj = array.getJSONObject(i);

                                //adding the product to product list

                                barangList.add(new Barang(
                                        productObj.getInt("id"),
                                        productObj.getString("nama"),
                                        productObj.getString("detail"),
                                        productObj.getDouble("nilai"),
                                        productObj.getDouble("harga"),
                                        productObj.getString("gbr")
                                ));
                            }

                            //creating adapter object and setting it to recyclerview
                            adapter = new BarangAdapter(getActivity(), barangList);
                            recyclerView.setAdapter(adapter);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getActivity(),error.getMessage(),Toast.LENGTH_SHORT).show();
                    }
                });
        //adding our stringrequest to queue
        Volley.newRequestQueue(getActivity()).add(stringRequest);
    }
}
