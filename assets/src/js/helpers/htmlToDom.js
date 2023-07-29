export default function (htmlMarkup) {
    const $template = document.createElement('template');
    $template.innerHTML = htmlMarkup.trim();
    return $template.content.firstChild;
}
