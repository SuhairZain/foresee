package com.safetyhack.speedsense;

import java.util.List;

import retrofit.Callback;
import retrofit.http.GET;
import retrofit.http.Query;

/**
 * Created by ValmeekiOne on 8/23/2015.
 */
interface MarkerInterface {
    @GET("/speedsense/test.php")
    void listRepos(@Query("lat") double lat, @Query("lon") double lon, Callback<List<MarkerInfo>> markers);
}