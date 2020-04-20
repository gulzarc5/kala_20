$(document).ready(function(){

	$("#nationality").change(function(){
		var nationality = $("#nationality").val();
		var category = $("#categories").val();
		var quantity = $("#quantity").val();
		price_fetch(nationality,category,quantity);

	});

	$("#categories").change(function(){
		var nationality = $("#nationality").val();
		var category = $("#categories").val();
		var quantity = $("#quantity").val();
		price_fetch(nationality,category,quantity);

	});

	$("#quantity").change(function(){
		var nationality = $("#nationality").val();
		var category = $("#categories").val();
		var quantity = $("#quantity").val();
		price_fetch(nationality,category,quantity);

	});

});

