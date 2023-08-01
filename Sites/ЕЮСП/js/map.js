function initMap(address, box) {
    var geocoder = ymaps.geocode(address);
    geocoder.then(
        function (res) {
            var location = res.geoObjects.get(0).geometry.getCoordinates();
            var map = new ymaps.Map(box, {
                center: location,
                zoom: 17,
            });
            map.behaviors.disable('scrollZoom');
            var placemark = new ymaps.Placemark(location, {
                balloonContent: address
            });
            map.geoObjects.add(placemark);

            map.controls.remove('searchControl');
            map.controls.remove('typeSelector');
            map.controls.remove('fullscreenControl');
            map.controls.remove('rulerControl');
            map.controls.remove('geolocationControl');
            map.controls.remove('routeButtonControl');
        },
        function (err) {
            console.error(err);
        }
    );
}