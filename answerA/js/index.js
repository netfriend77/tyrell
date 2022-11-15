
$(document).ready(function () {
    $("#validate_counter").hide();
    var btn = document.getElementById("distribute");
    
    btn.addEventListener("click", () => {
        let regex = /^\d+$/;
        let people_count = counter.value;
        if (regex.test(people_count)) {
            $("#validate_counter").hide();
            submitForm();
        } else {
            $("#validate_counter").show();
            tableBody = $("#person_tab");
            tableBody.html("");
        }
  });
});

function submitForm(){
    var form = $("#card"); 
    var url = form.attr('action');
    var request = $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                dataType: "json"
    });

    request.done(function(response, textStatus, jqXHR){
        tableBody = $("#person_tab");
        tableBody.html("");
            
        for(i=0; i < response.length; i++){
            tableBody.append("<tr><td>Person " + (i+1) + ": " + response[i] + "</td></tr>");
        }
        console.log("request is done");
    });

    request.fail(function(response, textStatus, jqXHR){
        console.log(response);
        console.log("request failed");
    });
}


