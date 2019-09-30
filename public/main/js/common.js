  $(document).ready(function() {

   $("#service_type").change(function(){
     var service = $("#service_type").val();
     switch(service){
       case '2':
          $("#flightNumber").attr("placeholder", "Arrival flight no.");
          $("#transitNumber").attr("disabled",true);
          $("#TAirlineName").attr("disabled",true);
          $("#arrival").removeClass("d-none");
          $("#departure").addClass("d-none");
          $("#lim").addClass('d-none');
          $("#details").removeClass("d-none");
          $("#transitNumber").val("");
          $("#TAirlineName").val("");
          $("#details").removeClass("d-none");
          break;
      case '4':
          $("#flightNumber").attr("placeholder", "Departure flight no.");
           $("#transitNumber").attr("disabled",true);
           $("#TAirlineName").attr("disabled",true);
           $("#arrival").addClass("d-none");
           $("#departure").removeClass("d-none");
           $("#lim").addClass('d-none');
           $("#details").removeClass("d-none");
           $("#transitNumber").val("");
           $("#TAirlineName").val("");
           $("#details").removeClass("d-none");
           break;
        case'5':
          $("#flightNumber").attr("placeholder", "Arrival flight no.");
          $("#transitNumber").attr("disabled",false);
          $("#TAirlineName").attr("disabled",false);
          $("#arrival").removeClass("d-none");
          $("#departure").removeClass("d-none");
          $("#lim").addClass('d-none');
          $("#details").removeClass("d-none");
          break;
      case'1':
          $("#flightNumber").attr("placeholder", "Arrival flight no.");
          $("#transitNumber").attr("disabled",true);
          $("#TAirlineName").attr("disabled",true);
          $("#lim").removeClass('d-none');
          $("#arrival").removeClass("d-none");
          $("#departure").addClass("d-none");
          $("#transitNumber").val("");
          $("#TAirlineName").val("");
          $("#details").addClass("d-none");
          break;

     }
   });

});
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
 return true;
}
$("#airlineName").autocomplete({
    minLength: 1,
    source: "/flight",
    focus: function(event, ui) {
        $("#airlineName").val(ui.item.countryName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }) + " (" + ui.item.iata.toUpperCase() + ")");
        return false;
    },
    select: function(event, ui) {
        $("#airlineName").val(ui.item.value);
        return false;
    }
  }).data("ui-autocomplete")._renderItem = function(ul, item) {
    return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.value + "</span>" + " " + "<span class='airport-name'>" + item.label + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
  };

  $("#TAirlineName").autocomplete({
        minLength: 1,
        source: "/flight",
        focus: function(event, ui) {
            $("#TAirlineName").val(ui.item.countryName.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }) + " (" + ui.item.iata.toUpperCase() + ")");
            return false;
        },
        select: function(event, ui) {
            $("#TAirlineName").val(ui.item.value);
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.value + "</span>" + " " + "<span class='airport-name'>" + item.label + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
    };
