import Prism from 'prismjs';

/**
 * Initialize PrismJS.
 *
 * @return  {void}
 */
export function highlightCode() {
    Prism.manual = true;

    [...document.querySelectorAll('pre code')].forEach((el) => {
        Prism.highlightElement(el);
    });
}
