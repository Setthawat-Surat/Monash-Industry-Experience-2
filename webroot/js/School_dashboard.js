(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict


/* Copyright (c) 2024 by Emil Devantie Brockdorff (https://codepen.io/Mestika/pen/xbgqbp)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

 */

/* create campaign */


$("body").on("keydown", "#signup", function(e){
    if (e.which == 13){
        if ($("#next").is(":visible")  ){
            console.log("INSIDE THE KEYdown");
            e.preventDefault();
            nextSection();
            return false;

        }

    }
});


$("#next").on("click", function(e){
    console.log(e.target);
    nextSection();
});


$("#signup").on("submit", function(e) {
    if ($("#next").is(":visible") || $("fieldset.current").index() < 3) {
        e.preventDefault();
    }

    // Validate the last section's date fields
    var startDate = new Date($("#start-date").val());
    var endDate = new Date($("#end-date").val());

    if (endDate < startDate) {
        alert("End Date should not be earlier than Start Date.");
        $("#end-date").addClass("error");
        e.preventDefault(); // Prevent form submission if dates are invalid
    } else {
        $("#end-date").removeClass("error");
    }
});

function goToSection(i){
    var currentFieldset = $("fieldset.current");

    // Validate current section before transitioning
    if (validateFields(currentFieldset)) {

        $("fieldset:gt("+i+")").removeClass("current").addClass("next");
        $("fieldset:lt("+i+")").removeClass("current");
        $(".orderli").eq(i).addClass("current").siblings().removeClass("current");
        setTimeout(function(){
            $("fieldset").eq(i).removeClass("next").addClass("current active");
            if ($("fieldset.current").index() == 3){
                $("#next").hide();
                $("input[type=submit]").show();
            } else {
                $("#next").show();
                $("input[type=submit]").hide();
            }
        }, 80);
    }

}

function nextSection(){
    var i = $("fieldset.current").index();
    //console.log("here is nextsection");

    if (i < 3){
        $(".orderli").eq(i+1).addClass("active");
        //console.log($(".orderli").length);
        goToSection(i+1);
    }
}

$(".orderli").on("click", function(e){
    var i = $(this).index();
    if ($(this).hasClass("active")){
        goToSection(i);
    } else {
        alert("Please complete previous sections first.");
    }
});

function validateFields(fieldset) {
    let valid = true;
    const inputs = fieldset.find("input[required], textarea[required]");
    inputs.each(function() {
        if (!this.checkValidity()) {
            $(this).addClass("error");
            valid = false;
            // Display the custom error message
            var errorMessage = this.validationMessage || 'Invalid input.';
            alert("Error in '" + this.name + "': " + errorMessage);
        } else {
            $(this).removeClass("error");
        }
    });

    // Custom validation for date fields
    if (fieldset.find("#start-date").length && fieldset.find("#end-date").length) {
        var startDate = new Date(fieldset.find("#start-date").val());
        var endDate = new Date(fieldset.find("#end-date").val());

        if (endDate < startDate) {
            alert("End Date should not be earlier than Start Date.");
            fieldset.find("#end-date").addClass("error");
            valid = false;
        } else {
            fieldset.find("#end-date").removeClass("error");
        }
    }

    return valid;
}

document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('studentDesigns');
    const fileList = document.getElementById('fileList');

    fileInput.addEventListener('change', function() {
        const files = fileInput.files;
        fileList.innerHTML = ''; // Clear previous file list

        if (files.length > 0) {
            const ul = document.createElement('ul');
            for (let i = 0; i < files.length; i++) {
                const li = document.createElement('li');
                li.textContent = files[i].name;
                ul.appendChild(li);
            }
            fileList.appendChild(ul);
        }
    });
});


