$(document).ready(function(){
    var searchCon = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('patient_names'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
          url: 'server.php?q=%QUERY',
          wildcard: '%QUERY'
        }
      });
      
      searchCon.initialize();

        /* create hooks for all existing search fields */
        var ids = $('.seo').map(function() { return $(this).attr('id'); }).toArray();

        /* activate ids on ready event */
        for(let x in ids){
            id = '#'+ids[x];
            
            $(id).typeahead({
                minLength: 2, highlight: true,
            }, {
                display: 'patient_names',source: searchCon
            })
            .on("typeahead:selected typeahead:autocompleted",
                function(e,datum) { 

                    /* 
                        *   instead of picking specific index 
                        *   lets pull the first field
                    */
                    dat = [];

                    /* convert the json object to javascript array */
                    for (let index in datum) { dat.push(index, datum[index]); }

                    /* set value to name supplied for hidden input */
                    let dname = '#input'+e.currentTarget.id;

                    let imp = $(dname).val(datum.id);
                    
                }
            );
        }

})
