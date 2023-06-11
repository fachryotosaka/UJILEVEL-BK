$(document).ready(function() {

    // change password visibility
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


    $(".consType").change(function(){
      console.log($('.inputType').val());
      $(".inputType").prop('checked', true);
      $(".sub").prop('disabled', false);
    });

    $(".resetType").click(function(){
      console.log('clicked ');
      $(".inputType").prop('checked', false);
      $(".consType")[0].selectedIndex = 0;
    });

    $(".resetVul").click(function(){
      console.log('clicked ');
      $(".vul").prop('checked', false);
    });
    // $("#detail").click(function(){
    //   $(".rotate").toggleClass("rotated"); 
    // });   

    // Navbar animation onscroll
    $(document).scroll(function () {
      console.log('scrolled')
      var $nav = $(".navbar");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });

    // show modal using ajax
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

    // change request input
    $("#acc").click(function(){
      console.log($('#reject').attr('checked'));
      console.log($('#accept').attr('checked'));
      $('#accept').attr('checked', true);
      $('#reject').attr('checked', false);
    });

    $("#dec").click(function(){
      console.log($('#reject').attr('checked'));
      console.log($('#reject').attr('checked'));
      $('#accept').attr('checked', false);
      $('#reject').attr('checked', true);
    });

    // $("#dateInput").change(function(){
    //   $('#dateInput').val.split("/");
    //   var day = parts[0];
    //   var month = parts[1];
    //   var year = parts[2];

    //   var date = new Date(year, month - 1, day);

    //   var formattedDate = new Intl.DateTimeFormat("en-US", { 
    //     month: "long",
    //     day: "numeric",
    //     year: "numeric"
    //   }).format(date);

    //   $("#dateInput").val = formattedDate;
    // });


    // request card dropdown animation
    class Accordion {
      constructor(el) {
        // Store the <details> element
        this.el = el;
        // Store the <summary> element
        this.summary = el.querySelector('summary');
        // Store the <div class="content"> element
        this.content = el.querySelector('.content');
    
        // Store the animation object (so we can cancel it if needed)
        this.animation = null;
        // Store if the element is closing
        this.isClosing = false;
        // Store if the element is expanding
        this.isExpanding = false;
        // Detect user clicks on the summary element
        this.summary.addEventListener('click', (e) => this.onClick(e));
      }
    
      onClick(e) {
        // Stop default behaviour from the browser
        e.preventDefault();
        // Add an overflow on the <details> to avoid content overflowing
        this.el.style.overflow = 'hidden';
        // Check if the element is being closed or is already closed
        if (this.isClosing || !this.el.open) {
          this.open();
        // Check if the element is being openned or is already open
        } else if (this.isExpanding || this.el.open) {
          this.shrink();
        }
      }
    
      shrink() {
        // Set the element as "being closed"
        this.isClosing = true;
        
        // Store the current height of the element
        const startHeight = `${this.el.offsetHeight}px`;
        // Calculate the height of the summary
        const endHeight = `${this.summary.offsetHeight}px`;
        
        // If there is already an animation running
        if (this.animation) {
          // Cancel the current animation
          this.animation.cancel();
        }
        
        // Start a WAAPI animation
        this.animation = this.el.animate({
          // Set the keyframes from the startHeight to endHeight
          height: [startHeight, endHeight]
        }, {
          duration: 400,
          easing: 'ease-out'
        });
        
        // When the animation is complete, call onAnimationFinish()
        this.animation.onfinish = () => this.onAnimationFinish(false);
        // If the animation is cancelled, isClosing variable is set to false
        this.animation.oncancel = () => this.isClosing = false;
      }
    
      open() {
        // Apply a fixed height on the element
        this.el.style.height = `${this.el.offsetHeight}px`;
        // Force the [open] attribute on the details element
        this.el.open = true;
        // Wait for the next frame to call the expand function
        window.requestAnimationFrame(() => this.expand());
      }
    
      expand() {
        // Set the element as "being expanding"
        this.isExpanding = true;
        // Get the current fixed height of the element
        const startHeight = `${this.el.offsetHeight}px`;
        // Calculate the open height of the element (summary height + content height)
        const endHeight = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
        
        // If there is already an animation running
        if (this.animation) {
          // Cancel the current animation
          this.animation.cancel();
        }
        
        // Start a WAAPI animation
        this.animation = this.el.animate({
          // Set the keyframes from the startHeight to endHeight
          height: [startHeight, endHeight]
        }, {
          duration: 400,
          easing: 'ease-out'
        });
        // When the animation is complete, call onAnimationFinish()
        this.animation.onfinish = () => this.onAnimationFinish(true);
        // If the animation is cancelled, isExpanding variable is set to false
        this.animation.oncancel = () => this.isExpanding = false;
      }
    
      onAnimationFinish(open) {
        // Set the open attribute based on the parameter
        this.el.open = open;
        // Clear the stored animation
        this.animation = null;
        // Reset isClosing & isExpanding
        this.isClosing = false;
        this.isExpanding = false;
        // Remove the overflow hidden and the fixed height
        this.el.style.height = this.el.style.overflow = '';
      }
    }
    
    document.querySelectorAll('details').forEach((el) => {
      new Accordion(el);
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

