$( document ).ready(function() {

    var map = L.map('mapid').setView([42.846841, -2.670996], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);



    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties && feature.properties.popupContent) {
            layer.bindPopup(feature.properties.popupContent);
        }
    }


    $.ajax({
        data: {"nombre":"arriaga"},
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType:"JSON",
        // URL a la que se enviará la solicitud Ajax
        url: "../php/getData.php",
    })
        .done(function( resultado ) {
            if ( console && console.log ) {
                console.log( "La solicitud se ha completado correctamente." );
                alert(resultado);
                for (x=0;x < resultado.length; x++){
                    L.marker([resultado[x].latitud, resultado[x].longitud]).addTo(map)
                        .bindPopup('Estoy hasta los mismisimos de ajax'+x)
                        .openPopup();
                }
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "La solicitud a fallado: " +  textStatus);
            }
        });
    /*
        var obras =  [{
            "type": "Feature",
            "properties": {
                "name": " Betoño",

                "popupContent": "Esto es betoño!",
                "show_on_map": true
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-2.659505, 42.863061]
            }
        }, {
            "type": "Feature",
            "properties": {
                "name": "Unis",
                "popupContent": "Esto son las universidades!",
                "show_on_map": true
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-2.671453 ,42.839538 ]
            }
        },{
            "type": "Feature",
            "properties": {
                "name": "Salburua",
                "popupContent": "Esto es salburua!",
                "show_on_map": true
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-2.648735,42.847586  ]
            }
        }];

        L.geoJSON(obras, {
            onEachFeature: onEachFeature
        }).addTo(map);
    */

});