<!DOCTYPE html>
<!--
  Copyright 2011 Google Inc. All Rights Reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">

    <title>Fusion Tables Layer Example: Dynamic Styling with Legend</title>

    <link href="/apis/fusiontables/docs/samples/style/default.css"
        rel="stylesheet" type="text/css">
    <style type="text/css">
      #legend {
        background-color: #FFF;
        margin: 10px;
        padding: 5px;
        width: 150px;
      }

      #legend p {
        font-weight: bold;
        margin-top: 3px;
      }

      #legend div {
        clear: both;
      }

      .color {
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
        display: block;
      }
    </style>
    <script type="text/javascript"
        src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
      /**
       * Column names mapped to a style rule.
       * @type {Object}
       * @const
       */
      var COLUMN_STYLES = {
        'Total Urban and Rural Housing Units': [
          {
            'min': 200000,
            'max': 3150000,
            'color': '#FE7276'
          },
          {
            'min': 3150000,
            'max': 6100000,
            'color': '#FE3F44'
          },
          {
            'min': 6100000,
            'max': 9050000,
            'color': '#BE2F33'
          },
          {
            'min': 9050000,
            'max': 13000000,
            'color': '#A40004'
          }
        ],
        'Total Urban Housing Units': [
          {
            'min': 98000,
            'max': 3865333,
            'color': '#717BD8',
            'opacity': 0.7
          },
          {
            'min': 3865333,
            'max': 7632666,
            'color': '#2E3784',
            'opacity': 0.7
          },
          {
            'min': 7632666,
            'max': 11400000,
            'color': '#081272',
            'opacity': 0.7
          }
        ]
      };

      function initialize() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: new google.maps.LatLng(43.5, -110),
          zoom: 3,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var layer = new google.maps.FusionTablesLayer({
          query: {
            select: 'geo',
            from: '19rZqO7CXbXylYA8pi7oMOvWi9j5HQp4a7LgRuw'
          }
        });
        layer.setMap(map);

        initSelectmenu();
        for (column in COLUMN_STYLES) {
          break;
        }
        applyStyle(map, layer, column);
        addLegend(map);

        google.maps.event.addDomListener(document.getElementById('selector'),
            'change', function() {
              var selectedColumn = this.value;
              applyStyle(map, layer, selectedColumn);
              updateLegend(selectedColumn);
        });
      }

      // Initialize the drop-down menu
      function initSelectmenu() {
        var selectMenu = document.getElementById('selector');
        for (column in COLUMN_STYLES) {
          var option = document.createElement('option');
          option.setAttribute('value', column);
          option.innerHTML = column;
          selectMenu.appendChild(option);
        }
      }

      // Apply the style to the layer & generate corresponding legend
      function applyStyle(map, layer, column) {
        var columnStyle = COLUMN_STYLES[column];
        var styles = [];

        for (var i in columnStyle) {
          var style = columnStyle[i];
          styles.push({
            where: generateWhere(column, style.min, style.max),
            polygonOptions: {
              fillColor: style.color,
              fillOpacity: style.opacity ? style.opacity : 0.8
            }
          });
        }

        layer.set('styles', styles);
      }

      // Create the where clause
      function generateWhere(columnName, low, high) {
        var whereClause = [];
        whereClause.push("'");
        whereClause.push(columnName);
        whereClause.push("' >= ");
        whereClause.push(low);
        whereClause.push(" AND '");
        whereClause.push(columnName);
        whereClause.push("' < ");
        whereClause.push(high);
        return whereClause.join('');
      }

      // Initialize the legend
      function addLegend(map) {
        var legendWrapper = document.createElement('div');
        legendWrapper.id = 'legendWrapper';
        legendWrapper.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
            legendWrapper);
        legendContent(legendWrapper, column);
      }

      // Update the legend content
      function updateLegend(column) {
        var legendWrapper = document.getElementById('legendWrapper');
        var legend = document.getElementById('legend');
        legendWrapper.removeChild(legend);
        legendContent(legendWrapper, column);
      }

      // Generate the content for the legend
      function legendContent(legendWrapper, column) {
        var legend = document.createElement('div');
        legend.id = 'legend';

        var title = document.createElement('p');
        title.innerHTML = column;
        legend.appendChild(title);

        var columnStyle = COLUMN_STYLES[column];
        for (var i in columnStyle) {
          var style = columnStyle[i];

          var legendItem = document.createElement('div');

          var color = document.createElement('span');
          color.setAttribute('class', 'color');
          color.style.backgroundColor = style.color;
          legendItem.appendChild(color);

          var minMax = document.createElement('span');
          minMax.innerHTML = style.min + ' - ' + style.max;
          legendItem.appendChild(minMax);

          legend.appendChild(legendItem);
        }

        legendWrapper.appendChild(legend);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>

  <body>
      <div id="map-canvas" style="width:100%;height: 600px"></div>
    <select id="selector"></select>
  </body>
</html>