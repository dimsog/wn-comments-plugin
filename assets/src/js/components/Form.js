import serializeArrayToObject from "../helpers/serializeArrayToObject";
import Alert from "./Alert";
import autosize from "autosize/dist/autosize";

export default class Form {
    static render($root, options) {
        return new Promise((resolve) => {
            this._loadForm()
                .then((response) => {
                    const $form = $(response.form);
                    resolve($form);
                    $form.find('input[name=parent_id]').val(options?.parentId ?? null);
                    autosize($form.find('textarea'));

                    $form.on('submit', (e) => {
                        e.preventDefault();
                        Alert.hideAlerts();

                        Snowboard.request('onCommentStore', {
                            data: serializeArrayToObject($form.serializeArray()),
                            success: (response) => {
                                Alert.success(response.message);
                                this._reset($form);
                            },
                            error: (errors) => {
                                Alert.error(errors);
                            }
                        });
                    })
                    $root.append($form);
                });
        });
    }

    static _loadForm() {
        return new Promise((resolve, reject) => {
            Snowboard.request(null, 'onCommentsLoadForm', {
                success: (response) => {
                    resolve(response)
                },
                error: (reason) => {
                    reject(reason);
                }
            });
        });
    }

    static _reset($form) {
        $form.find('input[type=text]').val('');
        $form.find('input[type=email]').val('');
        $form.find('textarea').val('');
    }
}
