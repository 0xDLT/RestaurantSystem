const container = document.getElementById('testimonialContainer');
const scrollContent = document.getElementById('scrollContent');

// Clone the content to create an infinite effect
const clonedContent = scrollContent.cloneNode(true);
container.appendChild(clonedContent);

let scrollSpeed = 1; // Adjust this value for faster/slower scrolling

function autoScroll() {
    container.scrollLeft += scrollSpeed;

    // If the scroll reaches the end of the original content, adjust scroll position
    if (container.scrollLeft >= scrollContent.scrollWidth) {
        container.scrollLeft = 0; // Reset to the start of the original content
    }
}

// Set the auto-scroll interval
setInterval(autoScroll, 20); // Adjust the interval for smoother scrolling