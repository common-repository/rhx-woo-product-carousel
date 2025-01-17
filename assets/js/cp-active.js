jQuery('.color-picker').iris({
	
    // or in the data-default-color attribute on the input
    defaultColor: true,
	
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){},
	
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
	
    // hide the color picker controls on load
    hide: true,

    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
});


/*
* Auth notification Close
*/
function myFunction() {
    const element = document.getElementById("demo");
    element.remove();
} 
