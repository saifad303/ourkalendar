 //For add container class @media 1600 up
 function myContainerFunction(x) {
	    if (x.matches) { // If media query matches
	        var element = document.getElementById("catch-container");
			element.classList.add("container");
			element.classList.remove("container-fluid");

			var another_element = document.getElementById("catch-another-container");
			another_element.classList.add("container");
			another_element.classList.remove("container-fluid");
	    }
	}
var x = window.matchMedia("(min-width: 1600px)")
myContainerFunction(x) // Call listener function at run time
x.addListener(myContainerFunction) // Attach listener function on state changes


$(document).ready(function(){
    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
    	$(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hide.bs.collapse', function(){
    	$(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
});