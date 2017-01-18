let table = null;

$(document).ready(function() 
{
    $(".toggle-active").click();
});

function payed(button)
{
    $(".toggle-active").removeClass("toggle-active");
    $(button).addClass("toggle-active");
    
    $.ajax({url: "/api/auth/matches/payed?api_token="+token, success: function(result){
        //console.log(table);
		table.fnDestroy();
		table.html("");
		
        table = $('#matches-table').dataTable({
	       "data": result,
	       "bDestroy": true,
	       "deferRender": true,
	       "columns": [
	          { "data": "title" }, 
	          { 
	             "data": "cv_id",
	             "render" : function(data, type, row, meta){
	                if(type === 'display'){
	                   return $('<a>')
	                      .attr('href', "/cv/"+data)
	                      .text("Toon CV")
	                      .wrap('<div></div>')
	                      .parent()
	                      .html();
	
	                } else {
	                   return data;
	                }
	             }
	          } 
	       ]
	    });

    }});
    
      
}

function notPayed(button)
{
    $(".toggle-active").removeClass("toggle-active");
    $(button).addClass("toggle-active");
    
    $.ajax({url: "/api/auth/matches?api_token=7SXqeSH1KC69WBBsMb1T0VAzgegpOcugO6EOBvQOTIye1CIfBHcxYwFiGs4r", success: function(result){
        //console.log(result);
        if (table)
        {
        	table.fnDestroy();
        	table.html("");
        }
        	
		table = $('#matches-table').dataTable({
	       "data": result,
	       "bDestroy": true,
	       "deferRender": true,
	       "columns": [
		       { 
	             "data": "link",
	             "render" : function(data, type, row, meta){
	                if(type === 'display'){
	                   return $('<input type="checkbox">')
	                      .attr('name', data)
	                      .text("Toon CV")
	                      .wrap('<div></div>')
	                      .parent()
	                      .html();
	
	                } else {
	                   return data;
	                }
	             }
	          },
	          { "data": "title" }, 
	          { 
	             "data": "cv_id",
	             "render" : function(data, type, row, meta){
	                if(type === 'display'){
	                   return $('<a>')
	                      .attr('href', "/cv/"+data)
	                      .text("Toon CV")
	                      .wrap('<div></div>')
	                      .parent()
	                      .html();
	
	                } else {
	                   return data;
	                }
	             }
	          } 
	       ]
	    });
		
    }});
}  