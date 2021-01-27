
(function() {
    var placesAutocomplete = places({
        appId: 'plPUIUV501P5',
        apiKey: 'bbd770a0fe2bccfa28dd0ad5d64acc85',
        container: document.querySelector('#address-input')
    });

    var $address = document.querySelector('#address-value')
    placesAutocomplete.on('change', function(e) {
        $address.textContent = e.suggestion.value
    });

    placesAutocomplete.on('clear', function() {
        $address.textContent = 'none';
    });

})();
