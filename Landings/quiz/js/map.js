let searchAddress = document.querySelector('#search-address')
let address = 'Россия, Москва, поселение Сосенское, бульвар Веласкеса, 5к5'
let searchButton = document.querySelector('#search-button')
let isVelaskes = true

searchButton.addEventListener('click', () => {
  address = searchAddress.value
  isVelaskes = false
  init()
})

function init() {
  if (isVelaskes) {
    return
  }

  geocode()

  function geocode() {
    let suggestView = new ymaps.SuggestView('search-address'),
      map,
      placemark
    // Геокодируем введённые данные.
    ymaps.geocode(address).then(
      function (res) {
        let obj = res.geoObjects.get(0),
          error,
          hint

        if (obj) {
          switch (
            obj.properties.get('metaDataProperty.GeocoderMetaData.precision')
          ) {
            case 'exact':
              break
            case 'number':
            case 'near':
            case 'range':
              error = 'Неточный адрес, требуется уточнение'
              hint = 'Уточните номер дома'
              break
            case 'street':
              error = 'Неполный адрес, требуется уточнение'
              hint = 'Уточните номер дома'
              break
            case 'other':
            default:
              error = 'Неточный адрес, требуется уточнение'
              hint = 'Уточните адрес'
          }
        } else {
          error = 'Адрес не найден'
          hint = 'Уточните адрес'
        }

        // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
        if (error) {
          searchAddress.value = ''
          searchAddress.placeholder = error
        } else {
          showResult(obj)
        }
      },
      function (e) {
        console.log(e)
      }
    )
  }

  function showResult(obj) {
    if (document.querySelector('#map').hasChildNodes()) {
      document
        .querySelector('#map')
        .removeChild(document.querySelector('#map').children[0])
    }
    let x = obj.geometry.getCoordinates()[0]
    let y = obj.geometry.getCoordinates()[1]

    let map = new ymaps.Map('map', {
      center: [x, y],
      zoom: 17,
      behaviors: ['default', 'scrollZoom'],
    })

    let placemark = new ymaps.Placemark(
      [x, y],
      {
        balloonContentBody: address,
      },
      {}
    )

    map.controls.remove('geolocationControl')
    map.controls.remove('searchControl')
    map.controls.remove('trafficControl')
    map.controls.remove('typeSelector')
    map.controls.remove('fullscreenControl')
    map.controls.remove('rulerControl')
    map.geoObjects.add(placemark)
    placemark.balloon.open()
  }
}
