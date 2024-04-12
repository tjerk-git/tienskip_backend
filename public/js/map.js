$(function () {

  // only if #map exists
  if ($('#map').length === 0) {
    return;
  } else {
    $('#map').JSMaps({
      map: 'netherlands', //Use any map as named in the maps folder e.g. usa
      mapWidth: 300,
    });
  }
});