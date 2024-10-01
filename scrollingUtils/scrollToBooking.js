function scrollToBooking() {
    const target = document.getElementById('booking');
    if (target) {
        window.scrollTo({
            top: target.offsetTop, // Scroll to the top of the target
            behavior: 'smooth' // Smooth scrolling
        });
    } else {
        console.error('Target div not found!');
    }
  }