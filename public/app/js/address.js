
(function() {
    var placesAutocomplete = places({
        appId: 'plPUIUV501P5',
        apiKey: 'bbd770a0fe2bccfa28dd0ad5d64acc85',
        container: document.querySelector('#form-address'),
        templates: {
            value: function(suggestion) {
                return suggestion.name;
            }
        }
    }).configure({
        type: 'address'
    });
    placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#form-address2').value = e.suggestion.administrative || '';
        document.querySelector('#form-city').value = e.suggestion.city || '';
        document.querySelector('#form-zip').value = e.suggestion.postcode || '';
        document.querySelector('#nombre').value = e.suggestion.name || '';



    });
})();
