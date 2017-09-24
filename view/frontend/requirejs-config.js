var config = {
    map: {
        '*': {
            storeFinder:   'ADM_StoreFinder/js/storefinder',
            googlemapsapi: 'ADM_StoreFinder/js/googlemapsapi'
        }
    },
    paths: {
        async: 'ADM_StoreFinder/js/requirejs-plugins/src/async'
    },
    shim: {
        googlemapsapi: {
          deps: ["async"]
        }
     }
};