export const loadSession = (key, expirationTime) => {
    const data = sessionStorage.getItem(key);
    if (data) {
        const { value, expiration } = JSON.parse(data);
        if (new Date().getTime() < expiration) {
            return value;
        }
    }
    const value = undefined;
    return value;
};
