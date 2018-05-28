<script>;
// Charles Lawrence - Feb 16, 2012. Free to use and modify. Please attribute back to @geuis if you find this useful
// Twitter Bootstrap Typeahead doesn't support remote data querying. This is an expected feature in the future. In the meantime, others have submitted patches to the core bootstrap component that allow it. 
// The following will allow remote autocompletes *without* modifying any officially released core code. 
// If others find ways to improve this, please share.
//User clicked some value by Adrian Hove
var autocomplete = $('#searchinput').typeahead()
    .on('keyup', function(ev){

        //User clicked some value
        $('ul.typeahead li').on('click', function(){
            alert($(this).html().replace(/<(?:.|\n)*?>/gm, '')); //Or your function
        });
        ev.stopPropagation();
        ev.preventDefault();

        //filter out up/down, tab, enter, and escape keys
        if( $.inArray(ev.keyCode,[40,38,9,13,27]) === -1 ){

            var self = $(this);

            //set typeahead source to empty
            self.data('typeahead').source = [];

            //active used so we aren't triggering duplicate keyup events
            if( !self.data('active') && self.val().length > 0){

                self.data('active', true);

                //Do data request. Insert your own API logic here.
                $.getJSON("http://search.twitter.com/search.json?callback=?",{
                    q: $(this).val()
                }, function(data) {

                    //set this to true when your callback executes
                    self.data('active',true);

                    //Filter out your own parameters. Populate them into an array, since this is what typeahead's source requires
                    var arr = [],
                        i=data.results.length;
                    while(i--){
                        arr[i] = data.results[i].text
                    }

                    //set your results into the typehead's source
                    self.data('typeahead').source = arr;

                    //trigger keyup on the typeahead to make it search
                    self.trigger('keyup');

                    //All done, set to false to prepare for the next remote query.
                    self.data('active', false);

                });

            }
        }
    });
</script>;

