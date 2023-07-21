export default function (htmlMarkup) {
    const $template = document.createElement('template');
    $template.innerHTML = htmlMarkup;
    return $template.content.firstChild;
}
