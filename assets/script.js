$(function () {
    $(document).on('click', '.app-dimsog-comment-item-answer__link', function (e) {
        e.preventDefault();

        var $form = $('#app-dimsog-comment-form');
        var $parentIdInput = $form.find('input[name=parent_id]');
        var $answerToBlock = $form.find('#app-dimsog-comment-form-answer-block');

        $parentIdInput.val($(this).data('comment-id'));
        $answerToBlock.html('<div class="dimsog-comment-form-field dimsog-comment-form-field--reply-user"><i class="icon-reply"></i> ' + e.target.dataset.userName + '</div>');
    });
});
