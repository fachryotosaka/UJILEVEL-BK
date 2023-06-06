$(document).ready(function() {
    $(".toggle-password").click(function() {
        console.log("clicked ");
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {    
          input.attr("type", "password");
        }
    });


    $(".rotate").click(function(){
      $(this).toggleClass("rotated"); 
    });   

    $(".cmodal").click(function(){
      var content = $(this).attr("data-id");
      $.ajax({
        url: `/${content}`,
        method: 'GET',
        success: function(response) {
            $('#modal').html(response);
        },
      });
    });    


    // Calendar
    const currentDate = document.querySelector("#curr-date");
    daysTag = document.querySelector(".days");
    prevNextIcon = document.querySelectorAll("#cale-head span");

    // getting new date, year and month
    let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth();

    const months = ["January", "February", "March", "April", "May", "June" , "July" , "August", "September", "October", "November", "December"];

    const renderCalendar = () => {
      let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(); // getting first day of month
      lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(); // getting last date of month
      lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(); // getting last dau of month
      lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of prev month
      let liTag = "";

      for (let i = firstDayofMonth; i > 0; i--) { // creating li of prev month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
      }

      for (let i = 1; i <= lastDateofMonth; i++){ // creating li of all days of current month
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        let otw = i === 30 && currMonth === 5 && currYear === 2023 ? "otw" : "";
        liTag += `<li class="${isToday} ${otw}">${i}</li>`;
      }
      
      for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
      }

      currentDate.innerText = `${months[currMonth]} ${currYear}`; 
      daysTag.innerHTML = liTag;
    }
    renderCalendar();

    prevNextIcon.forEach(icon => {
      icon.addEventListener("click", () =>{ // adding click event on both icons
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11){ 
          // creating a new date of current year & month and pass it as date value
          date = new Date(currYear, currMonth);
          currYear = date.getFullYear(); // updating current year with new date year
          currMonth = date.getMonth(); // updating current month with new date month
        } else{ // else pas new Date as date value
            date = new Date(); 
        }
        renderCalendar();
      });
    });

});

