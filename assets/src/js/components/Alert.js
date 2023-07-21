import Toastify from "toastify-js";
const alerts = [];


export default class {
    static hideAlerts() {
        for (const alert of alerts) {
            alert.hideToast();
        }
    }

    static success(message) {
        const alert = Toastify({
            text: message,
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "rgb(55,100,218)",
            }
        }).showToast();
        alerts.push(alert);
    }

    static error(errors) {
        if (errors instanceof Array) {
            errors = errors.join('<br>');
        }
        const alert = Toastify({
            text: errors,
            duration: 10000,
            newWindow: true,
            close: true,
            escapeMarkup: false,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "rgb(218,55,93)",
            }
        }).showToast();
        alerts.push(alert);
    }
}
