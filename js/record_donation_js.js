//create an html element
function create(htmlStr) {
    var frag = document.createDocumentFragment(),
        temp = document.createElement('div');
    temp.innerHTML = htmlStr;
    while (temp.firstChild) {
        frag.appendChild(temp.firstChild);
    }
    return frag;
}

//create new donation field
var numOfDonations = 1;
function addNewDonationField(){
	//alert("hello");
	numOfDonations = numOfDonations + 1;
	document.getElementById("num_of_donations").value = numOfDonations;
	//alert("hello, numofdonations is" + numOfDonations);
	var donation_div = document.getElementById("donation_div");
	//var fragment = create('<center><hr><div class = "form-inline">	<label for"job' + numOfJobs + '_text">Job ' + numOfJobs + ' </label>	<input type="text" class="form-control" id="job' + numOfJobs + '_text" name="job' + numOfJobs + '_text" placeholder="Job description" maxlength="75">	<input type="date" class="form-control" id="job' + numOfJobs + '_start_date" name="job' + numOfJobs + '_start_date"><input type="date" class="form-control" id="job' + numOfJobs + '_end_date" name="job' + numOfJobs + '_end_date"></div></center>');
	//var fragment = create('<center><hr><div class = "form-inline form-group has-feedback" id ="job-div"><label for"job' + numOfJobs + '_text">Job ' + numOfJobs + '</label><input type="text" class="form-control" id="job' + numOfJobs + '_text" name="job' + numOfJobs + '_text" placeholder="Job description" maxlength="150" required><input type="date" class="form-control" id="job' + numOfJobs + '_start_date" name="job' + numOfJobs + '_start_date" required><input type="date" class="form-control" id="job' + numOfJobs + '_end_date" name="job' + numOfJobs + '_end_date" required></div></center>');	
	
	var fragment = create('<hr><div class="form-group"><label for="donation_type' + numOfDonations + '">Donation Type</label><select class="form-control" id="donation_type' + numOfDonations + '" name="donation_type' + numOfDonations + '" required><option value="" selected disabled hidden>Donation Category</option><option value="1">Clothing</option><option value="2">Appliances/Stereos</option><option value="3">Cars/Trucks/RVs/ Boats/Motorcycles</option><option value="4">Dictionaries/Text Books/Encyclopedias</option><option value="5">Furniture</option><option value="6">Household Items</option><option value="7">Furnishings</option><option value="8">Computers and all Peripherals</option><option value="9">Records/CDs/Tapes/DVDs/Video Games</option><option value="10">Sporting Goods and Exercise Equipment</option></select>	</div><div class="form-group"><label for="amount1">Amount of Donation Items</label><input type="number" class="form-control" id="amount' + numOfDonations + '" name="amount' + numOfDonations + '" min="1" placeholder = "Amount of Donated Items" required></div>');
	
	donation_div.appendChild(fragment);
	
}