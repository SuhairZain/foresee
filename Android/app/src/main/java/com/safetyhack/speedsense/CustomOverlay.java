package com.safetyhack.speedsense;

import android.graphics.Canvas;
import android.text.TextPaint;
import android.util.Log;

import com.mapbox.mapboxsdk.overlay.Overlay;
import com.mapbox.mapboxsdk.views.MapView;

/**
 * Created by ValmeekiOne on 8/23/2015.
 */
public class CustomOverlay extends Overlay {

    @Override
    protected void draw(Canvas canvas, MapView mapView, boolean shadow) {
        Log.d("CustomOverlay", "Draw");
        canvas.drawText("12", 200, 200, new TextPaint());
    }

}
