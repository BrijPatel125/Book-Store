
let id = $("input[name*='book_id']");
id.attr("readonly","readonly");




$(".btnedit").click(e => {
	//console.log("icon clicked");
	let textValues = displayData(e);
	//console.log(textValues);
	
	//let id = $("input[name*='book_id']");
	let bookname = $("input[name*='book_name']");
	let bookpublisher = $("input[name*='book_publisher']");
	let bookprice = $("input[name*='book_price']");

	//below code will display the code in corresponding textbox
	id.val(textValues[0]);
	bookname.val(textValues[1]);
	bookpublisher.val(textValues[2]);
	bookprice.val(textValues[3]);
});	

//Function used to display table data in text box
function displayData(e)
{
	let id = 0;
	const td = $("#tbody tr td");
	let textValues = [];

	for (const value of td) {
		//console.log(value);
		if (value.dataset.id == e.target.dataset.id) 
		{
			//console.log(e.target.dataset.id);
			//console.log(value);
			textValues[id++] = value.textContent;
		}
	}
	return textValues;
}