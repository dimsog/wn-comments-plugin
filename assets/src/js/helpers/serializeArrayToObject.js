export default function (serializeArray) {
    const result = {};
    for (const item of serializeArray) {
        result[item.name] = item.value;
    }
    return result;
}
