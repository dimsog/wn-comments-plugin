import getValuesFromForm from "../helpers/getValuesFromForm";
import Alert from "./Alert";
import autosize from "autosize/dist/autosize";
import htmlToDom from "../helpers/htmlToDom";

export default class Form {
    static render($root, options) {
        return new Promise((resolve) => {
            this._loadForm()
                .then((response) => {
                    const $form = htmlToDom(response.form);
                    $form.querySelector('input[name=parent_id]').value = options?.parentId ?? null;
                    $root.append($form);

                    resolve($form);
                    autosize($form.querySelector('textarea'));

                    $form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        Alert.hideAlerts();

                        Snowboard.request('onCommentStore', {
                            data: getValuesFromForm($form),
                            success: (response) => {
                                Alert.success(response.message);
                                this._reset($form);
                            },
                            error: (errors) => {
                                Alert.error(errors);
                            }
                        });
                    });
                }).catch((message) => {
                    Alert.error(message);
                });
        });
    }

    static _loadForm() {
        return new Promise((resolve, reject) => {
            Snowboard.request(null, 'onCommentsLoadForm', {
                success: (response) => {
                    resolve(response)
                },
                error: (response) => {
                    reject(response.text);
                }
            });
        });
    }

    static _reset($form) {
        $form.querySelector('input[type=text]').value = '';
        $form.querySelector('input[type=email]').value = '';
        $form.querySelector('textarea').value = '';
    }
}
