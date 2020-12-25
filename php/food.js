let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let bookname = $("input[name*='item_name']");
    let bookprice = $("input[name*='item_price']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookprice.val(textvalues[2].replace("Rs.", ""));
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