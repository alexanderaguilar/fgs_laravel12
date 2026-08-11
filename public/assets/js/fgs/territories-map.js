window.FGS = window.FGS || {};

FGS.initTerritoriesMap = function () {
    var mapEl = document.getElementById('map');
    if (!mapEl || typeof L === 'undefined') {
        return;
    }

    var territoryId = parseInt(mapEl.getAttribute('data-territory-id') || '4', 10) || 4;
    var territoryName = mapEl.getAttribute('data-territory-name') || 'Territorio';
    var center = [10.408, -75.495];
    var zoom = 14;
    var polygonCoords = [];

    switch (territoryId) {
        case 4: center = [10.408, -75.495]; zoom = 13; polygonCoords = [[10.402, -75.505], [10.415, -75.498], [10.428, -75.485], [10.422, -75.475], [10.405, -75.480], [10.395, -75.495]]; break;
        case 13: center = [4.566, -74.153]; zoom = 14; polygonCoords = [[4.572, -74.158], [4.575, -74.148], [4.565, -74.145], [4.560, -74.155]]; break;
        case 12: center = [4.745, -74.125]; zoom = 14; polygonCoords = [[4.750, -74.130], [4.755, -74.120], [4.740, -74.115], [4.735, -74.125]]; break;
        case 11: center = [2.525, -75.315]; zoom = 13; polygonCoords = [[2.535, -75.325], [2.540, -75.305], [2.515, -75.300], [2.510, -75.320]]; break;
        case 10: center = [1.102, -77.395]; zoom = 13; polygonCoords = [[1.110, -77.405], [1.115, -77.385], [1.090, -77.380], [1.085, -77.400]]; break;
        case 8: center = [6.742, -75.912]; zoom = 14; polygonCoords = [[6.750, -75.922], [6.755, -75.902], [6.730, -75.895], [6.725, -75.915]]; break;
        case 3: center = [8.423, -76.785]; zoom = 13; polygonCoords = [[8.435, -76.795], [8.440, -76.775], [8.410, -76.770], [8.405, -76.790]]; break;
        case 16: center = [3.385, -74.045]; zoom = 13; polygonCoords = [[3.395, -74.055], [3.398, -74.035], [3.372, -74.032], [3.370, -74.052]]; break;
    }

    var map = L.map('map').setView(center, zoom);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    if (polygonCoords.length > 0) {
        var polygon = L.polygon(polygonCoords, {
            color: 'var(--primary-color, #163863)',
            fillColor: '#163863',
            fillOpacity: 0.4
        }).addTo(map);
        polygon.bindPopup('<b>' + territoryName + '</b><br>Territorio de Progreso');
    }

    var contextoTab = document.getElementById('contexto-tab');
    if (contextoTab) {
        contextoTab.addEventListener('shown.bs.tab', function () {
            map.invalidateSize();
        });
    }

    var tabsMenu = document.getElementById('territoryTabs');
    var scrollIndicator = document.querySelector('.scroll-indicator-tabs');
    if (tabsMenu && scrollIndicator) {
        var handleScroll = function () {
            if (tabsMenu.scrollWidth - Math.round(tabsMenu.scrollLeft) <= tabsMenu.clientWidth + 2) {
                scrollIndicator.classList.add('is-hidden');
            } else {
                scrollIndicator.classList.remove('is-hidden');
            }
        };
        tabsMenu.addEventListener('scroll', handleScroll);
        window.addEventListener('resize', handleScroll);
        setTimeout(handleScroll, 100);
    }
};

FGS.ready(FGS.initTerritoriesMap);
