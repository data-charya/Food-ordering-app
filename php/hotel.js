let id = $("input[name*='hotel_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let bookname = $("input[name*='hotel_name']");
    let bookprice = $("input[name*='hotel_type']");
    let location = $("input[name*='hotel_location']");
    let img = $("input[name*='hotel_img']");
    let status = $("input[name*='hotel_address']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookprice.val(textvalues[2]);
    location.val(textvalues[3]);
    img.val(textvalues[4]);
    status.val(textvalues[5]);
});


function displayData(e) {
    let i = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[i++] = value.textContent;
        }
    }
    return textvalues;

}