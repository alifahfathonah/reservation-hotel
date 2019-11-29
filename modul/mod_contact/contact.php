<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-6 col-md-offset-3">
            <div class="block-flat" style="margin-top: -10px;">
                <div class='text-orange'>
                    <h5>Informasi
                        <?php echo $r['identitas_website'] ?> </h5>
                </div>
                Alamat :
                <?php echo $r['identitas_alamat'] ?>
                <br> No Telp:
                <?php echo $r['identitas_notelp'] ?>
            </div>
        </div>

        <div class="col-md-6 col-md-offset-3">
            <div id="map" style="height: 300px"></div>
            <script>
                function initMap() {
                    var myLatLng = {
                        lat: <?php echo $r['identitas_latitude']; ?>,
                        lng: <?php echo $r['identitas_longitude']; ?>
                    };

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: myLatLng
                    });

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: 'Lokasi'
                    });
                }
            </script><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJxJD9W_AJUvi7k5tfXKb5-RnFsJXKXQw&callback=initMap"
    async defer></script>
        </div>
    </div>
</div>