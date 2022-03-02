export default {
    getFormData: (el) => {
        let formData = new FormData(el),
            data = {};

        for (let [key, val] of formData.entries()) {
            Object.assign(data, { [key]: val })
        }
        return data;
    }
}
