(function () {
    document
        .querySelectorAll('.app-dimsog-comment-item-answer__link')
        .forEach(function ($link) {
            $link.addEventListener('click', function (e) {
                e.preventDefault();

                var $form = document.querySelector('#app-dimsog-comment-form');
                var $parentIdInput = $form.querySelector('input[name=parent_id]');
                var $answerToBlock = $form.querySelector('#app-dimsog-comment-form-answer-block');

                $parentIdInput.value = e.target.dataset.commentId;
                $answerToBlock.innerHTML = '<div><i class="icon-reply"></i> ' + e.target.dataset.userName + '</div>';
            });
        });
})();
