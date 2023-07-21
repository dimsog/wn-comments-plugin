export default function ($form) {
    const result = {};
    const formData = new FormData($form);
    formData.forEach((value, key) => result[key] = value);
    return result;
}
