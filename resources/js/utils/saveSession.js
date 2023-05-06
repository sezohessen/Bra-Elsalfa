export const saveSession = (key, value, expirationTime) => {
    const now = new Date().getTime();
    const expiration = expirationTime * 60 * 60 * 1000; // convert to milliseconds
    const data = {
        value: value,
        expiration: now + expiration,
    };
    sessionStorage.setItem(key, JSON.stringify(data));
};
