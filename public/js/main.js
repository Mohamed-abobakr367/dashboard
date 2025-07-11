document.addEventListener('DOMContentLoaded', () => {
    const showLoginBtn = document.getElementById('showLogin');
    const showRegisterBtn = document.getElementById('showRegister');
    const authFormsOverlay = document.getElementById('auth-forms');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const closeBtn = document.querySelector('.auth-forms-overlay .close-btn');
    const switchToRegisterLink = document.getElementById('switchToRegister');
    const switchToLoginLink = document.getElementById('switchToLogin');

    // وظيفة لإظهار الـ Overlay وإظهار الفورم المطلوب
    function showAuthForm(formToShow) {
        authFormsOverlay.classList.add('show');
        if (formToShow === 'login') {
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        } else if (formToShow === 'register') {
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        }
    }

    // وظيفة لإخفاء الـ Overlay
    function hideAuthForm() {
        authFormsOverlay.classList.remove('show');
    }

    // ربط الأزرار بالوظائف
    showLoginBtn.addEventListener('click', (e) => {
        e.preventDefault();
        showAuthForm('login');
    });

    showRegisterBtn.addEventListener('click', (e) => {
        e.preventDefault();
        showAuthForm('register');
    });

    closeBtn.addEventListener('click', hideAuthForm);

    // إغلاق الـ overlay عند الضغط خارجه
    authFormsOverlay.addEventListener('click', (e) => {
        if (e.target === authFormsOverlay) {
            hideAuthForm();
        }
    });

    // التبديل بين فورم الدخول والتسجيل
    switchToRegisterLink.addEventListener('click', (e) => {
        e.preventDefault();
        showAuthForm('register');
    });

    switchToLoginLink.addEventListener('click', (e) => {
        e.preventDefault();
        showAuthForm('login');
    });

    // تم إزالة الكود الخاص بـ "أضف للسلة" لأنه لم يعد مطلوبًا في صفحة الـ Demo.
});