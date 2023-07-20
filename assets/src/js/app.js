import './../scss/style.scss';
import Form from "./components/Form";

$(function () {
    Form.render($('#d-comments-form-container'));

    $(document).on('click', '.app-d-comment-item-answer__link', function (e) {
        e.preventDefault();
        const $scope = $(this);
        Form.render($scope.parent(), {
            parentId: $scope.data('comment-id')
        }).then(() => {
            $scope.hide();
        });
    });
});
