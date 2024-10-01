function scrollToService() {
    const target = document.getElementById('contact');
    if (target) {
        window.scrollTo({
            top: target.offsetTop, // Scroll to the top of the target
            behavior: 'smooth' // Smooth scrolling
        });
    } else {
        console.error('Target div not found!');
    }
  }