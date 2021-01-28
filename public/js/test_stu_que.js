$( window ).load(function() { // Reference : https://api.jquery.com/load-event/
    var screenW = window.innerWidth;
    // Reference : https://developer.mozilla.org/en-US/docs/Web/API/Window/innerWidth
    if (screenW > 768) {
        // alert('Large');
        var tT = document.getElementById('card3');
        tT.classList.add("d-flex");
        var mks = document.getElementsByClassName('mks');
        mks.classList.add("d-flex");
        // var tT = document.getElementById('testTime');
        // tT.classList.add("d-flex");
        // Reference : https://www.w3schools.com/howto/howto_js_add_class.asp
    }else{
        // alert('Small');
        var tT = document.getElementById('card3');
        tT.classList.remove("d-flex");
        var mks = document.getElementsByClassName('mks');
        mks.classList.remove("d-flex");
        // var tT = document.getElementById('testTime');
        // tT.classList.remove("d-flex");
    }
  });

$(window).resize(function() {
    // console.log('window resized');
    var screenW = window.innerWidth;
    // Reference : https://developer.mozilla.org/en-US/docs/Web/API/Window/innerWidth
    if (screenW > 768) {
        // alert('Large');
        var tT = document.getElementById('card3');
        tT.classList.add("d-flex");
        var mks = document.getElementsByClassName('mks');
        mks.classList.add("d-flex");
        // var tT = document.getElementById('testTime');
        // tT.classList.add("d-flex");
        // Reference : https://www.w3schools.com/howto/howto_js_add_class.asp
    }else{
        // alert('Small');
        var tT = document.getElementById('card3');
        tT.classList.remove("d-flex");
        var mks = document.getElementsByClassName('mks');
        mks.classList.remove("d-flex");
        // var tT = document.getElementById('testTime');
        // tT.classList.remove("d-flex");
    }
});

//     // For self-customised alert box > Reference : https://stackoverflow.com/questions/9334636/how-to-create-a-dialog-with-yes-and-no-options/30498126#30498126

function delQue(d) {
    // alert(''+d);
    lastE = d.charAt(d.length-1);
    if (lastE=='1') {
        document.getElementById('delB'+lastE).innerHTML="You cannot delete 1st question";
        document.getElementById('delBtn'+lastE).classList.add('disabled');   
        document.getElementById('cancelBtn'+lastE).innerHTML="OK";   
    }
}

function delConfirm(d) {
    document.getElementById(d).remove();
    document.getElementById('delAlert').innerHTML = `
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Question deleted successfully.
    </div>
    `;
    // Reference : https://www.w3schools.com/howto/howto_js_alert.asp
}

function add_option(uId) { // To add new option to a question
    // alert(''+uId);
    lastE = uId.charAt(uId.length-1);

    var m2 = document.getElementById('tog'+lastE);
    if (m2.checked) {
        type = 'checkbox';
    } else {
        type = 'radio';
    }

    var count = document.getElementsByClassName('option'+lastE).length;
    // alert('option'+lastE+' count'+count);
    var x = count+1;
    // alert("Count"+x);
    code = lastE+"-"+x;
    op_main = "op"+code;
    op_inp = "opt"+code;
    op_txt = "textopt"+code;
    op_cut = "cut"+code;
    var element = `
    <div id="`+op_main+`" class="w-100 d-flex align-items-center m-1 mb-2 p-1">
        <input onclick="changeColor('`+op_inp+`')" id="`+op_inp+`" class="option`+lastE+` option mr-2" type="`+type+`" name="option`+lastE+`" value="`+op_inp+`">
        <input for="`+op_inp+`" id="`+op_txt+`" class="col-xs-8 mr-2 col-md-9 rounded border border-danger shadow-sm p-2" contentEditable type="text" name="option_txt_`+code+`" value="" placeholder="Option `+x+`"></input>
        <!-- div to input -->
        <i onclick="deleteOpt('`+op_main+`')" id="`+op_cut+`" class="fa fa-times mr-5 text-danger" aria-hidden="true"></i>
    </div>
    `;
    document.getElementById(uId).innerHTML += element;
}
// Reference : https://www.geeksforgeeks.org/how-to-append-html-code-to-a-div-using-javascript/#:~:text=Using%20the%20innerHTML%20attribute%3A,the%20%2B%3D%20operator%20on%20innerHTML.

function deleteOpt(x) {
    // alert(x);
    lastE = x.charAt(x.length-1);
    // alert(lastE);
    if (lastE<3) {
        document.getElementById('delAlert').innerHTML = `
        <div class="alert bg-info">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Alert!</strong> First 2 options can't be deleted.
        </div>
        `;
        // Reference : https://www.w3schools.com/howto/howto_js_alert.asp
        // alert("You cannot delete first 2 options");
    } else {
        document.getElementById(x).remove();
        document.getElementById('delAlert').innerHTML = `
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Success!</strong> Option deleted successfully.
        </div>
        `;
        // Reference : https://www.w3schools.com/howto/howto_js_alert.asp
        // alert('Option deleted successfully !!!');
    }
}
// Reference : https://www.w3schools.com/jsref/met_element_remove.asp

function changeColor(bdy) {
    lastE = bdy.charAt(bdy.length-3);
    var count = document.getElementsByClassName('option'+lastE).length;
    // alert(count);
    // for (let i = 1; i <= count; i++) {
        // alert('Outside');
        for (let i = 1; i <= count; i++) {
            var o2 = document.getElementById("opt"+lastE+"-"+i);
            var p2 = document.getElementById("textopt"+lastE+"-"+i);
            if (o2.checked) {
                // alert('Inside-1');
                p2.classList.remove("border-danger");
                p2.classList.add("bg-success");
            }else {
                // alert('Inside-2');
                p2.classList.remove("bg-success");
                p2.classList.add("border-danger");
            }
        }
    // }
}

function opt_type(tp) {
    var m2 = document.getElementById(tp);
    lastE = tp.charAt(tp.length-1);
    var m1 = document.getElementsByClassName('option'+lastE).length;
    // alert(m1);

    if (m2.checked) {
        // alert('success-2');
        for (let i = 1; i <= m1; i++) {
            var o2 = document.getElementById('opt'+lastE+'-'+i);
            o2.type='checkbox';
            o2.name="option"+lastE+"-"+i;
            
        }
    } else {
        // alert('success-3');
        for (let i = 1; i <= m1; i++) {
            var o2 = document.getElementById('opt'+lastE+'-'+i);
            // alert("textopt"+lastE+"-"+i);
            o2.type='radio';
            o2.name="option"+lastE;
            
        }
        for (let j = 1; j <= m1; j++) {
            var o2 = document.getElementById('opt'+lastE+'-'+j);
            var p2 = document.getElementById("textopt"+lastE+"-"+j);
            // alert(o2.checked);
            if (o2.checked) {
                // alert('Inside-1');
                p2.classList.add("bg-success");
                p2.classList.remove("border-danger");
            }else {
                // alert('Inside-2')
                p2.classList.add("border-danger");
                p2.classList.remove("bg-success");
            }
            
        }
    }
    // }
}

// Reference : https://stackoverflow.com/questions/9093992/change-html-input-type-by-js
// Reference : https://stackoverflow.com/questions/38260431/onchange-event-in-a-bootstrap-checkbox
// Reference : https://stackoverflow.com/questions/7031226/jquery-checkbox-change-and-click-event
// Reference : https://stackoverflow.com/questions/22068387/can-i-use-a-string-variable-in-document-getelementbyid
