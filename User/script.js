// Google Translate initialization function
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
            autoDisplay: false,
        },
        'google_translate_element'
    );
}

// Add event listener for when the Google Translate widget is ready
window.addEventListener('google-translation-ready', () => {
    // Get the language selector dropdown element
    const langSelector = document.querySelector('.goog-te-combo');
    // Set its initial value to the browser's default language
    langSelector.value = window.navigator.language;
    // Add event listener for when the user selects a new language
    langSelector.addEventListener('change', () => {
        // Get the selected language code
        const langCode = langSelector.value;
        // Call the Google Translate API to translate the page
        googleTranslateElementInit();
        // Set the HTML language attribute to the selected language
        document.documentElement.lang = langCode;
    });
});