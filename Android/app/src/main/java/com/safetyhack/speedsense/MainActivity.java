package com.safetyhack.speedsense;

import android.location.Location;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;

import com.mapbox.mapboxsdk.geometry.LatLng;
import com.mapbox.mapboxsdk.overlay.Icon;
import com.mapbox.mapboxsdk.overlay.Marker;
import com.mapbox.mapboxsdk.views.MapView;

import java.util.ArrayList;
import java.util.List;

import fr.quentinklein.slt.LocationTracker;
import retrofit.Callback;
import retrofit.RestAdapter;
import retrofit.RetrofitError;
import retrofit.client.Response;

public class MainActivity extends AppCompatActivity {

    private List<Marker> markers = new ArrayList<>();
    private MapView mapView;
    private boolean firstTime = true;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mapView = (MapView)findViewById(R.id.mapview);
        mapView.setUserLocationEnabled(true);

        makeRestCall();
        /*mapView.setCenter(mapView.getTileProvider().getCenterCoordinate());
        mapView.setUserLocationEnabled(true);*/
    }

    public void makeRestCall(){

        RestAdapter restAdapter = new RestAdapter.Builder()
                .setEndpoint("http://krsh.colorowebs.com")
                .build();

        final MarkerInterface service = restAdapter.create(MarkerInterface.class);

        final Callback<List<MarkerInfo>> callback = new Callback<List<MarkerInfo>>(){

            @Override
            public void success(List<MarkerInfo> markerInfos, Response response) {
                Log.d("Main", "Markers success " + markerInfos.size());
                if(!firstTime)
                    mapView.removeMarkers(markers);
                else
                    firstTime = false;
                for(MarkerInfo markerInfo: markerInfos){
                    Log.d("Info", markerInfo.location + " - " + markerInfo.speed + " - " + markerInfo.lat + " - " + markerInfo.lon);
                    Marker marker = getMarker(markerInfo);
                    MainActivity.this.markers.add(marker);
                    mapView.addMarker(marker);
                }
            }

            @Override
            public void failure(RetrofitError error) {
                error.printStackTrace();
            }
        };

        new LocationTracker(this) {
            @Override
            public void onLocationFound(@NonNull Location location) {
                Log.d("Location Found", location.getLatitude() + " - " + location.getLongitude());
                service.listRepos(location.getLatitude(), location.getLongitude(), callback);
            }

            @Override
            public void onTimeout() {

            }
        };

    }

    public Marker getMarker(MarkerInfo info){
        String range;
        if(info.speed<20)
            range = "(High traffic)";
        else if(info.speed<40)
            range = "(Medium traffic)";
        else
            range = "(Low traffic)";

        Marker marker = new Marker(mapView, info.location,
                info.location + " - " + info.speed + "km/h\n" + range,
                new LatLng(info.lat, info.lon));
        marker.setIcon(new Icon(this, Icon.Size.LARGE, "", "1087bf"));
        return marker;
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
