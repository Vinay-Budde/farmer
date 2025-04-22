document.addEventListener('DOMContentLoaded', function() {
    // Form validation for registration
    const registrationForm = document.getElementById('registration-form');
    if (registrationForm) {
        registrationForm.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long!');
                return false;
            }
            
            const aadhaar = document.getElementById('aadhaar').value;
            if (aadhaar.length !== 12 || !/^\d+$/.test(aadhaar)) {
                e.preventDefault();
                alert('Aadhaar must be 12 digits!');
                return false;
            }
            
            const mobile = document.getElementById('mobile').value;
            if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                e.preventDefault();
                alert('Mobile must be 10 digits!');
                return false;
            }
            
            return true;
        });
    }
    
    // Mobile menu toggle for small screens
    const navbarToggler = document.querySelector('.navbar-toggler');
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function() {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            navbarCollapse.classList.toggle('show');
        });
    }
    
    // Tooltip initialization
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Enable popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});