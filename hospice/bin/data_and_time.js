/*JavaScript Document
  By Brandon T. Wood

  So use this functionality you simply add:

  	<div id="date"></div>
	
  To your anywhere in your webpage and this 
    script will make it whatever the variable 
	date is equal to automatically.
	
  To alter the date simple edit the below 
    variable date. Example:
	
	var date = "October 31st, 2020";

  The syntax is very important so make sure 
    to only edit what is inbetween the quotes.
	And don't stress out if it breaks, email 
	me at malceore@gmail.com.  
*/
var date = 'August 6th 2016';

window.onload = function(){
	console.log(date);
	document.getElementById("date").innerHTML = ""+date;
	carousel.next();
	setInterval(function(){
		carousel.next();
	}, 4500);
}


/*
  Lets talk about the Carousel function. To edit
    The quotes is more complex than just the 
	date. Javascript has something called an 
	array which is like a library of books. All
	the books have a number in a sorted order.
	
	Example: 
		var books = [
			"Moby dick",
			"Hatchet",
			"Hunger Games"
		];
		
  If you wanted to add or remove books you must 
	be careful to make sure the last book doesn't
	have a comma. Just like in speech you say:
	'1, 2, 3 ' with no comma after three. You can
	have as many or as few quotes as you want.
	
  So lets add a book called "Storm of Steel" to 
    books:
  
    Example:
		var books = [
			"Moby dick",
			"Hatchet",
			"Hunger Games",
			"Storm of Steel"
		];
		
	If you have any questions, please email me at: 
	  malceore@gmail.com
*/

var quotes = [
		"'This is a great event for health and fitness, and it gives back to the community to help those in need.'",
		"'Hospice has helped so many people in my family. Love this organization and love raising money for it to help many more families.'",
		"'In memory of my Father who passed away in 2014. He taught me to swim when I was a little girl and I have loved the water ever since.'",
		"'I am swimming this year because I CAN! A year ago I recieved a cancer diagnosis. This year I am cancer free!'",
		"'I am swimming in memory of a dear friend and co-worker who benefited from services that Hospice provides.'",
		"'Hospice took phenomenal care of my grandmother, at the time of her death. While it was an extremely diffiuclt process Hospice was absolutely amazing.'",
		"'I look forward to this swim and the challenge of raising money for a service I want to insure will be available when myself or my family needs it.'"
];

var carousel = new carousel();

function carousel(){
	this.count = 0;
	this.args = quotes;
}

carousel.test = function(){
    console.log("test"); 
}

carousel.next = function(){
	document.getElementById("carousel").innerHTML = this.args[this.count];
	if(carousel.count+1 >= carousel.args.length){
		carousel.count = 0;
	}else{
		carousel.count += 1;
	}
}

carousel.next = function(){
	document.getElementById("carousel").innerHTML = this.args[this.count];
	if(carousel.count+1 >= carousel.args.length){
		carousel.count = 0;
	}else{
		carousel.count += 1;
	}
}