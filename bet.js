document.addEventListener('DOMContentLoaded', function() {
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
  
    function showSlides() {
      slides.forEach(slide => slide.style.transform = `translateX(-${slideIndex * 100}%)`);
      slideIndex = (slideIndex + 1) % slides.length;
    }
  
    setInterval(showSlides, 2500); // Change slide every 2.5 seconds
  });

const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
  const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
  const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
  
  // Handle scrollbar thumb drag
  scrollbarThumb.addEventListener("mousedown", (e) => {
      const startX = e.clientX;
      const thumbPosition = scrollbarThumb.offsetLeft;
      const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
      
      // Update thumb position on mouse move
      const handleMouseMove = (e) => {
          const deltaX = e.clientX - startX;
          const newThumbPosition = thumbPosition + deltaX;

          // Ensure the scrollbar thumb stays within bounds
          const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
          const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
          
          scrollbarThumb.style.left = `${boundedPosition}px`;
          imageList.scrollLeft = scrollPosition;
      }

      // Remove event listeners on mouse up
      const handleMouseUp = () => {
          document.removeEventListener("mousemove", handleMouseMove);
          document.removeEventListener("mouseup", handleMouseUp);
      }

      // Add event listeners for drag interaction
      document.addEventListener("mousemove", handleMouseMove);
      document.addEventListener("mouseup", handleMouseUp);
  });

  // Slide images according to the slide button clicks
  slideButtons.forEach(button => {
      button.addEventListener("click", () => {
          const direction = button.id === "prev-slide" ? -1 : 1;
          const scrollAmount = imageList.clientWidth * direction;
          imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
      });
  });

   // Show or hide slide buttons based on scroll position
  const handleSlideButtons = () => {
      slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
      slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  }

  // Update scrollbar thumb position based on image scroll
  const updateScrollThumbPosition = () => {
      const scrollPosition = imageList.scrollLeft;
      const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
      scrollbarThumb.style.left = `${thumbPosition}px`;
  }

  // Call these two functions when image list scrolls
  imageList.addEventListener("scroll", () => {
      updateScrollThumbPosition();
      handleSlideButtons();
  });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);


// LOAD CONTENT ONE

function loadContent(url, targetId) {
    fetch(url)
      .then(response => response.text())
      .then(html => {
        document.getElementById(targetId).innerHTML = html;
      })
      .catch(error => {
        console.error('Error loading content:', error);
      });
  
    event.preventDefault(); // Prevents the default action (navigation) of the link
  }
  document.addEventListener('click', function(event) {
    if (event.target.classList.contains('menu-link')) {
      // Handle click event on menu links
      event.preventDefault(); // Prevents navigation
      loadContent(event.target.getAttribute('href'), 'content');
    }
  });

//  LOAD CONTENT TWO 
function loadContent1(url, targetId) {
    fetch(url)
      .then(response => response.text())
      .then(html => {
        document.getElementById(targetId).innerHTML = html;
      })
      .catch(error => {
        console.error('Error loading content:', error);
      });
  
    event.preventDefault(); // Prevents the default action (navigation) of the link
  }
  document.addEventListener('click', function(event) {
    if (event.target.classList.contains('menu-link1')) {
      // Handle click event on menu links
      event.preventDefault(); // Prevents navigation
      loadContent1(event.target.getAttribute('href'), 'content1');
    }
  });

 // Remove active class from all menu links
 document.querySelectorAll(".menu-link").forEach(function(link) {
    link.classList.remove("active");
  });
  // Add active class to the clicked menu link
  this.classList.add("active");
   
// document.addEventListener("DOMContentLoaded", function() {
// document.querySelectorAll(".menu-link").forEach(function(link) {
//     link.addEventListener("click", function(event) {
//     event.preventDefault(); // Prevent default link behavior
    
//     var url = this.getAttribute("href");
//     var targetContent = document.getElementById("content");
    
//     loadContent(url, targetContent);
//     });
// });
// });
  
//   function loadContent(url, targetContent) {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           // Show content
//           targetContent.style.display = "block";
//           // Update the content of the target div
//           targetContent.innerHTML = xhr.responseText;
//           // Scroll to the top of the loaded content
//           window.scrollTo(0, targetContent.offsetTop);
//         } else {
//           console.error("Error loading content:", xhr.statusText);
//         }
//       }
//     };
//     xhr.open("GET", url, true);
//     xhr.send();
//   }

 document.addEventListener("DOMContentLoaded", function() {
    const hash = window.location.hash.substring(1); // Get the fragment identifier without the '#'
    if (hash) {
      const targetElement = document.getElementById(hash);
      if (targetElement) {
        targetElement.classList.remove('hidden');
        targetElement.classList.add('visible');
        targetElement.scrollIntoView({ behavior: 'smooth' }); // Optional: Smooth scroll to the target element
      }
    }
  });


  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
        const accordionItem = header.parentElement;
        const accordionContent = accordionItem.querySelector('.accordion-content');

        // Toggle display of the content
        accordionContent.classList.toggle('active');

        // Optionally, toggle icons or other elements
        // Example: toggle 'fa-plus' and 'fa-minus' icons
        const icon = header.querySelector('.fas');
        if (icon.classList.contains('fa-plus')) {
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        } else {
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu-link1a');
    const sectionz = document.querySelectorAll('.section1a');
  
    function showSection(sectionId) {
        sectionz.forEach(section => {
            if (section.id === sectionId) {
                section.classList.add('activee');
            } else {
                section.classList.remove('activee');
            }
        });
    }
  
    // Show the section based on the current hash in the URL
    const currentHash = window.location.hash;
    if (currentHash) {
        showSection(currentHash.substring(1));
    } else {
        // Optional: Show the first section by default if no hash is present
        sectionz[0].classList.add('actives');
    }
  
    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetSection = this.getAttribute('href').substring(1);
  
            // Update the URL hash
            window.location.hash = targetSection;
  
            // Show the target section
            showSection(targetSection);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
  const menuLinks = document.querySelectorAll('.menu-link');
  const sections = document.querySelectorAll('.section1');

  function showSection(sectionId) {
      sections.forEach(section => {
          if (section.id === sectionId) {
              section.classList.add('active');
          } else {
              section.classList.remove('active');
          }
      });
  }

  // Show the section based on the current hash in the URL
  const currentHash = window.location.hash;
  if (currentHash) {
      showSection(currentHash.substring(1));
  } else {
      // Optional: Show the first section by default if no hash is present
      sections[0].classList.add('actives');
  }

  menuLinks.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault();
          const targetSection = this.getAttribute('href').substring(1);

          // Update the URL hash
          window.location.hash = targetSection;

          // Show the target section
          showSection(targetSection);
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu-link1');
    const sections = document.querySelectorAll('.section1i');
  
    function showSection(sectionId) {
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.classList.add('active');
            } else {
            section.classList.remove('active');
            }
        });
    }
  
    // Show the section based on the current hash in the URL
    const currentHash = window.location.hash;
    if (currentHash) {
        showSection(currentHash.substring(1));
    } else {
        // Optional: Show the first section by default if no hash is present
        sections[0].classList.add('actives');
    }
  
    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetSection = this.getAttribute('href').substring(1);
  
            // Update the URL hash
            window.location.hash = targetSection;
  
            // Show the target section
            showSection(targetSection);
        });
    });
});
  


  
  

