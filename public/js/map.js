$(function () {



  // only if #map exists
  if ($('#map').length === 0) {
    return;
  } else {
    let mapdata = {};

    fetch('/api/events/map')
      .then(response => response.json())
      .then(data => {
        //console.log(data);
        mapData = data;
      })
      .catch(error => {
        console.error('Error:', error);
      });

    function getStateInfo(state) {

      //return filteredData.events;
    }

    var jsMap = $('#map');

    $('#map').JSMaps({
      map: 'netherlands', //Use any map as named in the maps folder e.g. usa
      mapWidth: 300,
      onStateClick: function (e) {

        const { provinces } = mapData;

        const filteredData = provinces.find(provinceObj => provinceObj.province === e.name);

        console.log(e.name);
        $('.jsmaps-text').html(filteredData.events);
      }
    });
  }

  // function redraw() {
  //   jsMap.trigger('reDraw', {
  //     paths: window.JSMaps.maps.netherlands.paths.map(path => {
  //       return {
  //         ...path,
  //       }
  //     })
  //   })
  // }
});