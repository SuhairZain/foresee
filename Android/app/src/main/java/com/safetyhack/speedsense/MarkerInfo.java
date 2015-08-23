package com.safetyhack.speedsense;

/**
 * Created by ValmeekiOne on 8/23/2015.
 */
public class MarkerInfo {

    String location;
    int speed;
    double lat, lon;

    public MarkerInfo(String location, int speed, double lat, double lon){
        this.location = location;
        this.speed = speed;
        this.lat = lat;
        this.lon = lon;
    }
}
