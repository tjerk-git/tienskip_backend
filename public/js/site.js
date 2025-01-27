
$(document).ready(function () {

  //if the url has contact in it, find .signupform and make it red
  if (window.location.href.indexOf('contact') > -1) {
    $('.signup_button').css('background', '#CF3636');
  }

  $('.work_form').slideDown(500);

  $('.contact_block').on('click', function () {

    // get the data attribute of this element
    let data = $(this).data('name');

    if (data == 'question') {
      // if its already down slide up
      if ($('.question_form').is(':visible')) {
        $('.question_form').slideUp(500);
      } else {
        $('.question_form').slideDown(500);
      }
    }

    if (data == 'work') {
      if ($('.work_form').is(':visible')) {
        $('.work_form').slideUp(500);
      } else {
        $('.work_form').slideDown(500);
      }
    }

    // find element with class arrow-up and change name to arrow-down
    let arrow = $(this).find('.arrow-up');

    if (!arrow.length) {
      arrow = $(this).find('.arrow-down');
    }

    if (arrow.hasClass('arrow-up')) {
      arrow.removeClass('arrow-up').addClass('arrow-down');
      arrow.attr('name', 'arrow-down');
    } else {
      arrow.removeClass('arrow-down').addClass('arrow-up');
      arrow.attr('name', 'arrow-up');
    }
  });



  const counters = document.querySelectorAll('.counter-number');
      
  const animateCounter = (counter, target) => {
    let current = 0;
    const increment = target / 50; // Divide animation into 50 steps
    const timer = setInterval(() => {
      current += increment;
      counter.textContent = Math.round(current);
      counter.classList.add('animate-count');
      
      if (current >= target) {
        counter.textContent = target;
        clearInterval(timer);
      }
    }, 20);
  };

  // Create an Intersection Observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseInt(counter.getAttribute('data-target'));
        animateCounter(counter, target);
        observer.unobserve(counter); // Only animate once
      }
    });
  }, { threshold: 0.5 });

  // Observe all counters
  counters.forEach(counter => observer.observe(counter));

});

