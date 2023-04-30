export const getIP = async () => {
    const response = await fetch("https://ipapi.co/json/");
    const data = await response.json();
    return data.ip;
};

export default getIP;
