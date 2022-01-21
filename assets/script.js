function onDimsogCommentsSendSuccess($form) {
    $form.reset();
    $form.querySelector('.app-dimsog-comment-form-answer-block').innerHTML = '';
    $form.querySelector('input[name=parent_id]').value = '';
}

$(function () {
    $(document).on('click', '.app-dimsog-comment-item-answer__link', function (e) {
        e.preventDefault();

        var $root = $(this).closest('.dimsog-comments-wrapper');
        var $form = $root.find('form');
        var $parentIdInput = $form.find('input[name=parent_id]');
        var $answerToBlock = $form.find('.app-dimsog-comment-form-answer-block');

        $form.find('.app-dimsog-comment-form__flash').html('');
        $parentIdInput.val($(this).data('comment-id'));
        $answerToBlock.html('<div class="dimsog-comment-form-field dimsog-comment-form-field--reply-user"><i class="icon-reply"></i> ' + e.target.dataset.userName + '</div>');
    });
});
