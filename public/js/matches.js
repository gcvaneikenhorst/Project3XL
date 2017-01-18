let table = null;

$(document).ready(function() 
{
    $("#btn-available-matches").click();
});

function payed(button)
{
    $(".toggle-active").removeClass("toggle-active");
    $(button).addClass("toggle-active");

	// Remove checkout-button
	$("#btn-checkout").remove();
	
    $.ajax({url: "/api/auth/matches/payed?api_token="+token, success: function(result){
        //console.log(table);
		table.fnDestroy();
		table.html("");
		
        table = $('#matches-table').dataTable({
	       "language": 
			{
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Dutch.json"
            },
	       "data": result,
	       "bDestroy": true,
	       "deferRender": true,
	       "columns": [
	          { "data": "title" }, 
	          { 
	             "data": "id",
	             "render" : function(data, type, row, meta){
	                if(type === 'display'){
	                   return $('<a>')
	                      .attr('href', "/cv/"+data)
	                      .attr('target', "_blank")
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
    console.log("/api/auth/matches?api_token="+token);
    $.ajax({url: "/api/auth/matches?api_token="+token, success: function(result){
        //console.log(result);
        if (table)
        {
        	table.fnDestroy();
        	table.html("");
        }
        	
		table = $('#matches-table').dataTable({
			"language": 
			{
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Dutch.json"
            },
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
	                      .attr('target', "_blank")
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
		
		// Add checkout-button
		var checkout = $("<button id='btn-checkout' class='btn btn-primary' onclick='checkout();'>Afrekenen</button>")
		$(".panel-body").append(checkout);
    }});
}  

function checkout()
{
	var selectedstring = [];
	$("input:checked").each(function () {
        var name = $(this).attr("name");
        
        selectedstring.push(name);
    });
    
    var data = {payed:selectedstring};
    console.log(data);
   
    $.ajax({
	    url: "/api/auth/pay?api_token="+token, 
	    type: "POST", 
	    data: JSON.stringify(data), 
	    success: function(result)
		{    
			if(result)
			{
				alert("Betaling is gelukt!");
				$("#btn-payed-matches").click();
			}
	    }
    });
}