var navlnks = document.querySelectorAll(".nav-link a");
       Array.prototype.map.call(navlnks, function(item) {

           item.addEventListener("click", function(e) {

               var navlnks = document.querySelectorAll(".nav-link a");

               Array.prototype.map.call(navlnks, function(item) {

                   if (item.parentNode.className == "active" || item.parentNode.className == "active open" ) {

                       item.parentNode.className = "";

                   }

               });

               e.currentTarget.parentNode.className = "active";
           });
       });
