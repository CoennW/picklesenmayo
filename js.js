function initMap() {
  var startingPoint = {lat: 52.090737, lng: 5.12142};
    var marker = {lat: 52.370216, lng: 4.895168};
    
      var locations = [

      ['Amsterdam', 52.370216, 4.895168, 4],

      ['Zwolle', 52.516775, 6.083022, 5],

      ['Utrecht', 52.090737, 5.12142, 3],

      ['Den Bosch', 51.697816, 5.303675, 2],

      ['Nijmegen', 51.812563, 5.837226, 1],
          
        ['Rotterdam', 51.924420, 4.477733, 1],
          
          ['Oss', 51.761180, 5.514048, 1],
           ['Eindhoven', 51.441642, 5.469722, 1],
            ['Arnhem', 51.985103, 5.89873, 1],
          ['Oirschot', 51.504448, 5.308463, 1],
          ['Den Haag', 52.0704978, 4.3006999000000405, 1],
          ['Antwerpen', 51.2194475, 4.40246430000002, 1],
          ['Breda', 51.5719149, 4.768323000000009, 1],
          ['Roosendaal', 51.535849, 4.465321300000028, 1],
          ['Maastricht', 50.8513682, 5.6909725000000435, 1],
          ['Gouda', 52.0115205, 4.710463300000015, 1],
          ['Almere', 52.3507849, 5.264701599999967, 1],
          ['Enschede', 52.2215372, 6.893661899999984, 1],
          ['Middelburg', 51.4987962, 3.610997999999995, 1],
          ['Lelystad', 52.51853699999999, 5.471421999999961, 1],
          ['Lelystad', 52.992753, 6.564228400000047, 1]
          

    ];
    
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: startingPoint
  });
  /*var marker = new google.maps.Marker({
    position: startingPoint,
    map: map,
  });*/
    
    for (i = 0; i < locations.length; i++) { 

      marker = new google.maps.Marker({

        position: new google.maps.LatLng(locations[i][1], locations[i][2]),

        map: map

      });



      google.maps.event.addListener(marker, 'click', (function(marker, i) {

        return function() {

          infowindow.setContent(locations[i][0]);

          infowindow.open(map, marker);

        }

      })(marker, i));

    }
}

