var page =0;
var map = null;
var markerArray = []; //create a global array to store markers
var locations = [];
var $container = $('#container');
$(function () {
    var $container = $('#container');

    $.Isotope.prototype._getCenteredMasonryColumns = function () {
        this.width = this.element.width();

        var parentWidth = this.element.parent().width();

        // i.e. options.masonry && options.masonry.columnWidth
        var colW = this.options.masonry && this.options.masonry.columnWidth ||
        // or use the size of the first item
        this.$filteredAtoms.outerWidth(true) ||
        // if there's no items, use size of container
        parentWidth;

        var cols = Math.floor(parentWidth / colW);
        cols = Math.max(cols, 1);

        // i.e. this.masonry.cols = ....
        this.masonry.cols = cols;
        // i.e. this.masonry.columnWidth = ...
        this.masonry.columnWidth = colW;
    };

    $.Isotope.prototype._masonryReset = function () {
        // layout-specific props
        this.masonry = {};
        // FIXME shouldn't have to call this again
        this._getCenteredMasonryColumns();
        var i = this.masonry.cols;
        this.masonry.colYs = [];
        while (i--) {
            this.masonry.colYs.push(0);
        }
    };

    $.Isotope.prototype._masonryResizeChanged = function () {
        var prevColCount = this.masonry.cols;
        // get updated colCount
        this._getCenteredMasonryColumns();
        return (this.masonry.cols !== prevColCount);
    };

    $.Isotope.prototype._masonryGetContainerSize = function () {
        var unusedCols = 0,
            i = this.masonry.cols;
        // count unused columns
        while (--i) {
            if (this.masonry.colYs[i] !== 0) {
                break;
            }
            unusedCols++;
        }

        return {
            height: Math.max.apply(Math, this.masonry.colYs),
            // fit container to columns that have been used;
            width: (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
    };


    $(function () {

        //var $container = $('#container');

        $container.imagesLoaded(function(){
                $container.isotope({
                  itemSelector: '.element',
                  masonry: {
                      columnWidth: 220
                  },
                  getSortData: {
                      symbol: function ($elem) {
                          return $elem.attr('data-symbol');
                      },
                      category: function ($elem) {
                          return $elem.attr('data-category');
                      },
                      number: function ($elem) {
                          return parseInt($elem.find('.number').text(), 10);
                      },
                      weight: function ($elem) {
                          return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                      },
                      name: function ($elem) {
                          return $elem.find('.name').text();
                      }
                  }
              });


              var $optionSets = $('#options .option-set'),
              $optionLinks = $optionSets.find('a');

              $optionLinks.click(function () {
                  var $this = $(this);
                  // don't proceed if already selected
                  if ($this.hasClass('selected')) {
                      return false;
                  }
                  var $optionSet = $this.parents('.option-set');
                  $optionSet.find('.selected').removeClass('selected');
                  $this.addClass('selected');
      
                  // make option object dynamically, i.e. { filter: '.my-filter-class' }
                  var options = {},
                      key = $optionSet.attr('data-option-key'),
                      value = $this.attr('data-option-value');
                  // parse 'false' as false boolean
                  value = value === 'false' ? false : value;
                  options[key] = value;
                  if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
                      // changes in layout modes need extra logic
                      changeLayoutMode($this, options)
                  } else {
                      // otherwise, apply new options
                      $container.isotope(options);
                  }
      
                  return false;
              });
      
      
              
        });  
        
        $container.infinitescroll({
                navSelector: '#page_nav', // selector for the paged navigation 
                nextSelector: '#page_nav a', // selector for the NEXT link (to page 2)
                itemSelector: '.element', // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more pages to load.',
                    img: 'img/loading.gif'
                }
            },
            // call Isotope as a callback
    
            function (newElements) {
              $container.append(newElements);
              $container.imagesLoaded(function(){
                $container.isotope('appended', $(newElements));
                
              });
                
            }
        );
        
    });
    // change size of clicked element
    $('.element').live('click', function () {
        $('.hover_effect').removeClass('hover_effect');
        $(this).children('.clientcontainer').toggleClass('hover_effect');
        $container.isotope('reLayout');
    });
    
    /*$(window).scroll(function(){
      var scrollTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      var docuHeight = $(document).height();
      if(scrollTop + windowHeight == docuHeight){
         page += 1;
          //get_items(page);
            url = 'pages.php';
            $.ajax({
              type: "POST",
              url: url,
              data: {page:page},
              error:function(){
              
              },
              success: function(response){
                //var $newItems = $(response);
                //console.log(response);
                //$('#container').isotope( 'insert', $newItems );
                var html = response;
                $container.append(response);
                $container.isotope( 'reloadItems' );
              },
              dataType: 'html'
            });
         
      }
   });*/
    
    
    map = null;
    markerArray = []; //create a global array to store markers
    locations = [
    ['Bondi Beach', -33.890542, 151.274856, 4, 'img/map_icon.png'],
    ['Coogee Beach', -33.923036, 151.259052, 5, 'img/map_icon.png'],
    ['Cronulla Beach', -34.028249, 151.157507, 3, 'img/map_icon.png'],
    ['Manly Beach', -33.80010128657071, 151.28747820854187, 2, 'img/map_icon.png'],
    ['Maroubra Beach', -33.950198, 151.259302, 1, 'img/map_icon.png']];

    initialize();
    
});

function initialize() {
    var myOptions = {
        zoom: 10,
        center: new google.maps.LatLng(-33.80010128657071, 151.28747820854187),
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        navigationControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });

    // Add markers to the map
    // Set up markers based on the number of elements within the myPoints array
    for (var i = 0; i < locations.length; i++) {
        createMarker(new google.maps.LatLng(locations[i][1], locations[i][2]),locations[i][0], locations[i][3], locations[i][4]);
    }

    //mc.addMarkers(markerArray, true);
}

var infowindow = new google.maps.InfoWindow({
    size: new google.maps.Size(150, 50)
});

function createMarker(latlng, myTitle, myNum, myIcon) {
    var contentString = myTitle;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: myIcon,
        zIndex: Math.round(latlng.lat() * -100000) << 5,
        title: myTitle
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString);
        infowindow.open(map, marker);
    });

    markerArray.push(marker); //push local var marker into global array
}