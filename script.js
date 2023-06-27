// $(document).ready(function () {
    
//     document.getElementById("cheque_select").addeventlistener("change", function(){
//         cheque_select = document.getElementById("cheque_select").value;
//         f = new FormData();
//         f.append("cheque_select", cheque_select);
//         var xhttp = new XMLHttpRequest();
//         xhttp.onreadystatechange = function(){
//             if(xhttp.readyState === 4){
//                 var t = xhttp.responseText;
//                 if(t === "success"){
//                     alert("success");
//                 }else{
//                     alert(t);
//                 }
//             }
//         }
//         xhttp.open("POST", "process/showbalance_process.php", true);
//         xhttp.send(f);
//     });
// });


function addInvoice(){
    // alert("Invoice Added");
    var invoice_id = document.getElementById("invoice_id").value;
    var invoice_value = document.getElementById("invoice_value").value;

    // alert(invoice_id);
    // alert(invoice_value);

    var f = new FormData();
    f.append("invoice_id", invoice_id);
    f.append("invoice_value", invoice_value);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState === 4){
            var t = xhttp.responseText;
            if(t === "success"){
                alert("success");
            }else{
                alert(t);
            }
        }
    }
    xhttp.open("POST", "process/add_invoice_process.php", true);
    xhttp.send(f);
}


function payInvoice() {
    alert("Invoice Paid");
}