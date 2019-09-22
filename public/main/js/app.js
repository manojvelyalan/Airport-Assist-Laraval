$(document).ready(function(){$('.dropdown').on('show.bs.dropdown',function(){$(this).find('.dropdown-menu').first().stop(true,true).slideDown();});$('.dropdown').on('hide.bs.dropdown',function(){$(this).find('.dropdown-menu').first().stop(true,true).slideUp();});});$(document).ready(function(){var options={data:[{name:"chatrapati mumbai international airport",type:"MUM"},{name:"Delhi International Airport",type:"DEL"},{name:"Dubai International Airport",type:"DUB"},{name:"New York International Airport",type:"NEW"},{name:"London International Airport",type:"LON"}],getValue:function(element){return element.name+"-"+element.type;},template:{type:"custom",method:function(value,item){return"<span class='airport-code'>"+item.type+"</span>"+" "+"<span class='airport-name'>"+item.name+"</span>"+"<div class='MUA-hr'></div>";}},list:{match:{enabled:true}},placeholder:"origin airport"};$("#template-desc").easyAutocomplete(options);});$(document).ready(function(){$("#arrivalDate").datepicker({minDate:0});$("#arrivalTime").timepicker();$("#departureDate").datepicker({minDate:0});$("#departureTime").timepicker();});$(document).ready(function(){$("li.feature-open").hover(function(){$(this).css('padding-right','1rem');$(this).css('background-color','#ffffff');$(this).children('span').show();$(this).css('box-shadow','0px 0px 50px rgba(35,35,35,.8)');$(".four-features").css('box-shadow','inherit');$(this).find('img').toggle();},function(){$(this).css('padding-right','0');$(this).css('background-color','transparent');$(this).children('span').hide();$(this).css('box-shadow','inherit');$(".four-features").css('box-shadow','0px 0px 50px rgba(35,35,35,.8)');$(this).find('img').toggle();});});(function(){'use strict';var items=document.querySelectorAll(".timeline li");function isElementInViewport(el){var rect=el.getBoundingClientRect();return(rect.top>=0&&rect.left>=0&&rect.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&rect.right<=(window.innerWidth||document.documentElement.clientWidth));}
function callbackFunc(){for(var i=0;i<items.length;i++){if(isElementInViewport(items[i])){items[i].classList.add("in-view");}}}
window.addEventListener("load",callbackFunc);window.addEventListener("resize",callbackFunc);window.addEventListener("scroll",callbackFunc);})();
$(document).ready(function() {
//flight tracker file access

$('.flightTracker').click(function(){
    window.open('https://murgencyairportassistance.com/api/flightdetails', '_blank', 'width=900,height=400,toolbar=no,scrollbars=1');
    return false;
});


//Airport WIFI file access

$('.wifiLocator').click(function(){
    window.open('https://murgencyairportassistance.com/api/wifi', '_blank', 'width=500,height=400,toolbar=no');
    return false;
});


// weather file access
$('.weather').click(function(){
    window.open('https://murgencyairportassistance.com/api/weather', '_blank', 'width=900,height=400,toolbar=no,scrollbars=1');
    return false;
});

// Currency Converter file access
$('.currencyConverter').click(function(){
    window.open('https://murgencyairportassistance.com/api/currency', '_blank', 'width=500,height=300,toolbar=no');
    return false;
});
});