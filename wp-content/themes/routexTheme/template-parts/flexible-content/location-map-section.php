<?php 
$location_map = get_field('location_map') ?? null;
$lat = $location_map['lat'] ?? null;
$lng = $location_map['lng'] ?? null;
$address = $location_map['address'] ?? null;

if ($lat && $lng): ?>
    <div id="google-map" class="google-map-section">
        <div class="map-container" 
             data-lat="<?php echo esc_attr($lat); ?>" 
             data-lng="<?php echo esc_attr($lng); ?>">
        </div>
        <?php if ($address): ?>
            <p class="map-address"><?php echo esc_html($address); ?></p>
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const mapContainer = document.querySelector(".map-container");
        if (mapContainer) {
            const lat = parseFloat(mapContainer.getAttribute("data-lat"));
            const lng = parseFloat(mapContainer.getAttribute("data-lng"));

            const map = new google.maps.Map(mapContainer, {
                center: { lat, lng },
                zoom: 15,
            });

            new google.maps.Marker({
                position: { lat, lng },
                map: map,
                title: 'Your Marker Title',
            });
        }
    });
    </script>
<?php endif; ?>
