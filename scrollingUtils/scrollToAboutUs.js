function scrollToAbout() {
    const target = document.getElementById('about-us');
    if (target) {
        window.scrollTo({
            top: target.offsetTop, // Scroll to the top of the target
            behavior: 'smooth' // Smooth scrolling
        });
    } else {
        console.error('Target div not found!');
    }
}