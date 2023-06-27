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
                alert("Invoice Added");
                window.location.href = "invoice.php";
            }else{
                alert(t);
            }
        }
    }
    xhttp.open("POST", "process/add_invoice_process.php", true);
    xhttp.send(f);
}

function addCheque(){
    // alert("Cheque Added");
    var cheque_id = document.getElementById("cheque_id").value;
    var cheque_value = document.getElementById("cheque_value").value;

    // alert(cheque_id);
    // alert(cheque_value);

    var f = new FormData();
    f.append("cheque_id", cheque_id);
    f.append("cheque_value", cheque_value);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState === 4){
            var t = xhttp.responseText;
            if(t === "success"){
                alert("Cheque Added");
                window.location.href = "cheque.php";
            }else{
                alert(t);
            }
        }
    }
    xhttp.open("POST", "process/add_cheque_process.php", true);
    xhttp.send(f);
}
