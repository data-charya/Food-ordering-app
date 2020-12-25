let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let bookname = $("input[name*='name']");
    let bookprice = $("input[name*='email']");
    let password = $("input[name*='password']");
    let code = $("input[name*='code']");
    let status = $("input[name*='status']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookprice.val(textvalues[2]);
    password.val(textvalues[3]);
    code.val(textvalues[4]);
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