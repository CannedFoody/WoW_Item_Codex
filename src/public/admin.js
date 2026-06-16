"use strict";


function setup_delete_forms(){
    let delete_forms = document.querySelectorAll("form.deletion-form");

    for(let form of delete_forms){
        form.addEventListener("submit", function(event){
            event.preventDefault();

            if(window.confirm("Are you sure you want to delete this?")){
                form.submit();
            }
            else{
                return false;
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", function() {
    setup_delete_forms();
})