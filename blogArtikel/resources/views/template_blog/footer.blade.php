<footer>
        
        <center><h4>Lokasi Dengan Minat Baca Terbanyak</h4></center>
        <!-- Menyisipkan library Google Maps -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="http://maps.google.com/maps/api/js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


        <script>
            function initMap() {
        
                // membuat objek untuk titik koordinat
                var jakarta = {lat: -6.200000, lng: 106.816666};
                
                // membuat objek peta
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: jakarta
                });

                // mebuat konten untuk info window
                var contentString = '<p>Ini adalah kota dengan minat baca tertinggi</p>';

                // membuat objek info window
                var infowindow = new google.maps.InfoWindow({
                content: contentString,
                position: jakarta
                });
                
                // membuat marker
                var marker = new google.maps.Marker({
                position: jakarta,
                map: map,
                title: 'Kota Jakarta'
                });
                
                // event saat marker diklik
                marker.addListener('click', function() {
                // tampilkan info window di atas marker
                infowindow.open(map, marker);
                });
                
            }
        </script>

        <div id="map" style="width:100%;height:380px;"></div>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>
</footer>