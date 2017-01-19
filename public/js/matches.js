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
	                      .attr('href', "/matches/cv/"+data)
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
	                   return $('<input>')
	                      .attr('name', data)
	                      .attr('type', "checkbox")
	                      .attr('onclick', "calculateAmount()")
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
	                      .attr('href', "/matches/cv/"+data)
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
		addCheckoutBtn(".panel-body");
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
    
	if(data.payed.length != 0)
	{
	    $.ajax({
		    url: "/api/auth/pay?api_token="+token, 
		    type: "POST", 
		    data: JSON.stringify(data), 
		    success: function(result)
			{    
				if(result)
				{
					$(".lbl-amount").remove();
					alert("Betaling is gelukt!");			
					$("#btn-payed-matches").click();
				}
		    }
	    });
	}
	else
	{
		alert("Selecteer een CV om het af te kunnen rekenen");
	}
}

function checkoutDirect(link)
{
	var selectedstring = [];
	selectedstring.push(link);
	var data = {payed:selectedstring};
	
    $.ajax({
	    url: "/api/auth/pay?api_token="+token, 
	    type: "POST", 
	    data: JSON.stringify(data), 
	    success: function(result)
		{    
			if(result)
			{
				alert("Betaling is gelukt!");			
				window.location.reload();
			}
	    }
    });
}

function calculateAmount() 
{
	var amount = 0;
	amount = $("input:checked").length; 
	
	// Check if boxes are selected
	if(amount == 0)
	{
		$(".lbl-amount").remove();
		return;
	}
	
    amount = "Totaal: &euro;"+amount+",00";
    
    if($(".lbl-amount")[0])
    {
	    $(".lbl-amount").remove();
    }
    
    var amountdiv = $("<div class='lbl-amount'></div>");
    amountdiv.append(amount);
    $(".panel-body").append(amountdiv);
}

function addCheckoutBtn(appendname)
{
	// Add checkout-button
	var checkout = $("<button id='btn-checkout' class='btn btn-primary' onclick='checkout();'>Afrekenen</button>")
	$(appendname).append(checkout);
}