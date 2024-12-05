document.addEventListener('DOMContentLoaded', () => {
    const recaptchaSection = document.querySelector('.recaptcha-display');
    
    setTimeout(() => {
        const recaptchaBadge = document.querySelector('.grecaptcha-badge');
        
        if (recaptchaSection) {
            if (recaptchaBadge) {
                recaptchaBadge.style.visibility = 'visible';
                recaptchaBadge.style.zIndex = 1;
            }
        }
    }, 1000);
});