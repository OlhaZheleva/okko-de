document.addEventListener('wpcf7mailsent', function (event) {
    const wrapper = event.target.closest('[data-att-form-wrapper]');
    if (!wrapper) return;

    wrapper.classList.add('--form-sent');
    const message = wrapper.querySelector('[data-att-form-message]');
    if (message) message.focus({ preventScroll: true });
    clearTimeout(wrapper.formSentTimer);
    wrapper.formSentTimer = window.setTimeout(function () {
        wrapper.classList.remove('--form-sent');
    }, 10000);
});