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
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            }
        }).showToast();
        alerts.push(alert);
    }

    static error(errors) {
        const alert = Toastify({
            text: errors.join('<br>'),
            duration: 10000,
            newWindow: true,
            close: true,
            escapeMarkup: false,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
            }
        }).showToast();
        alerts.push(alert);
    }
}
