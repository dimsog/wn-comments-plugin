import './../scss/style.scss';
import Form from "./components/Form";

document.addEventListener('DOMContentLoaded', () => {
    Form.render(document.getElementById('d-comments-form-container'));

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('app-d-comment-item-answer__link')) {
            e.preventDefault();
            Form.render(e.target.parentElement, {
                parentId: e.target.dataset.commentId
            }).then(() => {
                e.target.style.display = 'none';
            });
        }
    });
});
